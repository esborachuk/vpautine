<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Wall_Videobox extends Phpfox_Component
{
    public function process()
    {
        $videoboxService = Phpfox::getService('pautina.profile.videobox');
        $videos = $videoboxService->getLastVideo();

        $this->template()->assign(
            array(
                'videos' => $videos
            )
        );

        return 'block';
    }
}
?>