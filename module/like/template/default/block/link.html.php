<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: link.html.php 5100 2013-01-08 09:29:05Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if Phpfox::getParam('like.allow_dislike') && isset($aActions)}
	
		<script type="text/javascript">
			
			var bIsLiked = {if $aLike.like_is_liked}true{else}false{/if};
			
			{literal}
			if (typeof $Core.Like == 'undefined') $Core.Like = {};
			$Core.Like.Actions = 
			{
				doAction: function(sActionTypeId, sItemTypeId, iItemId, sModule, sIteration, iParentId, oObj)
				{
					$(oObj).parent().parent().parent().after('<div id="js_gen_display_action_' + sItemTypeId + '_' + iItemId + '"></div>');
					window.oTempO = oObj;
					
					/* Figure out if this item has been liked */
					if ( $(oObj).parent().find('.js_like_link_unlike').is(':visible') )
					{
						/* it has been liked, so we unlike it */
						$(oObj).parent().find('.js_like_link_unlike').click();
					}
					
					$.ajaxCall('like.doAction', 'action_type_id=' + sActionTypeId + '&item_type_id=' + sItemTypeId + '&item_id=' + iItemId + '&module_name=' + sModule + '&parent_id=' + iParentId);
					/* $('.like_action_' + sActionTypeId + '_' + sIteration).each(function(){$(this).toggle();});			*/
					$(oObj).parent().find('a.like_action').toggle();
					
				},
				removeAction: function(sActionTypeId, sItemTypeId, iItemId, sModule, sIteration, iParentId, oObj)
				{
					
					$.ajaxCall('like.removeAction', 'action_type_id=' + sActionTypeId + '&item_type_id=' + sItemTypeId + '&item_id=' + iItemId + '&module_name=' + sModule + '&parent_id=' + iParentId);
					$(oObj).parent().find('a.like_action').toggle();
				}
			};
			$Behavior.assertDislikesDiv = function()
			{
				
				
			}
		</script>
	{/literal}
{/if}

<li class="li_action">
	<a href="#" onclick="if ( $(this).parent().find('.like_action_unmarked').is(':visible')){l} $(this).parent().find('.like.action.unmarked').click(); {r}else{l}{r}$(this).parents('div:first').find('.js_like_link_unlike:first').show(); $(this).hide(); $.ajaxCall('like.add', 'type_id={$aLike.like_type_id}&amp;item_id={$aLike.like_item_id}&amp;parent_id={if isset($aFeed.feed_id)}{$aFeed.feed_id}{else}{/if}{if $aLike.like_is_custom}&amp;custom_inline=1{/if}', 'GET'); return false;" class="js_like_link_like"{if $aLike.like_is_liked} style="display:none;"{/if}>{phrase var='feed.like'}</a>
	<a href="#" onclick="$(this).parents('div:first').find('.js_like_link_like:first').show(); $(this).hide(); $.ajaxCall('like.delete', 'type_id={$aLike.like_type_id}&amp;item_id={$aLike.like_item_id}&amp;parent_id={if isset($aFeed.feed_id)}{$aFeed.feed_id}{else}{/if}{if $aLike.like_is_custom}&amp;custom_inline=1{/if}', 'GET'); return false;" class="js_like_link_unlike"{if $aLike.like_is_liked}{else} style="display:none;"{/if}>{phrase var='feed.unlike'}</a>

{if Phpfox::getParam('like.allow_dislike') && isset($aActions) && is_array($aActions) && !empty($aActions)}
	{foreach from=$aActions name=action item=aAction}
	{if isset($aAction.action_type_id)}
	&middot;
		<a href="#" onclick="$Core.Like.Actions.doAction('{$aAction.action_type_id}', '{$aAction.item_type_id}', {$aAction.item_id}, '{$aAction.module_name}', {$aAction.iActionIteration},  {$aFeed.feed_id}, this); return false;" class="like_action_{$aAction.action_type_id}_{$aAction.iActionIteration} like_action like_action_marked" {if $aAction.is_marked}style="display:none;"{/if}>
			&nbsp;{$aAction.phrase}
		</a>
		<a href="#" onclick="$Core.Like.Actions.removeAction('{$aAction.action_type_id}', '{$aAction.item_type_id}', {$aAction.item_id}, '{$aAction.module_name}', {$aAction.iActionIteration},  {$aFeed.feed_id}, this); return false;" class="like_action_{$aAction.action_type_id}_{$aAction.iActionIteration} like_action like_action_unmarked" {if !$aAction.is_marked}style="display:none;"{/if}>
			&nbsp;Remove {$aAction.phrase}
		</a>
	{/if}
	{/foreach}
{else}
	
{/if}
</li>