<?php
class Pautina_Service_Profile_Imagebox extends Phpfox_Service
{
    protected $_photoCount;

    public function getPhotos($userId, $page = 1, $pageSize = 9)
    {
        $photosService = Phpfox::getService('photo');

        $where = array();
        $where[] = 'AND p.user_id = ' . $userId;
        list($iCnt, $photos) = $photosService->get($where, 'p.time_stamp DESC', $page, $pageSize);

        foreach ($photos as &$photo) {
            $destinationSmall = str_replace('%s', '_100', $photo['destination']);
            $destinationMedium = str_replace('%s', '_500', $photo['destination']);
            $photo['image_src_small'] = Phpfox::getLib('url')->getDomain()
                                        . 'file' . PHPFOX_DS. 'pic' . PHPFOX_DS . 'photo' . PHPFOX_DS
                                        . $destinationSmall;
            $photo['image_src_medium'] = Phpfox::getLib('url')->getDomain()
                                        . 'file' . PHPFOX_DS. 'pic' . PHPFOX_DS . 'photo' . PHPFOX_DS
                                        . $destinationMedium;
        }
        unset($photo);

        return $photos;
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
}
?>