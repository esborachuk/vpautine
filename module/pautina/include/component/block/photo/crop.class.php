<?php
    defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Photo_Crop extends Phpfox_Component
{
    public function process()
    {
        $aPhoto = $this->getParam('aPhoto');
        $photoService = Phpfox::getService('pautina.profile.imagebox');
        $aPhoto = $photoService->getCropedImage($aPhoto);

        return 'block';
    }
}
?>