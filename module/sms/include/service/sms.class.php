<?php
class Sms_Service_Sms extends Phpfox_Service
{
    private $smsInfo;

    public function getUsers($iTotal)
    {
        return $this->database()->select('u.full_name')
            ->from(Phpfox::getT('user'), 'u')
            ->limit($iTotal)
            ->execute('getRows');
    }

    public function sendMessage($message)
    {
        $this->saveMessage($message);
    }

    /** Save Sms into the DB */
    public function saveMessage($message)
    {
        $this->smsInfo = array(
            'sms_text' => $message,
            'phone_number' => '1',
            'owner_user_id' => Phpfox::getUserId(),
            'viewer_user_id' => '2',
            'sms_status_id' => '3',
            'viewer_is_new' => '4',
            'time_stamp' => PHPFOX_TIME
        );

        return $this->database()->insert(Phpfox::getT('sms'), array(
            'sms_text' => $message
        ));
    }
}