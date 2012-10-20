<?php
defined('PHPFOX') or exit('NO DICE!');

require_once(PHPFOX_DIR_MODULE . 'photo' . PHPFOX_DS . 'include' . PHPFOX_DS . 'component' . PHPFOX_DS . 'controller' . PHPFOX_DS . 'view.class.php');

class Pautina_Component_Block_Profile_Imageview extends Photo_Component_Controller_View
{
    public function process()
    {
        parent::process();
    }
}
?>