<?php
class Email_Service_Email extends Phpfox_Service
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
        $userService = Phpfox::getService('user');
        $sendToUser = $userService->getUser($this->emailInfo['user-id']);
        $sendToEmail = $sendToUser['email'];
        $sendFromUser = $userService->getUser(Phpfox::getUserId());
        $sendFromUserLink = '<a href="' . $userService->getLink($sendFromUser['user_id']) . '">' . $sendFromUser['full_name'] . '</a>';

        $email = Phpfox::getLib('mail')
                    ->to($sendToEmail)
                    ->subject($this->emailInfo['title'] . '. ' . $sendFromUser['full_name'])
                    ->message($this->emailInfo['message'] . '<br />' . $sendFromUserLink)
                    ->send();

        return $email;
    }
}