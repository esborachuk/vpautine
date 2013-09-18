<?php
defined('PHPFOX') or exit('NO DICE!');

class Email_Component_Block_Email extends Phpfox_Component
{
    public function process() {
        $sendToEmail = '';

        if (($iUserId = $this->request()->get('id')) || ($iUserId = $this->getParam('id')))
        {
            $userService = Phpfox::getService('user');
            $sendToUser = $userService->getUser($iUserId);
            $sendToEmail = $sendToUser['email'];
        }

        $this->template()->assign(
            array(
                 'sendToEmail' => $sendToEmail
            ));
    }
}

?>