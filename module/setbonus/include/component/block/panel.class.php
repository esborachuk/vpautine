<?php

class Setbonus_Component_Block_Panel extends Phpfox_Component {

    public function process() {
        
        $this->template()->setHeader(array( 
                'setbonus.js' => 'module_setbonus',
                'setbonus.css' => 'module_setbonus' 
        ));
        $uid = Phpfox::getUserId();
        $sets_count = PHPFOX::getService('setbonus')->currentUserSets($uid);
        $this->template()->assign('setsCount', $sets_count);
    }

}