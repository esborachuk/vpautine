<?php
defined('PHPFOX') or exit('NO DICE!');
?>
{if !Phpfox::getService('profile')->timeline()}
<div class="sub_section_menu sub_section_menu_profile">
    <ul>
        {foreach from=$aProfileLinks item=aProfileLink}
        <li class="{if isset($aProfileLink.is_selected)} active{/if}">
            <a href="{url link=$aProfileLink.url}" class="ajax_link" {if isset($aProfileLink.icon)} style="background-image:url('{img theme=$aProfileLink.icon' return_url=true}');"{/if}>


                    {$aProfileLink.phrase}
                    {if isset($aProfileLink.total)}
                    <span>({$aProfileLink.total|number_format})</span>
                    {/if}

            </a>
            {if isset($aProfileLink.sub_menu) && is_array($aProfileLink.sub_menu) && count($aProfileLink.sub_menu)}
            <ul>
                {foreach from=$aProfileLink.sub_menu item=aProfileLinkSub}
                <li class="{if isset($aProfileLinkSub.is_selected)} active{/if}"><a href="{url link=$aProfileLinkSub.url}">{$aProfileLinkSub.phrase}{if isset($aProfileLinkSub.total) && $aProfileLinkSub.total > 0}<span class="pending">{$aProfileLinkSub.total|number_format}</span>{/if}</a></li>
                {/foreach}
            </ul>
            {/if}
        </li>
        {/foreach}
    </ul>
</div>
{/if}

<div class="clear"></div>
<div class="js_cache_check_on_content_block" style="display:none;"></div>
<div class="js_cache_profile_id" style="display:none;">{$aUser.user_id}</div>
<div class="js_cache_profile_user_name" style="display:none;">{$aUser.user_name}</div>