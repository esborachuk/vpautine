<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond_Benc
 * @package 		Phpfox
 * @version 		$Id: albums.html.php 5111 2013-01-10 13:16:46Z Miguel_Espinoza $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if $bSpecialMenu}
    {template file='photo.block.specialmenu'}
{/if}


{if count($aAlbums)}
    <div class="albums_container">
	<div class="albums_container_row">
	{foreach from=$aAlbums item=aAlbum name=albums}
	
	    {template file='photo.block.album-entry'}
	    {if Phpfox::getParam('photo.show_info_on_mouseover') && (is_int($phpfox.iteration.albums/3))}
		</div><div class="albums_container_row">
	    {/if}
	{/foreach}
	
	{if Phpfox::getParam('photo.show_info_on_mouseover') && (!is_int($phpfox.iteration.albums/3))}
	    </div>
	{/if}
	    
	    
    </div>
    <div class="clear"></div>
    {pager}
{else}
    <div class="extra_info">
	    {phrase var='photo.no_albums_found_here'}
    </div>
{/if}