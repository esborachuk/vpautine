<?php
class Pautina_Service_Profile_Videobox extends Phpfox_Service
{
    protected $_userId;
    protected $_page;
    protected $_pageSize;
    protected $_videoCount;

    public function getVideos($userId, $page = 1, $pageSize = 9)
    {
        $this->_userId = (int)$userId;
        $this->_page = $page;
        $this->_pageSize = $pageSize;

        $videosInfo = $this->getUserVideosInfo();

        foreach ($videosInfo as &$video) {
            $imgSize = str_replace('%s', '_120', $video['image_path']);
            $video['video_img'] = Phpfox::getLib('url')->getDomain()
                                    . 'file' . PHPFOX_DS. 'pic' . PHPFOX_DS . 'video' . PHPFOX_DS
                                    . $imgSize;
            $video['url'] = Phpfox::permalink('video', $video['video_id'], $video['title']);
        }
        unset($video);

        return $videosInfo;
    }

    public function getUserVideosInfo()
    {
        $videoCount = $this->getVideoCount($this->_userId);

        $videosInfo = $this->database()->select('video_id, image_path, title')
                        ->from(Phpfox::getT('video'))
                        ->where('user_id = ' . $this->_userId)
                        ->limit($this->_page, $this->_pageSize, $videoCount)
                        ->order('time_stamp DESC')
                        ->execute('getRows');

        return $videosInfo;
    }

    public function getVideoCount($userId)
    {
        if (!$this->_videoCount) {
            $videoIds = $this->database()->select('video_id')
                        ->from(Phpfox::getT('video'))
                        ->where('user_id = ' . $userId)
                        ->execute('getRows');

            $this->_videoCount = count($videoIds);
        }

        return $this->_videoCount;
    }

    public function getLastVideo($page = 1, $pageSize = 9)
    {
        $this->_page = $page;
        $this->_pageSize = $pageSize;
        $this->_count = 9;

        $videosInfo = $this->database()->select('video_id, image_path, title')
            ->from(Phpfox::getT('video'))
            ->limit($this->_page, $this->_pageSize, $this->_count)
            ->order('time_stamp DESC')
            ->execute('getRows');

        foreach ($videosInfo as &$video) {
            $imgSize = str_replace('%s', '_120', $video['image_path']);
            $video['video_img'] = Phpfox::getLib('url')->getDomain()
                . 'file' . PHPFOX_DS. 'pic' . PHPFOX_DS . 'video' . PHPFOX_DS
                . $imgSize;
            $video['url'] = Phpfox::permalink('video', $video['video_id'], $video['title']);
        }
        unset($video);

        return $videosInfo;
    }
}
?>