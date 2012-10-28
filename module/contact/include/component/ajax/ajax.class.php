<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Miguel Espinoza
 * @package  		Module_Contact
 * @version 		$Id: ajax.class.php 4607 2012-08-27 07:23:45Z Miguel_Espinoza $
 */
class Contact_Component_Ajax_Ajax extends Phpfox_Ajax
{

	public function manageOrdering()
	{
		$aVals = $this->get('val');
		Phpfox::getService('contact.process')->updateOrdering($aVals['ordering']);
	}
	
	public function showQuickContact()
	{
		// Phpfox::getUserParam('');
		$iUserId = Phpfox::getParam('pages.admin_in_charge_of_page_claims');
		if (empty($iUserId))
		{
			return Phpfox_Error::display('No admin has been set to handle this type of issues');
		}
		
		Phpfox::getComponent('mail.compose', array('claim_page' => true, 'page_id' => $this->get('page_id'), 'id' => $iUserId), 'controller');
	}
}

?>