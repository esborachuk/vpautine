<?php 
defined('PHPFOX') or exit('NO DICE!');

?>
{if Phpfox::getService('profile')->timeline()}
{if !empty($sProfileImage)}
	<div class="profile_timeline_profile_photo">
        {if Phpfox::isModule('photo')}
			<a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
		{else}
			{$sProfileImage}
		{/if}
	</div>
{/if}
{else}
{if !empty($sProfileImage)}
<div class="profile_image">
    <div class="profile_image_holder">
        {if Phpfox::isModule('photo')}
			<a href="{permalink module='photo.album.profile' id=$aUser.user_id title=$aUser.user_name}">{$sProfileImage}</a>
		{else}
			{$sProfileImage}
		{/if}
    </div>
	{if Phpfox::getUserId() == $aUser.user_id}
	<div class="p_4">
		<a href="{url link='user.photo'}">{phrase var='profile.change_picture'}</a>
	</div>
	{/if}
</div>
{/if}

{/if}

<div class="js_cache_check_on_content_block" style="display:none;"></div>
<div class="js_cache_profile_id" style="display:none;">{$aUser.user_id}</div>
<div class="js_cache_profile_user_name" style="display:none;">{$aUser.user_name}</div>