<?php
/**
 * [PHPFOX_HEADER]
 */

defined('PHPFOX') or exit('NO DICE!');

/**
 * 
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox_Component
 * @version 		$Id: browse.class.php 4205 2012-06-04 08:52:29Z Raymond_Benc $
 */
class Like_Component_Block_Displayactions extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		$aFeed = $this->getParam('aFeed');
		
		if (empty($aFeed))
		{
			return false;
		}
		if (!isset($aFeed['type_id']) && isset($aFeed['like_type_id']))
		{
			$aFeed['type_id'] = $aFeed['like_type_id'];
		}
		
		$aActions = Phpfox::getService('like')->getActionsFor($aFeed['type_id'], $aFeed['item_id']);	
		if (empty($aActions))
		{
			return false;
		}
		$this->template()->assign(array(
				'aActions' => $aActions
			)
		);
	}
	
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('like.component_block_browse_clean')) ? eval($sPlugin) : false);
	}
}

?>