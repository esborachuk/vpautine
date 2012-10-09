<?php
class Sms_Service_Sms extends Phpfox_Service
{
    const SMS_PRICE = '0.17';
    const SMS_SERVICE_URL = 'http://letsads.com/api';
    const SMS_LOGIN = '380937649408';
    const SMS_PASS = 'azsxdcfv';
    const SMS_COUNT_USER_CAN_SEND_TODAY = 10;

    private $date;
    private $smsInfo;
    public $viewerUser;
    public $ownerUser;

    public function __construct()
    {
        $this->_sTable = Phpfox::getT('sms');
        $this->date = date('Ymd', PHPFOX_TIME);
    }

    public function send($sms)
    {
        $this->smsInfo = $sms;
        $this->addUserNameToSmsMessage();

        if ($this->userCanSendSms()) {
            $this->sendSms();
            $this->saveMessage();
        }
    }

    public function addUserNameToSmsMessage()
    {
        $ownerUser = $this->getOwnerUser();
        $this->smsInfo['message'] .= '. ' . $ownerUser['full_name'];
    }

    public function getViewerUser()
    {
        if (!$this->viewerUser) {
            $this->viewerUser = $this->getUserById($this->smsInfo['viewer_user_id']);
        }

        return $this->viewerUser;
    }

    public function getOwnerUser()
    {
        if (!$this->ownerUser) {
            $this->ownerUser = $this->getUserById(Phpfox::getUserId());
        }

        return $this->ownerUser;
    }

    public function getUsers($iTotal)
    {
        return $this->database()->select('u.full_name')
            ->from(Phpfox::getT('user'), 'u')
            ->limit($iTotal)
            ->execute('getRows');
    }

    /** Save Sms into the DB */
    public function saveMessage()
    {
        return $this->database()->insert($this->_sTable, array(
            'sms_text' => $this->preParse()->clean($this->smsInfo['message'], 255),
            'phone_number' => $this->smsInfo['phone'],
            'owner_user_id' => Phpfox::getUserId(),
            'viewer_user_id' => $this->smsInfo['user-id'],
            'sms_status_id' => '0',
            'viewer_is_new' => '1',
            'time_stamp' => PHPFOX_TIME,
            'sms_server_id' => $this->smsInfo['sms-id']
        ));
    }

    public function sendSms()
    {
        $smsCount = $this->getSmsCount($this->smsInfo['message']);

        if ($this->getSmsBalance() > self::SMS_PRICE * $smsCount) {
            $response = $this->_sendSms();
        }
    }

    public function getSmsBalance()
    {
        $sXML  = '<?xml version="1.0" encoding="UTF-8"?>
            <request>
                ' . $this->_getXmlAuth() . '
                <balance />
            </request>';
        $smsServerAnswer = $this->getSmsCurl($sXML);

        return $smsServerAnswer['description'];
    }

    public function getSmsCurl($sXML)
    {
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

    public function getSmsCount($message)
    {
        if (strlen($message) > 0) {
            return ceil(strlen($message) / 160);
        }

        return false;
    }

    public function _sendSms()
    {
        $sXML = '<?xml version="1.0" encoding="UTF-8"?>
                    <request>
                        ' . $this->_getXmlAuth() . '
                        <message>
                            <from>Pautina.me</from>
                            <text>' . $this->smsInfo['message'] . '</text>
                            <recipient>38' . $this->smsInfo['phone'] . '</recipient>
                        </message>
                    </request>';
        $smsServerAnswer = $this->getSmsCurl($sXML);
        $this->smsInfo['sms-id'] = $smsServerAnswer['sms_id'];

        return $smsServerAnswer;
    }

    public function _getXmlAuth()
    {
        return '<auth>
                    <login>' . self::SMS_LOGIN . '</login>
                    <password>' . self::SMS_PASS . '</password>
                </auth>';
    }

    public function getUserSms($userId)
    {
        $userSms = $this->database()->select('*')
            ->from($this->_sTable)
            ->where('owner_user_id = ' . $userId)
            ->execute('getRows');

        if (!count($userSms)) {
            return false;
        }

        return $this->_prepareUserSms($userSms);
    }

    public function _prepareUserSms($userSms)
    {
        foreach ($userSms as &$sms) {
            $userService = Phpfox::getService('user');
            $user = $userService->getUser($sms['viewer_user_id']);
            $userImage = Phpfox::getLib('image.helper')->display(array(
                    'title' => $user['full_name'],
                    'path' => 'core.url_user',
                    'file' => $user['user_image'],
                    'suffix' => '_50',
                    'max_width' => 50,
                    'max_height' => 50
                )
            );
            $sms['viewer_link'] = $userService->getLink($sms['viewer_user_id']);
            $sms['viewer_image'] = $userImage;
        }
        unset($sms);

        return $userSms;
    }

    public function getUserById($id)
    {
        $aUser = $this->database()->select('*')
            ->from(Phpfox::getT('user'))
            ->where('user_id = ' . (int)$id)
            ->execute('getSlaveRow');
        return $aUser;
    }

    public function userCanSendSms()
    {
        $smsTodaySend = $this->getSmsTodaySend();

        if ($smsTodaySend['count'] >= self::SMS_COUNT_USER_CAN_SEND_TODAY) {
            return false;
        } else {
            $this->updateUserSmsCount();

            return true;
        }
    }

    public function getSmsTodaySend()
    {
        $smsTodaySend = $this->database()
            ->select('count')
            ->from(Phpfox::getT('sms_count'))
            ->where('user_id = ' . Phpfox::getUserId() . ' AND date = ' . $this->date)
            ->execute('getRow');

        return $smsTodaySend;
    }

    public function updateUserSmsCount()
    {
        $user = $this->database()->select('user_id')
            ->from(Phpfox::getT('sms_count'))
            ->where('user_id = ' . Phpfox::getUserId())
            ->execute('getSlaveRow');

        if ($user) {
            $smsTodaySend = $this->getSmsTodaySend();
            $this->database()->update(Phpfox::getT('sms_count'),
                                        array(
                                            'date'  => $this->date,
                                            'count' => $smsTodaySend['count'] + 1
                                        ),
                                        'user_id = ' . Phpfox::getUserId());
        } else {
            $this->database()->insert(Phpfox::getT('sms_count'),
                                        array(
                                            'user_id' => Phpfox::getUserId(),
                                            'date' => $this->date,
                                            'count' => 1
                                        ));


        }
    }
}