<?php
defined('PHPFOX') or exit('NO DICE!');

class Sms_Component_Block_Sms extends Phpfox_Component
{
    const PHONE_TABLE = 'cf_50b523023a83b';

    public function process()
    {
        $aOperators = array(
            '063' => array(
                'label' => 'Life ;)',
                'value' => '063',
                'active' => false
            ),
            '093' => array(
                'label' => 'Life ;)',
                'value' => '093',
                'active' => false
            ),
            '050' => array(
                'label' => 'МТС ;)',
                'value' => '050',
                'active' => false
            ),
            '095' => array(
                'label' => 'МТС ;)',
                'value' => '095',
                'active' => false
            ),
            '099' => array(
                'label' => 'МТС ;)',
                'value' => '099',
                'active' => false
            ),
            '067' => array(
                'label' => 'Киевстар',
                'value' => '067',
                'active' => false
            ),
            '096' => array(
                'label' => 'Киевстар',
                'value' => '096',
                'active' => false
            ),
            '097' => array(
                'label' => 'Киевстар',
                'value' => '097',
                'active' => false
            ),
            '098' => array(
                'label' => 'Киевстар',
                'value' => '098',
                'active' => false
            ),
            '066' => array(
                'label' => 'Jeans',
                'value' => '066',
                'active' => false
            ),
            '068' => array(
                'label' => 'Билайн',
                'value' => '068',
                'active' => false
            ),
            '039' => array(
                'label' => 'Golden Telecom',
                'value' => '039',
                'active' => false
            ),
            '091' => array(
                'label' => 'Utel',
                'value' => '091',
                'active' => false
            ),
            '094' => array(
                'label' => 'Интертелеком',
                'value' => '094',
                'active' => false
            )
        );

        $aUser = array();
        if (($iUserId = $this->request()->get('id')) || ($iUserId = $this->getParam('id')))
        {
            $aUser = Phpfox::getService('user')->getUser($iUserId, Phpfox::getUserField());
            if (isset($aUser['user_id']))
            {
                $userFields = Phpfox::getService('custom')->getForDisplay('user_main', $iUserId);
                if (isset($userFields[self::PHONE_TABLE])) {
                    $phoneNumber = $userFields[self::PHONE_TABLE]['value'];

                    $operator = substr($phoneNumber, 0, 3);
                    if(array_key_exists($operator, $aOperators)) {
                        $aOperators[$operator]['active'] = true;
                    }

                    $this->template()->assign(array(
                            'phoneNumber'   => substr($phoneNumber, 3)
                    ));
                }
            }
        }

        $this->template()->assign(array(
                 'aOperators'    => $aOperators
        ));
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

        if (count($fields['phone']) != 7 && !is_numeric($fields['phone'])) {
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