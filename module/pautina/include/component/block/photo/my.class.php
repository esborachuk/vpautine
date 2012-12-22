<?php
defined('PHPFOX') or exit('NO DICE!');

class Pautina_Component_Block_Photo_My extends Phpfox_Component
{
    public function process()
    {
        $this->template()->assign(
            array(
                'url' => Phpfox::getService('user')->getLink(Phpfox::getUserId()) . 'photo/'
            ));

        return 'block';
    }
}
?>