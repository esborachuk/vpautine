<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 25, 2012, 12:37 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Friend
 * @version 		$Id: request.html.php 3343 2011-10-24 09:02:06Z Miguel_Espinoza $
 */
 
 

 echo '
<script type="text/javascript">
function processList(sValue)
{
	if (sValue == \'\')
	{
		return false;
	}
	
	if (sValue == \'create_new\')
	{
		$(\'#js_list_options\').hide(); 
		$(\'#js_add_new_list\').show();
		return false;
	}
	
	return false;
}

function resetList()
{
	$(\'#js_add_new_list\').hide(); 
	$(\'#js_list_options\').show();
	
	$(\'option\').each(function()
	{
		this.selected = false;
	});
	
	return false;	
}
</script>
'; ?>

<form method="post" action="#" id="js_process_request" onsubmit="return false;">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>';  if ($this->_aVars['bInvite']): ?>
<div><input type="hidden" name="val[invite]" value="true" /></div>
<?php endif;  if ($this->_aVars['bSuggestion']): ?>
<div><input type="hidden" name="val[suggestion]" value="true" /></div>
<?php endif;  if ($this->_aVars['bPageSuggestion']): ?>
<div><input type="hidden" name="val[page_suggestion]" value="true" /></div>
<?php endif; ?>
<div><input type="hidden" name="val[user_id]" value="<?php echo $this->_aVars['aUser']['user_id']; ?>" /></div>
<div class="go_left t_center" id="profile_picture_container" style="width:125px;">
<?php echo Phpfox::getLib('phpfox.image.helper')->display(array('user' => $this->_aVars['aUser'],'suffix' => '_120','max_width' => 120,'max_height' => 120)); ?>
</div>
<div class="request_text">
<?php if ($this->_aVars['sError']): ?>
<?php if ($this->_aVars['sError'] == 'already_asked'): ?>
	<div><?php echo Phpfox::getPhrase('friend.you_have_already_asked_full_name_to_be_your_friend', array('full_name' => $this->_aVars['aUser']['full_name'])); ?></div>
<?php elseif ($this->_aVars['sError'] == 'user_asked_already'): ?>
	<div><?php echo Phpfox::getPhrase('friend.full_name_has_already_asked_to_be_your_friend', array('full_name' => $this->_aVars['aUser']['full_name'])); ?></div>
	<div class="p_4">
<?php echo Phpfox::getPhrase('friend.would_you_like_to_accept_their_request_to_be_friends'); ?>
		<div class="p_4">
			<input type="submit" onclick="$('#js_process_request').ajaxCall('friend.processRequest', 'type=yes&amp;user_id=<?php echo $this->_aVars['aUser']['user_id']; ?>');" value="<?php echo Phpfox::getPhrase('friend.yes'); ?>" class="button" />
			<input type="submit" onclick="$('#js_process_request').ajaxCall('friend.processRequest', 'type=no&amp;user_id=<?php echo $this->_aVars['aUser']['user_id']; ?>');" value="<?php echo Phpfox::getPhrase('friend.no'); ?>" class="button" />
		</div>
	</div>	
<?php elseif ($this->_aVars['sError'] == 'same_user'): ?>
	<div><?php echo Phpfox::getPhrase('friend.cannot_add_yourself_as_a_friend'); ?></div>
<?php elseif ($this->_aVars['sError'] == 'already_friends'): ?>
	<div><?php echo Phpfox::getPhrase('friend.you_are_already_friends_with_full_name', array('full_name' => $this->_aVars['aUser']['full_name'])); ?></div>
<?php endif;  else: ?>
<?php echo Phpfox::getPhrase('friend.user_link_will_have_to_confirm_that_you_are_friends', array('user' => $this->_aVars['aUser'])); ?>.
	<div class="p_top_8">
		<div id="js_personal_link" class="extra_info_link"><a href="#" onclick="$('#js_personal_link').hide(); $('#js_personal_message').show(); return false;"><?php echo Phpfox::getPhrase('friend.add_a_personal_message'); ?></a></div>
		<div id="js_personal_message" style="display:none;">
<?php echo Phpfox::getPhrase('friend.add_a_personal_message_form'); ?>: <a href="#" onclick="$('#js_personal_message').hide(); $('#js_personal_link').show(); return false;"><?php echo Phpfox::getPhrase('friend.cancel'); ?></a>
			<div>
				<textarea id="js_message" rows="4" cols="30" name="val[text]" onkeyup="limitChars('js_message', 250, 'js_limit_info');"></textarea>
				<div id="js_limit_info"><?php echo Phpfox::getPhrase('friend.write_your_message_within_250_characters'); ?></div>
			</div>
		</div>
	</div>
<?php if (Phpfox ::getUserParam('friend.can_add_folders')): ?>
	<div class="p_top_8">
		<div id="js_list_options" style="display:none;">
			<select id="js_options" name="val[list_id]" onchange="return processList(this.value);">
				<option value="" class="sJsDefaultList"><?php echo Phpfox::getPhrase('friend.add_to_a_friend_list'); ?></option>
				<optgroup label="<?php echo Phpfox::getPhrase('friend.lists'); ?>" class="sJsListOptGroup">
<?php if (count((array)$this->_aVars['aOptions'])):  foreach ((array) $this->_aVars['aOptions'] as $this->_aVars['aOption']): ?>
					<option value="<?php echo $this->_aVars['aOption']['list_id']; ?>"><?php echo $this->_aVars['aOption']['name']; ?></option>
<?php endforeach; endif; ?>
				</optgroup>
				<option value="">---</option>
				<option value="create_new"><?php echo Phpfox::getPhrase('friend.create_a_new_list'); ?></option>
			</select> <?php echo Phpfox::getPhrase('friend.optional'); ?>
		</div>
		<div id="js_add_new_list"  style="display:none;">
			<input type="text" name="name" value="" size="20" class="sJsCreateName" /> <input type="submit" value="<?php echo Phpfox::getPhrase('friend.create'); ?>" class="button" onclick="$('.sJsCreateName').ajaxCall('friend.addList', '&amp;type=single');" />
			<div class="p_4">
				<a href="#" onclick="return resetList();"><?php echo Phpfox::getPhrase('friend.show_all_lists'); ?></a>
			</div>
		</div>
	</div>
<?php endif; ?>
	<div class="p_top_8" id="container_submit_friend_request">
		<input type="submit" onclick="<?php if ($this->_aVars['bSuggestion']): ?>$('#js_friend_suggestion').hide(); $('#js_friend_suggestion_loader').show(); <?php endif; ?>$('#js_process_image').show(); $('#js_process_request').ajaxCall('friend.addRequest');" value="<?php echo Phpfox::getPhrase('friend.add_friend'); ?>" class="button" /> <span id="js_process_image" style="display:none;"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'ajax/add.gif')); ?></span>
	</div>
<?php endif; ?>
</div>
<div class="clear"></div>

</form>

