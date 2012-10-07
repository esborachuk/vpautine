<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Ajax_Email_Ajax extends Phpfox_Ajax
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
    }

    public function validateFields($fields)
    {
        if ((!isset($fields['message']) || $fields['message'] == '')) {
            $error = 'fields are empty';
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