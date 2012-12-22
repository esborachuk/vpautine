<?php
defined('PHPFOX') or exit('NO DICE!');

class Slscrolltotop_Component_Controller_Admincp_Index extends Phpfox_Component
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{
		//--- Set a Title
		$this->template()->setTitle('Scroll To Top Dashboard');
		
		//--- Set Meta Keywords & Description
		$this->template()->setMeta('keywords', 'Scroll To Top, Socialloft, phpFox Module, Free Module');
		$this->template()->setMeta('description', 'This is Scroll To Top Module.');
		
		//--- Set Header, Include JS, CSS
		$this->template()->setHeader('cache', array(
				'main.css' => 'module_slscrolltotop', 
				'jquery.miniColors.css' => 'module_slscrolltotop',
				'jquery.miniColors.min.js' => 'module_slscrolltotop'
			)
		);
		//--- Set Breadcrumb
		$this->template()->setBreadcrumb(Phpfox::getPhrase('slscrolltotop.page_title'), $this->url()->makeUrl('admincp.slscrolltotop'));
		
		// get data from DB
		$data = Phpfox::getService('slscrolltotop.getdata')->getList();
		
		//--- Assigning Variables to HTML Files
		$this->template()->assign(array(
				'data' => $data,
				'aForms' => $data,
				'sStyle' => $this->loadStyle(),
				'sPathImage' => Phpfox::getLib('url')->getDomain()."module/slscrolltotop/static/image/")
		);
		
		// Is user submitting a form?
		if($aVal = $this->request()->get('val'))
		{
			// security check
			if(!empty($aVal))
			{
				/*
				if ($bIsEdit === false) // insert
				{
					if ($bAdd = Phpfox::getService('announcement.process')->add($aVal))
					{
						$this->url()->send('admincp.announcement', null, Phpfox::getPhrase('announcement.announcement_successfully_added'));
					}
				}
				else // user is edit
				{					
				}
				*/
				
				if ($bEdit = Phpfox::getService('slscrolltotop.process')->editData((int)$data['id'], $aVal))
				{
					$this->url()->send('admincp.slscrolltotop');
				}
			}
	
		}
	}
	
	public function loadStyle()
	{
		$sPathImage = Phpfox::getLib('url')->getDomain().'module/slscrolltotop/static/image/';

		$style = '<style type="text/css">
					.miniColors-triggerWrap { 
						background: url('.$sPathImage.'miniColors/trigger.png) -22px 0 no-repeat;
						
					}
					.miniColors-trigger {
						vertical-align: middle;
						outline: none;
						background: url('.$sPathImage.'miniColors/trigger.png) 0 0 no-repeat;
					}
					
					.miniColors-opacity {
						position: absolute;
						top: 5px;
						left: 5px;
						width: 20px;
						height: 150px;
						background: url('.$sPathImage.'miniColors/colors.png) -20px 0 no-repeat;
						cursor: crosshair;
					}
					.miniColors-hues {
						position: absolute;
						top: 5px;
						left: 160px;
						width: 20px;
						height: 150px;
						background: url('.$sPathImage.'miniColors/colors.png) 0 0 no-repeat;
						cursor: crosshair;
					}
					
					.miniColors-colors {
						position: absolute;
						top: 5px;
						left: 5px;
						width: 150px;
						height: 150px;
						background: url('.$sPathImage.'miniColors/colors.png) -40px 0 no-repeat;
						cursor: crosshair;
					}
					</style>';

		return $style;
	}
	/**
	 * Garbage collector. Is executed after this class has completed
	 * its job and the template has also been displayed.
	 */
	public function clean()
	{
		(($sPlugin = Phpfox_Plugin::get('music.component_controller_admincp_index_clean')) ? eval($sPlugin) : false);
	}
}

?>