<?php
class Sms_Component_Controller_Index extends Phpfox_Component
{
    public function process()
    {
        /** @var $template  Phpfox_Template */
        $template = $this->template();

        $template->setTitle('Send Sms')
                ->setBreadCrumb('Sms')
                ->setHeader(array(
                        'sms.css' => 'module_sms',
                        'sms.js' => 'module_sms'));

        /** @var $smsService Sms_Service_Sms */
        $smsService = Phpfox::getService('sms');

        if ($formVal = $this->request()->getArray('val')) {
            if (isset($formVal['sms-message']) && !empty($formVal['sms-message'])) {
                $smsService->sendMessage($formVal['sms-message']);
            }
        }


        $aUsers = $smsService->getUsers(10);
        $template->assign('aUsers', $aUsers);
    }
}

?>