<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 25, 2012, 2:02 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: messenger.html.php 2810 2011-08-05 11:33:28Z Raymond_Benc $
 */
 
 

?>
<div id="js_footer_im_holder" class="im_holder js_footer_holder">
	<div class="im_header" id="js_main_chat_header">
<?php echo Phpfox::getPhrase('im.chat'); ?>
	</div>
	<div style="overflow:auto; height:200px;" id="js_im_friend_list">
<?php Phpfox::getBlock('im.list', array()); ?>
	</div>
</div>
