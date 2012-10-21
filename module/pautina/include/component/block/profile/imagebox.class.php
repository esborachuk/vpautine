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
        $allPhotoLink = $userLink = Phpfox::getService('user')->getLink($aUser['user_id']) . 'photo';

        $this->template()->assign(
            array(
                'photos' => $photos,
                'allPhotoLink' => $allPhotoLink
            )
        );

        return 'block';
    }
}
?>