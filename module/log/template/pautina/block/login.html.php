<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: login.html.php 2536 2011-04-14 19:37:29Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if count($aLoggedInUsers)}
<div class="block_listing_inline last_users_block">
	<ul>
{foreach from=$aLoggedInUsers name=loggedusers item=aLoggedInUser}
	<li class="slide_wrapper">
		{img user=$aLoggedInUser suffix='_100_square' max_width=100 max_height=100}
        <div class="slide-block" style="display: none">{$aLoggedInUser.full_name|shorten:40}</div>

	</li>
{/foreach}
	</ul>
	<div class="clear"></div>
</div>
{/if}