<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Profile_Image extends Phpfox_Component
{
    public function process() {
        if (!defined('PHPFOX_IS_USER_PROFILE'))
        {
            return false;
        }

        $aUser = $this->getParam('aUser');

        $aUserInfo = array(
            'title' => $aUser['full_name'],
            'path' => 'core.url_user',
            'file' => $aUser['user_image'],
            'suffix' => '_300',
            'max_width' => 200,
            'max_height' => 300,
            'no_default' => (Phpfox::getUserId() == $aUser['user_id'] ? false : true),
            'thickbox' => true,
            'class' => 'profile_user_image',
            'no_link' => true
        );

        if (Phpfox::getService('profile')->timeline() || $this->getParam('image_size'))
        {
            $aUserInfo['suffix'] = '_120_square';
            unset($aUserInfo['max_width']);
            unset($aUserInfo['max_height']);
        }

        (($sPlugin = Phpfox_Plugin::get('profile.component_block_pic_process')) ? eval($sPlugin) : false);

        $sImage = Phpfox::getLib('image.helper')->display(array_merge(array('user' => Phpfox::getService('user')->getUserFields(true, $aUser)), $aUserInfo));

        $this->template()->assign(array(
                'sProfileImage' => $sImage
            )
        );

        if (defined('PHPFOX_IN_DESIGN_MODE') && !Phpfox::getService('profile')->timeline())
        {
            return 'block';
        }
    }
}
?>