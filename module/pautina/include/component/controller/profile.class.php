<?php
class Pautina_Component_Controller_Profile extends Phpfox_Component
{
    public function process()
    {
        $user = Phpfox::getService('user')->get($this->request()->get('req1'), false);
        $imageboxService = Phpfox::getService('pautina.profile.imagebox');
        $photoService = Phpfox::getService('photo');
        $photos = $imageboxService->getPhotos($user['user_id'], 1, 100);

        $photoRequestId = (int) $this->request()->get('req3');

        if (isset($photoRequestId) && $photoRequestId) {
            $photoRequest = $photoService->getPhoto($photoRequestId, $user['user_id']);
        }

        if (!$photoRequest) {
            $photoRequest = $photos[0];
        }


        $this->template()->assign(
            array(
                 'user' => $user,
                 'photos' => $photos,
                 'photoId' => $photoRequest['photo_id']
            )
        );
    }
}