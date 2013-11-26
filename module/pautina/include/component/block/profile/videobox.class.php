<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Profile_Videobox extends Phpfox_Component
{
    public function process()
    {
        $aUser = $this->getParam('aUser');
        if (!$aUser) {
            return false;
        }

        $loginUserId = Phpfox::getUserId();

        $showAddLink = false;
        if ($loginUserId == $aUser['user_id']) {
            $showAddLink = true;
        }

        $videoboxService = Phpfox::getService('pautina.profile.videobox');
        $videoCount = $videoboxService->getVideoCount($aUser['user_id']);

        $videos = $videoboxService->getVideos($aUser['user_id']);

        $this->template()->assign(
            array(
                'videos' => $videos,
                'videoCount' => $videoCount,
                'showAddLink'   => $showAddLink,
                'moduleUrl'     => Phpfox::getService('user')->getLink($aUser['user_id']) . 'video/'
            )
        );

        return 'block';
    }
}
?>