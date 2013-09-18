<?php
    defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Wall_Imagebox extends Phpfox_Component
{
    public function process()
    {
        $imageboxService = Phpfox::getService('pautina.profile.imagebox');
        $photos = $imageboxService->getLastPhotos();

        $this->template()->assign(
            array(
                'photos'  => $photos,
                'moduleUrl'     => Phpfox::getService('user')->getLink(Phpfox::getUserId()) . 'pautina/'
            )
        );

        return 'block';
    }
}
?>