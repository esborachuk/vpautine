<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

require_once(PHPFOX_DIR_MODULE . 'profile' . PHPFOX_DS . 'include' . PHPFOX_DS . 'component' . PHPFOX_DS . 'block' . PHPFOX_DS . 'pic.class.php');

class Pautina_Component_Block_Profile_Usermenu extends Phpfox_Component
{
    public function process() {
        $menu = Phpfox::getService('pautina.profile.usermenu')->getMenu();
        $this->template()->assign('menu', $menu);
    }
}


?>