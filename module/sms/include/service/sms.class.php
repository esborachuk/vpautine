<?php
class Sms_Service_Sms extends Phpfox_Service
{
    const SMS_PRICE = '0.17';
    const SMS_SERVICE_URL = 'http://letsads.com/api';

    private $smsInfo;

    public function __construct()
    {
        $this->_sTable = Phpfox::getT('sms');
    }

    public function getUsers($iTotal)
    {
        return $this->database()->select('u.full_name')
            ->from(Phpfox::getT('user'), 'u')
            ->limit($iTotal)
            ->execute('getRows');
    }

    public function sendMessage($message)
    {
        $this->sendSms($message);
        $this->saveMessage($message);
    }

    /** Save Sms into the DB */
    public function saveMessage($smsInfo)
    {
        return $this->database()->insert($this->_sTable, array(
            'sms_text' => $this->preParse()->clean($smsInfo['sms-message'], 255),
            'phone_number' => $smsInfo['sms-phone'],
            'owner_user_id' => Phpfox::getUserId(),
            'viewer_user_id' => '2',
            'sms_status_id' => '0',
            'viewer_is_new' => '1',
            'time_stamp' => PHPFOX_TIME,
            'sms_server_id' => ''
        ));
    }

    public function sendSms($smsInfo) {
        $smsCount = $this->getSmsCount($smsInfo['sms-message']);

        if ($this->getSmsBalance() > self::SMS_PRICE * $smsCount) {

        }
    }

    public function getSmsBalance() {
        $sXML  = '<?xml version="1.0" encoding="UTF-8"?>
            <request>
                <auth>
                    <login>380937649408</login>
                    <password>azsxdcfv</password>
                </auth>
                <balance />
            </request>';
        $smsServerAnswer = $this->getSmsCurl($sXML);

        return $smsServerAnswer['description'];
    }

    public function getSmsCurl($sXML) {
        $rCurl = curl_init(self::SMS_SERVICE_URL);
        curl_setopt($rCurl, CURLOPT_HEADER, 0);
        curl_setopt($rCurl, CURLOPT_POSTFIELDS, $sXML);
        curl_setopt($rCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($rCurl, CURLOPT_POST, 1);
        $xmlAnswer = curl_exec($rCurl);
        curl_close($rCurl);
        $answer = Phpfox::getLib('xml.parser')->parse($xmlAnswer);

        return $answer;
    }

    public function getSmsCount($message) {
        if (strlen($message) > 0) {
            return ceil(strlen($message) / 160);
        }

        return false;
    }
}