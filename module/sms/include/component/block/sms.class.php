<?php
defined('PHPFOX') or exit('NO DICE!');

class Sms_Component_Block_Sms extends Phpfox_Component
{
    const PHONE_TABLE = 'cf_phone';
    const PHONE_TABLE_TYPE = 'user_panel';

    public function process()
    {
        $aUser = array();
        if (($iUserId = $this->request()->get('id')) || ($iUserId = $this->getParam('id')))
        {
            $aUser = Phpfox::getService('user')->getUser($iUserId, Phpfox::getUserField());
            if (isset($aUser['user_id']))
            {
                $userFields = Phpfox::getService('custom')->getForDisplay(self::PHONE_TABLE_TYPE, $iUserId);
                if (isset($userFields[self::PHONE_TABLE])) {
                    $phoneNumber = $userFields[self::PHONE_TABLE]['value'];

                    $this->template()->assign(array(
                            'phoneNumber'   => $phoneNumber
                    ));
                }
            }
        }
    }

    public function sendSms()
    {
        $smsFields = $this->request()->getArray('sms');

        if ($this->validateFields($smsFields)) {
            $sms = Phpfox::getService('sms');
            $sms->send($smsFields);
            Phpfox::getLib('ajax')->call('$Core.processForm(\'#js_form_sms\', true);');
        }
    }

    public function validateFields($fields)
    {
        if ((!isset($fields['phone']) && $fields['phone'] == '')
            || (!isset($fields['message']) && $fields['message'] == '')) {
            $error = 'Вы не ввели сообщение';
        }

        if (count($fields['phone']) != 10 && !is_numeric($fields['phone'])) {
            $error = 'Вы ввели неверный номер телефона';
        }

        if (isset($error)) {
            $this->_error = $error;
            return false;
        }

        $validateFields = array();
        foreach ($fields as $key => $field) {
            $validate = strip_tags($field);
            $validate = htmlspecialchars($validate);
            $validate = mysql_escape_string($validate);
            $validateFields[$key] = $validate;
        }

        return $validateFields;
    }

    public function returnAnswer($message)
    {
        $this->call('$("#success-result").html("' . $message . '").show()');
    }
}
?>