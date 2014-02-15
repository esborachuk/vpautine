<?php

/*
 * Этот блок будет выводить количество сетов и статус текущего юзера
 */

class Setbonus_Component_Block_Display extends Phpfox_Component
{    
    public function process()
    {
//        echo 'test block - this text is from display.class.php';
        $cuid = Phpfox::getUserId();
        $cusc = Phpfox::getService('setbonus')->getUserSetsCount(Phpfox::getUserId());
        $this->template()->assign('cuid', $cuid);
        $this->template()->assign('cusc', $cusc);
    }
}