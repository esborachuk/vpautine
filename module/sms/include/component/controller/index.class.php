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
                        'sms.js' => 'module_sms'))
                ->assign('sSampleVariable', 'Hello, I am an assigned variable.');

        /** @var $smsService Sms_Service_Sms */
        $smsService = Phpfox::getService('sms');
        $aUsers = $smsService->getUsers(10);
        $template->assign('aUsers', $aUsers);
    }
}

?>