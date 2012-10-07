<?php
class Pautina_Service_Email_Email extends Phpfox_Service
{
    public $emailInfo;

    public function send($emailFields)
    {
        $result = false;
        $this->emailInfo = $emailFields;

        if ($this->userCanSendSms()) {
            $result = $this->_send();
        }

        return $result;
    }

    public function userCanSendSms()
    {
        /** TODO function */
        return true;
    }

    public function _send()
    {
        $sendToUser = Phpfox::getService('user')->getUser($this->emailInfo['user-id']);
        $sendToEmail = $sendToUser['email'];

        $email = Phpfox::getLib('mail')
                    ->to($sendToEmail)
                    ->subject($this->emailInfo['title'])
                    ->message($this->emailInfo['message'])
                    ->send();

        return $email;
    }
}