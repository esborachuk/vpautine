<?php
defined('PHPFOX') or exit('NO DICE!');

class Email_Component_Ajax_Ajax extends Phpfox_Ajax
{
    public function emailProcess()
    {
        Phpfox::isUser(true);

        $emailFields = $this->get('email');

        if (!$this->validateFields($emailFields)) {
            $this->call('$(\'#email-error\').html(\'' . $this->_error . '\').show();');
            unset($this->_error);
        } else {
            $email = Phpfox::getService('email');
            $email->send($emailFields);

            $this->callSuccessMessage();
        }

        $this->call('$Core.processForm(\'#email-button\', true);');
    }

    public function validateFields($fields)
    {
        if ((!isset($fields['message']) || $fields['message'] == ''
            || !isset($fields['email']) || $fields['email'] == '')) {
            $error = 'fields are empty';
        }

        if (!Phpfox::getLib('validator')->verify('email', $fields['email'])) {
            $error = 'email incorrect';
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
        $this->call('$(\'#js_form_email\').hide();');
        $this->call('$(\'#email-success-result .message\').html(\'Сообщение отправлено\').parent().show();');
    }
}
?>