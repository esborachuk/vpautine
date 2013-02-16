<?php
defined('PHPFOX') or exit('NO DICE!');


class Registration_Service_Phone extends Phpfox_Service
{
    public function __construct()
    {
        $this->_sTable = Phpfox::getT('registration');
        $this->date = date('Ymd', PHPFOX_TIME);
        $this->_oSession = Phpfox::getService('log.session');
    }

    public function phone($phone)
    {
        $smsService = Phpfox::getService('sms.sms');
        if (!$this->isOnRegistration()) {
            $this->savePhone($phone);
        }
    }

    public function savePhone($phone)
    {
        $this->code = $this->generateRandomCode();

        $this->database()->insert($this->_sTable, array(
            'id_hash' => $this->getDateHash($this->code),
            'sms_hash' => md5($this->code),
            'phone' => $phone
        ));

        $this->saveHashToCookie();
    }

    public function generateRandomCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $result = '';
        for ($i = 0; $i < 5; $i++)
            $result .= $characters[mt_rand(0, 61)];

        return $result;
    }

    private function getHash($sCode, $sSalt)
    {
        return md5(md5($sCode) . $sSalt);
    }

    public function getDateHash($code) {
        return md5($code . $this->date);
    }

    public function getSessionId()
    {
        return $this->_oSession->getSessionId();
    }

    public function saveHashToCookie()
    {
        return Phpfox::setCookie('hash', $this->getDateHash($this->code));
    }

    public function isOnRegistration()
    {
        $cookieHash = Phpfox::getCookie('hash');

        if ($cookieHash) {
            $aRows = $this->database()->select('*')
                ->from($this->_sTable)
                ->where('id_hash =  \'' . $cookieHash . '\'')
                ->execute('getRows');
        }

        return false;
    }
}

?>