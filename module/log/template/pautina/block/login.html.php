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
<div class="block_listing_inline">
	<ul>
{foreach from=$aLoggedInUsers name=loggedusers item=aLoggedInUser}
	<li>
		{img user=$aLoggedInUser suffix='_100_square' max_width=100 max_height=100 class='js_hover_title'}
	</li>
{/foreach}
	</ul>
	<div class="clear"></div>
</div>
{/if}