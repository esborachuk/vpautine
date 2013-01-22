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
 * @package 		Phpfox_Ajax
 * @version 		$Id: ajax.class.php 5126 2013-01-14 10:01:49Z Miguel_Espinoza $
 */
class Like_Component_Ajax_Ajax extends Phpfox_Ajax
{
	public function add()
	{
		Phpfox::isUser(true);
                if (Phpfox::getService('like')->hasBeenMarked(2, $this->get('type_id'), $this->get('item_id')))
                {
                    $this->removeAction();
                }
		if (Phpfox::getService('like.process')->add($this->get('type_id'), $this->get('item_id')))
		{
			if ($this->get('type_id') == 'feed_mini' && $this->get('custom_inline'))
			{
				$this->_loadCommentLikes();
			}
			else
			{
				/* When clicking "Like" from the Feed */
				$this->_loadLikes(true);
				if (!$this->get('counterholder'))
				{
				    $this->call('$("#js_like_body_'. $this->get('item_id') . '").parents().map( function() { $(this).show(); });');
				}
			}
			if (!$this->get('counterholder'))
			{
			    $this->call('$Core.loadInit();');
			}
		}
	}
	
	public function delete()
	{
		Phpfox::isUser(true);
		
		if (Phpfox::getService('like.process')->delete($this->get('type_id'), $this->get('item_id'), (int) $this->get('force_user_id')))
		{
			if ($this->get('type_id') == 'pages' && (int) $this->get('force_user_id') > 0)
			{
				$this->remove('#js_row_like_' . (int) $this->get('force_user_id'));
			}
			else
			{
				if ($this->get('type_id') == 'feed_mini' && $this->get('custom_inline'))
				{
					$this->_loadCommentLikes();	
				}
				else
				{
					$this->_loadLikes(false);
				}
			}
		}
	}

	public function browse()
	{				
		$this->error(false);
		Phpfox::getBlock('like.browse');	
		$this->setTitle((($this->get('type_id') == 'pages' && $this->get('force_like') == '') ? Phpfox::getPhrase('like.members') : Phpfox::getPhrase('like.people_who_like_this')));
	}
	
	private function _loadCommentLikes()
	{
		$aComment = Phpfox::getService('comment')->getComment($this->get('item_id'));
		if ($this->get('counterholder'))
		{
		    $this->call('$("#' . $this->get('counterholder') . '_counter_' . $this->get('item_id') . '").html(' . $aComment['total_like'] . ');');
		    return;
		}
		if ($aComment['total_like'] > 0)
		{
			$sPhrase = Phpfox::getPhrase('like.1_person');
			if ($aComment['total_like'] > 1)
			{
				$sPhrase = Phpfox::getPhrase('like.total_people', array('total' => $aComment['total_like']));
			}
			$this->call('$(\'#js_comment_' . $this->get('item_id') . '\').find(\'.comment_mini_action:first\').find(\'.js_like_link_holder\').show();');
			$this->call('$(\'#js_comment_' . $this->get('item_id') . '\').find(\'.comment_mini_action:first\').find(\'.js_like_link_holder_info\').html(\'' . $sPhrase . '\');');
		}
		else 
		{
			$this->call('$(\'#js_comment_' . $this->get('item_id') . '\').find(\'.comment_mini_action:first\').find(\'.js_like_link_holder\').hide();');
		}	
	}
	
