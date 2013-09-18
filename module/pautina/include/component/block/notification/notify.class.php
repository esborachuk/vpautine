<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

require_once(PHPFOX_DIR_MODULE . 'notification' . PHPFOX_DS . 'include' . PHPFOX_DS . 'component' . PHPFOX_DS . 'block' . PHPFOX_DS . 'notify.class.php');

class Pautina_Component_Block_Notification_Notify extends Notification_Component_Block_Notify
{
    public function process() {
        parent::process();
    }
}

?>