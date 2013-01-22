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
 * @package  		Module_Feed
 * @version 		$Id: display.class.php 5135 2013-01-15 07:34:36Z Miguel_Espinoza $
 */
class Feed_Component_Block_Display extends Phpfox_Component 
{
	/**
	 * Class process method wnich is used to execute this component.
	 */
	public function process()
	{			
		     
		if (defined('PHPFOX_IS_PAGES_VIEW') && $this->request()->get('req3') == 'info')
		{
		    return false;
		}
		$iUserId = $this->getParam('user_id');
		$aPage = $this->getParam('aPage');
		$bForceFormOnly = $this->getParam('bForceFormOnly');
		if (isset($aPage['page_user_id']))
		{
			$bHasPerm = Phpfox::getService('pages')->hasPerm($aPage['page_id'], 'pages.view_browse_updates');
			if ($bHasPerm == false)
			{
				return false;
			}
			$iUserId = $aPage['page_user_id'];
			
			/* Get all blocks for location 2 and 3 */
			
			$oBlock = Phpfox::getLib('module');
			$aBlocks = $oBlock->getModuleBlocks(1, true);
			$aBlocks = array_merge($aBlocks, $oBlock->getModuleBlocks(3, true));
			foreach ($aBlocks as $iKey => $sBlock)
			{
				switch($sBlock)
				{
					case 'pages.photo':
					case 'pages.menu':
						unset($aBlocks[$iKey]);
				}
				
			}
			$this->template()->assign(array('aLoadBlocks' => $aBlocks));
		}
		$bIsCustomFeedView = false;
		$sCustomViewType = null;
		
		if (PHPFOX_IS_AJAX && ($iUserId = $this->request()->get('profile_user_id')))
		{
			if (!defined('PHPFOX_IS_USER_PROFILE'))
			{
				define('PHPFOX_IS_USER_PROFILE', true);
			}
			$aUser = Phpfox::getService('user')->get($iUserId);
			
			$this->template()->assign(array(
					'aUser' => $aUser
				)
			);
		}	
		
		if (PHPFOX_IS_AJAX && $this->request()->get('callback_module_id'))
		{
			$aCallback = Phpfox::callback($this->request()->get('callback_module_id') . '.getFeedDisplay', $this->request()->get('callback_item_id'));
			$this->setParam('aFeedCallback', $aCallback);
		}
		
		$aFeedCallback = $this->getParam('aFeedCallback', null);
		
		$bIsProfile = (is_numeric($iUserId) && $iUserId > 0);
		
		if ($this->request()->get('feed') && $bIsProfile)
		{
			switch ($this->request()->get('flike'))
			{
				default:
					if ($sPlugin = Phpfox_Plugin::get('feed.component_block_display_process_flike'))
					{
						eval($sPlugin);
					}					
					break;
			}
		}
		
		if (defined('PHPFOX_IS_USER_PROFILE') && !Phpfox::getService('user.privacy')->hasAccess($iUserId, 'feed.view_wall'))
		{			
			return false;			
		}
		
		if (defined('PHPFOX_IS_PAGES_VIEW') && !Phpfox::getService('pages')->hasPerm(null, 'pages.share_updates'))
		{
			$aFeedCallback['disable_share'] = true;
		}		
		
		$iFeedPage = $this->request()->get('page', 0);
		
		if ($this->request()->getInt('status-id') 
			|| $this->request()->getInt('comment-id') 
			|| $this->request()->getInt('link-id')
			|| $this->request()->getInt('plink-id')
			|| $this->request()->getInt('poke-id')
			|| $this->request()->getInt('feed')
		)
		{
			$bIsCustomFeedView = true;
			if ($this->request()->getInt('status-id'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.status_update_iid',array('iId' => $this->request()->getInt('status-id')));
			}
			elseif ($this->request()->getInt('link-id'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.link_iid', array('iId' => $this->request()->getInt('link-id')));
			}
			elseif ($this->request()->getInt('plink-id'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.link_iid', array('iId' => $this->request()->getInt('plink-id')));
			}			
			elseif ($this->request()->getInt('poke-id'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.poke_iid',array('iId' =>$this->request()->getInt('poke-id')));
			}			
			elseif ($this->request()->getInt('comment-id'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.wall_comment_iid',array('iId' => $this->request()->getInt('comment-id')));						
				
				Phpfox::getService('notification.process')->delete('feed_comment_profile', $this->request()->getInt('comment-id'), Phpfox::getUserId());
			}
			elseif ($this->request()->getInt('feed'))
			{
				$sCustomViewType = Phpfox::getPhrase('feed.feed');
			}
		}
		
		if ((!isset($aFeedCallback['item_id']) || $aFeedCallback['item_id'] == 0))
		{
			$aFeedCallback['item_id'] = ((int)$this->request()->get('amp;callback_item_id')) > 0 ? $this->request()->get('amp;callback_item_id') : $this->request()->get('callback_item_id');
		}
		$aRows = Phpfox::getService('feed')->callback($aFeedCallback)->get(($bIsProfile > 0 ? $iUserId : null), ($this->request()->get('feed') ? $this->request()->get('feed') : null), $iFeedPage);
		
		if (empty($aRows))
		{
			$iFeedPage++;
			$aRows = Phpfox::getService('feed')->callback($aFeedCallback)->get(($bIsProfile > 0 ? $iUserId : null), ($this->request()->get('feed') ? $this->request()->get('feed') : null), $iFeedPage);
		}
		
		if (($this->request()->getInt('status-id') 
				|| $this->request()->getInt('comment-id') 
				|| $this->request()->getInt('link-id')
				|| $this->request()->getInt('poke-id')
			) 
			&& isset($aRows[0]))
		{
			$aRows[0]['feed_view_comment'] = true;
			$this->setParam('aFeed', array_merge(array('feed_display' => 'view', 'total_like' => $aRows[0]['feed_total_like']), $aRows[0]));                        
		}	
		
		(($sPlugin = Phpfox_Plugin::get('feed.component_block_display_process')) ? eval($sPlugin) : false);		
		
		if ($bIsCustomFeedView && !count($aRows) && $bIsProfile)
		{
			$aUser = $this->getParam('aUser');
			
			$this->url()->send($aUser['user_name'], null, Phpfox::getPhrase('feed.the_activity_feed_you_are_looking_for_does_not_exist'));
		}
		
		$iUserid = ($bIsProfile > 0 ? $iUserId : null);
		$iTotalFeeds = (int) Phpfox::getComponentSetting(($iUserid === null ? Phpfox::getUserId() : $iUserid), 'feed.feed_display_limit_' . ($iUserid !== null ? 'profile' : 'dashboard'), Phpfox::getParam('feed.feed_display_limit'));

		/*	
		if (isset($sActivityFeedHeader))
		{
			$this->template()->assign(array(
					'sHeader' => $sActivityFeedHeader
				)
			);
		}
		*/
		
		$aUserLocation = Phpfox::getUserBy('location_latlng');
		if (!empty($aUserLocation))
		{
			$this->template()->assign(array('aVisitorLocation' => json_decode($aUserLocation, true)));
		}
		$bLoadCheckIn = false;
		if (!defined('PHPFOX_IS_PAGES_VIEW') && Phpfox::getParam('feed.enable_check_in') && (Phpfox::getParam('core.ip_infodb_api_key') || Phpfox::getParam('core.google_api_key') ) )
		{
			$bLoadCheckIn = true;
		}

		$this->template()->assign(array(				
				'bHideEnterComment' => true,
				'aFeeds' => $aRows,
				'iFeedNextPage' => ($iFeedPage + 1),
				'iFeedCurrentPage' => $iFeedPage,
				'iTotalFeedPages' => 1,
				'aFeedVals' => $this->request()->getArray('val'),
				'sCustomViewType' => $sCustomViewType,
				'aFeedStatusLinks' => Phpfox::getService('feed')->getShareLinks(),
				'aFeedCallback' => $aFeedCallback,
				'bIsCustomFeedView' => $bIsCustomFeedView,
				'sTimelineYear' => $this->request()->get('year'),
				'sTimelineMonth' => $this->request()->get('month'),
				'iFeedUserSortOrder' => Phpfox::getUserBy('feed_sort'),
				'bLoadCheckIn' => $bLoadCheckIn,
				'bForceFormOnly' => $bForceFormOnly
			)
		);	
		
		if (Phpfox::getService('profile')->timeline())
		{
			$this->template()->assign(array(
					'aFeedTimeline' => Phpfox::getService('feed')->getTimeline(),
					'sLastDayInfo' => Phpfox::getService('feed')->getLastDay()
				)
			);
			
			if (!PHPFOX_IS_AJAX)
			{
				$aUser = $this->getParam('aUser');
				
				$aTimeline = Phpfox::getService('feed')->getTimeLineYears($aUser['user_id'], $aUser['birthday_search']);
				
				$this->template()->assign(array(
						'aTimelineDates' => $aTimeline
					)
				);
			}
		}
		
		if ($bIsProfile)
		{			
			if (!Phpfox::getService('user.privacy')->hasAccess($iUserId, 'feed.display_on_profile'))
			{
				return false;
			}			
		}
				
		return 'block';
	}

	public function clean()
	{
		$this->template()->clean(array(
				'sHeader',
				'aFeeds',
				'sBoxJsId'
			)
		);
	}	
}

?>