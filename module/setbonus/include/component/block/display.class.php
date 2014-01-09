<?php

/*
 * Этот блок будет выводить количество сетов и статус текущего юзера
 */

class Setbonus_Component_Block_Display extends Phpfox_Component
{    
    public function process()
    {
        $this->template()->setHeader(array( 
                'setbonus.js' => 'module_setbonus',
                'setbonus.css' => 'module_setbonus' 
        ));
    }
}