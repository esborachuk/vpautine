<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Wall_Musicbox extends Phpfox_Component
{
    public function process()
    {
        $musicboxService = Phpfox::getService('pautina.profile.musicbox');
        $musics = $musicboxService->getLastMusics();

        $this->template()->assign(
            array(
                'musics' => $musics
            )
        );

        return 'block';
    }
}
?>