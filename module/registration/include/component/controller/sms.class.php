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
 * @package  		Module_User
 * @version 		$Id: register.class.php 4588 2012-08-09 10:18:00Z Raymond_Benc $
 */
class Registration_Component_Controller_Sms extends Phpfox_Component
{
    private $hash;
    private $userId;
    private $hashFromDb;

    public function __construct()
    {
        $this->_sTable = Phpfox::getT('registration');
    }

    /**
     * Class process method wnich is used to execute this component.
     */
    public function process()
    {

    }


}

?>