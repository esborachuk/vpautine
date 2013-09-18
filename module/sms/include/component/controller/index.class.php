<?php
defined('PHPFOX') or exit('NO DICE!');

class Sms_Component_Controller_Index extends Phpfox_Component
{
    public function process()
    {
        Phpfox::isUser(true);

        $userId = Phpfox::getUserId();

        $sms = Phpfox::getService('sms');
        $userSms = $sms->getUserSms($userId);

        $this->template()->assign('userSms', $userSms);
    }
}

?>