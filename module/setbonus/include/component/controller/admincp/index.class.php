<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox_Component
 * @version 		$Id: index.class.php 1522 2010-03-11 17:56:49Z Miguel_Espinoza $
 */
class Setbonus_Component_Controller_Admincp_Index extends Phpfox_Component
{
    public function process(){
        $aUsers = Phpfox::getService('setbonus')->getUsers(100); 
        $this->template()->assign('aUsers', $aUsers); 
    }
}

?>