{if PHPFOX_IS_AJAX && Phpfox::getLib('request')->get('theater') == 'true'}

{elseif isset($sFeedType) &&  $sFeedType == 'view'}
{/if}
<ul class="xxxxxx">
    {if Phpfox::isUser() && Phpfox::isModule('like') && isset($aFeed.like_type_id)}
        {if isset($aFeed.like_item_id)}
            {module name='like.link' like_type_id=$aFeed.like_type_id like_item_id=$aFeed.like_item_id like_is_liked=$aFeed.feed_is_liked}
        {else}
            {module name='like.link' like_type_id=$aFeed.like_type_id like_item_id=$aFeed.item_id like_is_liked=$aFeed.feed_is_liked}
        {/if}
    {/if}
</ul>
<div class="clear"></div>