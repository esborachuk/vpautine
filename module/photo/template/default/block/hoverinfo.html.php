<?php

?>
{if Phpfox::getParam('photo.show_info_on_mouseover')}
    <div class="photo_hover_info">
	{img theme='layout/thickbox_bg.png' class='bg'}
	<div class="photo_hover_info_album_title">
		<strong>
		{if isset($aPhoto.album_name)}
		{$aPhoto.album_name|clean|shorten:22:'...'}		
		{elseif !empty($aPhoto.title)}
		{$aPhoto.title|clean|shorten:22:'...'}
		{/if}	
		</strong>
		{if isset($aPhoto.user_name)}<div>{$aPhoto|user}</div>{/if} 
	</div>
	<div class="photo_hover_info_actions">
	    {if Phpfox::isModule('like')}
		<div class="photo_hover_info_actions_do">
		    <a href="#" class="js_like_photo js_toggle_like_{$aPhoto.photo_id}" id="js_like_{$aPhoto.photo_id}" {if isset($aPhoto.is_liked) && $aPhoto.is_liked}style="display:none;"{/if} onclick="$Core.Photo.inlineAction({$aPhoto.photo_id}, 'js_like', 'add', 'js_toggle_like_{$aPhoto.photo_id}');return false;">Like</a>
		    <a href="#" class="js_unlike_photo js_toggle_like_{$aPhoto.photo_id}" id="js_undislike_{$aPhoto.photo_id}" {if !isset($aPhoto.is_liked) || !$aPhoto.is_liked}style="display:none;"{/if} onclick="$Core.Photo.inlineAction({$aPhoto.photo_id}, 'js_like', 'delete', 'js_toggle_like_{$aPhoto.photo_id}'); return false;"> Unlike</a>
		    {* if Phpfox::getParam('like.allow_dislike')}|
		    <a href="#" class="js_dislike_photo js_toggle_dislike_{$aPhoto.photo_id}" id="js_dislike_photo_{$aPhoto.photo_id}" {if isset($aPhoto.is_disliked) && $aPhoto.is_disliked}style="display:none;"{/if} onclick="$Core.Photo.inlineAction({$aPhoto.photo_id}, 'js_dislike', 'doAction', 'js_toggle_dislike_{$aPhoto.photo_id}');return false;">Dislike</a>
		    <a href="#" class="js_undislike_photo js_toggle_dislike_{$aPhoto.photo_id}" id="js_undislike_{$aPhoto.photo_id}" {if isset($aPhoto.is_disliked) && !$aPhoto.is_disliked}style="display:none;"{/if} onclick="$Core.Photo.inlineAction({$aPhoto.photo_id}, 'js_dislike', 'removeAction', 'js_toggle_dislike_{$aPhoto.photo_id}');return false;">Undislike</a>
		    {/if *}
		</div>
		<div class="photo_hover_info_actions_counter">
		    <div class="js_like_counter" id="js_like_counter_{$aPhoto.photo_id}">
		    	{img theme='layout/like.png'} {if isset($aPhoto.total_like)}{$aPhoto.total_like}{else}0{/if}
		    </div>
		</div>
	    {/if}
	</div>
    </div>
{/if}