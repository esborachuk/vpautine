<?php
defined('PHPFOX') or exit('NO DICE!');

class Sms_Component_Block_Sms extends Phpfox_Component
{
    public function process() {
        /** @var $smsService Sms_Service_Sms */
        $smsService = Phpfox::getService('sms');

        if ($formVal = $this->request()->getArray('val')) {
            if (isset($formVal['sms-message']) && !empty($formVal['sms-message'])) {
                $smsService->sendMessage($formVal);
            }
        }
    }
}
?>