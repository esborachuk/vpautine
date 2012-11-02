<?php
class Pautina_Service_Profile_Musicbox extends Phpfox_Service
{
    protected $_userId;
    protected $_page;
    protected $_pageSize;
    protected $_musicCount;

    public function getMusics($userId, $page = 1, $pageSize = 9)
    {
        $this->_userId = (int)$userId;
        $this->_page = $page;
        $this->_pageSize = $pageSize;

        $musicService = Phpfox::getService('music');
        $musics = $musicService->getSongs($this->_userId, null, $this->_pageSize);

        return $musics;
    }

    public function getMusicCount($userId) {
        if (!$this->_musicCount) {
            $musicIds = $this->database()->select('song_id')
                ->from(Phpfox::getT('music_song'))
                ->where('user_id = ' . $userId)
                ->execute('getRows');

            $this->_blogCount = count($musicIds);
        }

        return $this->_blogCount;
    }
}
?>