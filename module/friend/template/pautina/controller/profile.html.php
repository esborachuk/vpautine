<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: profile.html.php 4097 2012-04-16 13:45:26Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if count($aFriends)}
{foreach from=$aFriends name=friend item=aFriend}
<div id="js_friend_{$aFriend.friend_id}" class="go_left profile_friend_block">
	<div class="t_center">
		{img user=$aFriend suffix='_100_square' max_width=100 max_height=100}
	</div>
	<div class="profile_friend_name slide-block">
		<span class="row_title_link">{$aFriend|user:'':'':50}</span>
	</div>
	<div class="clear"></div>
</div>
{/foreach}
<div class="clear"></div>
{pager}
{else}

{if $sFriendView == 'online'}
<div class="extra_info">
	{phrase var='friend.no_friends_online'}
</div>
{else}

{if $aUser.user_id == Phpfox::getUserId()}
<div class="extra_info">{phrase var='friend.you_have_not_added_any_friends_yet'}</div>
<ul class="action">
	<li><a href="{url link='friend.find'}">{phrase var='friend.search_for_friends'}</a></li>
	<li><a href="{url link='user.browse'}">{phrase var='friend.browse_members'}</a></li>
</ul>
{else}
<div class="extra_info">{phrase var='friend.user_link_has_not_added_any_friends' user=$aUser}</div>
<ul class="action">	
	<li><a href="{url link='user.browse'}">{phrase var='friend.browse_other_members'}</a></li>
</ul>
{/if}

{/if}

{/if}