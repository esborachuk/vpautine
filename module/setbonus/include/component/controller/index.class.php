<?php
 
 /*
  * Основной контроллер для модуля сет-бонусов
  * 
  */

class Setbonus_Component_Controller_Index extends Phpfox_Component
{
    public function process()
    {        
        $this->template()->setHeader(array( 
                'setbonus.js' => 'module_setbonus',
                'setbonus.css' => 'module_setbonus' 
        ));
        $this->template()->assign('script', 'qwer');
    }
}