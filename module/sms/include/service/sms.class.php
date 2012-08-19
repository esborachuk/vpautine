<?php
class Sms_Service_Sms extends Phpfox_Service
{
    public function getUsers($iTotal)
    {
        return $this->database()->select('u.full_name')
            ->from(Phpfox::getT('user'), 'u')
            ->limit($iTotal)
            ->execute('getRows');
    }
}