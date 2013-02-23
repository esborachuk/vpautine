<?php
defined('PHPFOX') or exit('NO DICE!');


class Registration_Service_Phone extends Phpfox_Service
{
    private $smsCode;
    private $smsHash;
    public $userId;

    public function __construct()
    {
        $this->_sTable = Phpfox::getT('registrion');
        $this->date = date('Ymd', PHPFOX_TIME);
        $this->_oSession = Phpfox::getService('log.session');
    }

    public function phone($phone, $userId)at
    {
        $this->userId = $userId;

        $smsService = Phpfox::getService('sms.sms');
        $this->savePhone($phone);
        $smsReport = $smsService->sendRegistrationCode($phone, $this->smsCode);
    }

    public function savePhone($phone)
    {
        $this->smsCode = $this->generateRandomCode();
        $this->smsHash = md5(md5($this->smsCode) . $this->userId);

        $this->database()->insert($this->_sTable, array(
            'user_id' => $this->userId,
            'sms_hash' => $this->smsHash,
            'phone' => md5($phone)
        ));

        $this->saveUserIdToCookie();
    }

    public function generateRandomCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $result = '';
        for ($i = 0; $i < 5; $i++)
            $result .= $characters[mt_rand(0, 61)];

        return $result;
    }

    public function saveUserIdToCookie()
    {
        return Phpfox::setCookie('reg_user_id', $this->userId);
    }

    public function isOnRegistration()
    {
        if (!Phpfox::getCookie('reg_user_id')) {
            return false;
        }

        return true;
    }
}

?>