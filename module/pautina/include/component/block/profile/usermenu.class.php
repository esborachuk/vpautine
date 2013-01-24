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
        $sUserProfileImage = Phpfox::getLib('image.helper')->display(array_merge(
                array('user' => Phpfox::getService('user')->getUserFields(true)),
                array(
                    'path' => 'core.url_user',
                    'file' => Phpfox::getUserBy('user_image'),
                    'suffix' => '_20_square',
                    'max_width' => 20,
                    'max_height' => 20
                )
            )
        );
        $this->template()->assign(array(
            'menu' => $menu,
            'sUserProfileImage' => $sUserProfileImage
        ));
    }
}


?>