<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Photo_Add extends Phpfox_Component
{
    public function process()
    {
        $showImage = false;

        $aUser = $this->getParam('aUser');
        $currentUser = Phpfox::getUserId();;

        if ($aUser['user_id'] == $currentUser) {
            $showImage = true;
        }

        $this->template()->assign(array(
            'showImage' => $showImage
        ));

        return 'block';
    }
}
?>