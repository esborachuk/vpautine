<?php
defined('PHPFOX') or exit('NO DICE!');

class Sms_Component_Ajax_Ajax extends Phpfox_Ajax
{
    public function smsProcess()
    {
        Phpfox::isUser(true);

        $smsFields = $this->get('sms');

        if (!$this->validateFields($smsFields)) {
            $this->call('$(\'#sms-error\').html(\'' . $this->_error . '\').show();');
            unset($this->_error);
        } else {
            $sms = Phpfox::getService('sms');
            $sms->send($smsFields);

            $this->callSuccessMessage();
        }

        $this->call('$Core.processForm(\'#sms-button\', true);');
    }

    public function validateFields($fields)
    {
        if ((!isset($fields['phone']) && $fields['phone'] == '')
            || (!isset($fields['message']) && $fields['message'] == '')) {
            $error = 'fields are empty';
        }

        if (count($fields['phone']) != 10 && !ctype_digit($fields['phone'])) {
            $error = 'phone number is not valid';
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

    public function callSuccessMessage()
    {
        $this->call('$(\'#js_form_sms\').hide();');
        $this->call('$(\'#sms-success-result .message\').html(\'Сообщение отправлено\').parent().show();');
    }
}
?>