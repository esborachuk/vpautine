{if Phpfox::getParam('like.show_user_photos')}
<div class="activity_like_holder comment_mini" style="position:relative;">
    <ul class="activity_like_holder_links">
        <li class="feed_likes_count_block">
            {$aFeed.feed_total_like|number_format}
        </li>
        {if isset($aFeed.like_item_id)}
            {module name='like.link' like_type_id=$aFeed.like_type_id like_item_id=$aFeed.like_item_id like_is_liked=$aFeed.feed_is_liked}
        {else}
            {module name='like.link' like_type_id=$aFeed.like_type_id like_item_id=$aFeed.item_id like_is_liked=$aFeed.feed_is_liked}
        {/if}
    </ul>
	{foreach from=$aFeed.likes name=likes item=aLikeRow}{img user=$aLikeRow suffix='_50_square' max_width=20 max_height=20 class='js_hover_title v_middle'}&nbsp;{/foreach}
</div>
{else}<div class="activity_like_holder comment_mini">{img theme='layout/like.png' class='v_middle'}&nbsp;{if $aFeed.feed_is_liked}{if !count($aFeed.likes) == 1}{phrase var='like.you'}{elseif count($aFeed.likes) == 1}{phrase var='like.you_and'}&nbsp;{else}{phrase var='like.you_comma'} {/if}{else}{phrase var='like.article_to_upper'}{/if}{foreach from=$aFeed.likes name=likes item=aLikeRow}{if $aFeed.feed_is_liked || $phpfox.iteration.likes > 1}{phrase var='like.article_to_lower'}{/if}{$aLikeRow|user:'':'':30}{if $phpfox.iteration.likes == (count($aFeed.likes) - 1) && $aFeed.feed_total_like <= Phpfox::getParam('feed.total_likes_to_display')}&nbsp;{phrase var='like.and'}&nbsp;{elseif $phpfox.iteration.likes != count($aFeed.likes)},&nbsp;{/if}{/foreach}{if $aFeed.feed_total_like >Phpfox::getParam('feed.total_likes_to_display')}<a href="#" onclick="return $Core.box('like.browse', 400, 'type_id={$aFeed.like_type_id}&amp;item_id={$aFeed.item_id}');">{if $iTotalLeftShow = ($aFeed.feed_total_like - Phpfox::getParam('feed.total_likes_to_display'))}{/if}{if $iTotalLeftShow == 1}&nbsp;{phrase var='like.and'}&nbsp;{phrase var='like.1_other_person'}&nbsp;{else}&nbsp;{phrase var='like.and'}&nbsp;{$iTotalLeftShow|number_format}&nbsp;{phrase var='like.others'}&nbsp;{/if}</a>{phrase var='like.likes_this'}{else}{if (count($aFeed.likes) > 1)}&nbsp;{phrase var='like.like_this'}{else}{if $aFeed.feed_is_liked}{if count($aFeed.likes) == 1}&nbsp;{phrase var='like.like_this'}{else}{if count($aFeed.likes) == 0}&nbsp;{phrase var='like.you_like'}{else}{phrase var='like.likes_this'}{/if}{/if}{else}{if count($aFeed.likes) == 1}&nbsp;{phrase var='like.likes_this'}{else}{phrase var='like.like_this'}{/if}{/if}{/if}{/if}</div>{/if}