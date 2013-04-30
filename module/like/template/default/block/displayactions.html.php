<div class="display_actions" id="display_actions_{if isset($aLike)}{$aLike.like_item_id}{else}{if isset($aFeed)}{$aFeed.feed_id}{/if}{/if}">
	<div class="comment_mini_content_holder">
		<div class="comment_mini_content_holder_icon"></div>
		<div class="comment_mini_content_border">						
			<div class="js_comment_like_holder" id="">
				{foreach from=$aActions key=sKey item=aAction}
					<div class="activity_like_holder comment_mini">
						{img theme='layout/dislike.png' class='v_middle'}&nbsp;{$aAction.phrase}
					</div>
				{/foreach}
			</div>
		</div>
	</div>
</div>