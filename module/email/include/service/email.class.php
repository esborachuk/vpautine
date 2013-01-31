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
        $sendToEmail = $this->emailInfo['email'];
        $sendFromUser = $userService->getUser(Phpfox::getUserId());
        $sendFromUserLink = 'Отправлено пользователем <a href="' . $userService->getLink($sendFromUser['user_id']) . '">' . $sendFromUser['full_name'] . '</a>';

        $email = Phpfox::getLib('mail')
                    ->to($sendToEmail)
                    ->subject($this->emailInfo['title'])
                    ->message($this->emailInfo['message'] . '<br /><br />' . $sendFromUserLink)
                    ->send();

        return $email;
    }
}