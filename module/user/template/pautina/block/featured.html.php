<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Miguel_Espinoza
 * @package 		Phpfox
 * @version 		$Id: featured.html.php 3785 2011-12-14 06:09:36Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
<ul class="block_listing">
{foreach from=$aFeaturedUsers item=aUser name=featured}
	<li>
		<div class="block_listing_image">
			{img user=$aUser suffix='_100_square' max_width=100 max_height=100}
		</div>
		<div class="block_listing_title" >
			{$aUser|user:'':'':'':12:true}
		</div>
		<div class="clear"></div>
	</li>
{/foreach}
</ul>