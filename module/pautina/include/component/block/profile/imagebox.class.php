<?php
    defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Profile_Imagebox extends Phpfox_Component
{
    public function process()
    {
        $aUser = $this->getParam('aUser');
        if (!$aUser) {
            return false;
        }

        $imageboxService = Phpfox::getService('pautina.profile.imagebox');
        $photos = $imageboxService->getPhotos($aUser['user_id']);

        $this->template()->assign(
            array(
                'photos' => $photos
            )
        );

        return 'block';
    }
}
?>