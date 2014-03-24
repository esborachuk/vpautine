<?php

/*
 * Этот блок будет выводить количество сетов и статус текущего юзера
 */

class Setbonus_Component_Block_Display extends Phpfox_Component
{    
    public function process()
    {
        $cuid = Phpfox::getUserId();
        $cusc = Phpfox::getService('setbonus')->getUserSetsCount($cuid);
        $statusplus = Phpfox::getService('setbonus')->getUserStatus($cuid);
        $this->template()->assign('cuid', $cuid);
        $this->template()->assign('cusc', $cusc);
        $this->template()->assign('statusplus', $statusplus);
    }
}