	private function _loadLikes($bIsLiked)
	{
		$aLikes = Phpfox::getService('like')->getLikesForFeed($this->get('type_id'), $this->get('item_id'), $bIsLiked, Phpfox::getParam('feed.total_likes_to_display'), true);
		if ($this->get('counterholder'))
		{
		    $this->call('$("#' . $this->get('counterholder') . '_counter_' . $this->get('item_id') . '").html(' . Phpfox::getService('like')->getTotalLikes() . ');');
		    return;
		}
		if (!Phpfox::getService('like')->getTotalLikes() && !Phpfox::getService('like')->hasBeenMarked(2, $this->get('type_id'), $this->get('item_id')))
		{
			$sId = '#js_like_body_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id'));
			$this->html($sId, '');
			// $this->call('$("'. $sId .'").parents(".comment_mini_content_holder").hide();');
			return;
		}
		$this->template()->assign(array(
				'aFeed' => array(
					'feed_is_liked' => $bIsLiked,
					'feed_total_like' => Phpfox::getService('like')->getTotalLikes(),
					'like_type_id' => $this->get('type_id'),
					'item_id' => $this->get('item_id'),
					'likes' => $aLikes
				)
			)			
		);
			
		$this->template()->getTemplate('like.block.display');				
		
		if (Phpfox::getService('like')->hasBeenMarked(2, $this->get('type_id'), $this->get('item_id')))
		{
		    $this->call('$("#js_like_body_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id')) . ' .display_actions").before(\'' . $this->getContent(false) . '\');');
		}
		else
		{
		    $this->html('#js_like_body_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id')), $this->getContent(false));
		}
		$this->call('$(\'#js_like_body_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id')) . '\').parents(\'.comment_mini_content_holder:first\').show();');		
	}

	/* This is called when visitor clicks on "Dislike" */
	public function doAction()
	{
		$sTypeId = str_replace('-', '_', $this->get('item_type_id'));
		$this->set(array('type_id' => $sTypeId));
		
		/* If the user has Liked this item*/
		$aLikes = Phpfox::getService('like')->getLikes( $sTypeId, $this->get('item_id'));
		$bIsLiked = false;
		foreach ($aLikes as $aLike)
		{
			if ($aLike['user_id'] == Phpfox::getUserId())
			{
				$bIsLiked = true;
				break;
			}
		}
		
		if (Phpfox::getService('like.process')->doAction($this->get('action_type_id'), $this->get('item_type_id'), $this->get('item_id'), $this->get('module_name') ))
		{			
			//Phpfox::getBlock('like.displayactions', array('aFeed'=> array('type_id' => $this->get('item_type_id'), 'item_id' => $this->get('item_id'))));		
			$sContent = $this->getContent(false);
			$sContent = trim($sContent);
			$this->html('#js_gen_display_action_'.$this->get('item_type_id') . '_' . $this->get('item_id'), $sContent);
			
			$this->set('type_id', str_replace('-','_', $this->get('item_type_id')));			
			
			if ($this->get('counterholder'))
			{
			    $this->call('$("#' . $this->get('counterholder') . '_counter_' . $this->get('item_id') . '").html(' . Phpfox::getService('like')->getTotalMarks($this->get('item_id'), $this->get('item_type_id')) . ');');
			    return;
			}
			// $this->call('console.log("aLikes: ' . count($aLikes) . '");');
                        // Instead of _loadLikeds
                        
			$this->template()->assign(array(
				'aFeed' => array(
					'feed_is_liked' => $bIsLiked,
					'feed_total_like' => Phpfox::getService('like')->getTotalLikes(),
					'like_type_id' => $this->get('type_id'),
					'item_id' => $this->get('item_id'),
					'likes' => $aLikes,
					'feed_id' => $this->get('item_id'),
					'call_displayactions' => true
					)
				)			
			);
				
			$this->template()->getTemplate('like.block.display');				
			
			$sContent = $this->getContent(false);
			$sContent = str_replace("\n", '', $sContent);
			$sId = str_replace('js_feed_like_holder_', '', $this->get('parent_id'));
			$this->html('#js_like_body_' . $sId, $sContent);
			
			
			
			$this->call('$("#js_like_body_'. $this->get('item_id') . '").parents().map( function() { $(this).show(); });');
			
			$this->call('$(\'#js_like_body_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id')) . '\').parents(\'.comment_mini_content_holder:first\').show();');
		}
		else
		{
			
		}
	}
	
	public function removeAction()
	{
	    $sTypeId = $this->get('type_id');
	    $sModuleId = $this->get('module_name');
	    if (empty($sModuleId) && !empty($sTypeId))
	    {
		$this->set('module_name', $sTypeId);
	    }
		if (Phpfox::getService('like.process')->removeAction($this->get('action_type_id'), $this->get('item_type_id'), $this->get('item_id'), $this->get('module_name') ))
		{
			/*Phpfox::getBlock('like.displayactions', array('aFeed'=> array('type_id' => $this->get('item_type_id'), 'item_id' => $this->get('item_id'))));		
			$this->html('#js_gen_display_action_'.$this->get('item_type_id') . '_' . $this->get('item_id'), $this->getContent(false));
			$this->html('#display_action_'.$this->get('item_type_id') . '_' . $this->get('item_id'), $this->getContent(false));*/
                    $sTypeId = str_replace('-', '_', $this->get('item_type_id'));
                    $this->set(array('type_id' => $sTypeId));
                    /* If the user has Liked this item*/
                    $aLikes = Phpfox::getService('like')->getLikes( $sTypeId, $this->get('item_id'));
		    if ($this->get('counterholder'))
		    {
			$this->call('$("#' . $this->get('counterholder') . '_counter_' . $this->get('item_id') . '").html(' . Phpfox::getService('like')->getTotalMarks($this->get('item_id'), $this->get('item_type_id')) . ');');
			return;
		    }
		    
                    $bIsLiked = false;
                    foreach ($aLikes as $aLike)
                    {
                            if ($aLike['user_id'] == Phpfox::getUserId())
                            {
                                    $bIsLiked = true;
                                    break;
                            }
                    }
                    $this->template()->assign(array(
				'aFeed' => array(
					'feed_is_liked' => $bIsLiked,
					'feed_total_like' => Phpfox::getService('like')->getTotalLikes(),
					'like_type_id' => $this->get('type_id'),
					'item_id' => $this->get('item_id'),
					'likes' => $aLikes,
					'feed_id' => $this->get('item_id')	
					)
				)			
			);
				
			$this->template()->getTemplate('like.block.display');
			$this->html('#js_like_body_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id')), $this->getContent(false));
			$this->call('console.log("#js_like_body_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id')) .'");');
			$this->call('$(\'#js_like_body_' . str_replace('js_feed_like_holder_', '', $this->get('parent_id')) . '\').parents(\'.comment_mini_content_holder:first\').show();');                        
		}
		else
		{
		}
	}
}

?>