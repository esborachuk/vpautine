<?php
class Pautina_Service_Profile_Imagebox extends Phpfox_Service
{
    protected $_photoCount;

    public function __construct()
    {
        $this->_photoPath = Phpfox::getLib('url')->getDomain()
                            . 'file' . PHPFOX_DS. 'pic' . PHPFOX_DS . 'photo' . PHPFOX_DS;
    }

    public function getPhotos($userId = '', $page = 1, $pageSize = 9)
    {
        $photosService = Phpfox::getService('photo');

        $where = array();
        if ($userId){
            $where[] = 'AND p.user_id = ' . $userId;
        }
        list($iCnt, $photos) = $photosService->get($where, 'p.time_stamp DESC', $page, $pageSize);

        foreach ($photos as &$photo) {
            $photo = $this->getCropedImage($photo);
        }
        unset($photo);

        return $photos;
    }

    public function getLastPhotos()
    {
        return $this->getPhotos();
    }

    public function getPhotoCount($userId)
    {
        if (!$this->_photoCount) {
            $photoIds = $this->database()->select('photo_id')
                        ->from(Phpfox::getT('photo'))
                        ->where('user_id = ' . $userId)
                        ->execute('getRows');

            $this->_photoCount = count($photoIds);
        }

        return $this->_photoCount;
    }

    public function getCropedImage($photo)
    {
        $imageFile = str_replace('%s', '', $photo['destination']);

        if (!file_exists(PHPFOX_DIR_FILE . 'pic/photo/' . $imageFile)) {
            $photo['destination'] = 'default.jpeg';
        }

        $imageCrop = str_replace('%s', '_100_square', $photo['destination']);
        $destinationCrop = PHPFOX_DIR_FILE . 'pic/photo/' . $imageCrop;

        if (!file_exists($destinationCrop)) {
            Phpfox::getLib('image')->createThumbnail(
                $this->_photoPath . str_replace('%s', '', $photo['destination']),
                $destinationCrop,
                100,
                100,
                false
            );
        }

        $photo['100_square'] = Phpfox::getLib('url')->getDomain()
            . 'file' . PHPFOX_DS. 'pic' . PHPFOX_DS . 'photo' . PHPFOX_DS
            . $imageCrop;

        return $photo;
    }
}
?>