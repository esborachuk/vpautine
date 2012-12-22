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
 * @package 		Phpfox_Service
 * @version 		$Id: genre.class.php 2556 2011-04-21 20:02:54Z Raymond_Benc $
 */
class Slscrolltotop_Service_Getdata extends Phpfox_Service 
{
	/**
	 * Class constructor
	 */	
	public function __construct()
	{	
		$this->_sTable = Phpfox::getT('socialloft_scrolltotop');	
	}
	
	public function getList()
	{		
		$sCacheId = $this->cache()->set('socialloft_scrolltotop');
		
		if (!($aRows = $this->cache()->get($sCacheId)))
		{		
			$aRows = $this->database()->select('*')
										->from($this->_sTable)
										->execute('getRows');
				
			$this->cache()->save($sCacheId, $aRows);
		}
		
		$aRows = $this->database()->select('*')
									->from($this->_sTable)
									->execute('getRows');	

		$data = $aRows[0];
		
		// prepare date before send to Template Page
		$arrMargin = explode(" ", $data['margin']);
		$data['margin_top'] = substr($arrMargin[0],0, -2);
		$data['margin_right'] = substr($arrMargin[1],0, -2);
		$data['margin_bottom'] = substr($arrMargin[2],0, -2);
		$data['margin_left'] = substr($arrMargin[3],0, -2);
		
		return $data;
	}
}

?>