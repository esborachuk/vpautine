<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 25, 2012, 12:00 am */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: logo.html.php 3468 2011-11-07 15:59:47Z Miguel_Espinoza $
 */
 
 

?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme.style.logo', array('id' => $this->_aVars['aStyle']['style_id'])); ?>" enctype="multipart/form-data">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
	<div class="table_header">
<?php echo Phpfox::getPhrase('theme.logo'); ?>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('theme.select_a_logo'); ?>:
		</div>
		<div class="table_right">
			<input type="file" name="logo" />
			<div class="extra_info">
<?php echo Phpfox::getPhrase('theme.you_can_upload_a_jpg_gif_or_png_file'); ?>
<?php if ($this->_aVars['sCurrentStyleLogo']): ?>
					<br /><br />
<?php echo Phpfox::getPhrase('theme.recommended_width_height_width_x_height_pixels', array('width' => $this->_aVars['iWidth'],'height' => $this->_aVars['iHeight'])); ?>
<?php endif; ?>
<?php if (Phpfox ::isModule('photo')): ?>
					<br /><?php echo Phpfox::getPhrase('photo.the_file_size_limit_is_file_size_if_your_upload_does_not_work_try_uploading_a_smaller_picture', array('file_size' => '131071 kb')); ?>
<?php else: ?>
					Maximum file size is 131071 Kb
<?php endif; ?>
			</div>	
		</div>
		<div class="clear"></div>
	</div>
<?php if ($this->_aVars['sCurrentStyleLogo']): ?>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('theme.automatically_resize'); ?>:
		</div>
		<div class="table_right">
			<select name="resize">
				<option value="0"><?php echo Phpfox::getPhrase('theme.no'); ?></option>
				<option value="1"><?php echo Phpfox::getPhrase('theme.yes'); ?></option>
			</select>
		</div>
		<div class="clear"></div>
	</div>		
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('theme.current_logo'); ?>:
		</div>
		<div class="table_right">
			<div class="p_4">
				<img src="<?php echo $this->_aVars['sCurrentStyleLogo']; ?>" alt="" />
<?php if ($this->_aVars['bIsNewLogo']): ?>
				<div class="extra_info">
					<a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme.style.logo', array('id' => $this->_aVars['aStyle']['style_id'],'revert' => '1')); ?>" onclick="return confirm('<?php echo Phpfox::getPhrase('theme.are_you_sure', array('phpfox_squote' => true)); ?>');"><?php echo Phpfox::getPhrase('theme.revert_logo'); ?></a>
				</div>
<?php endif; ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>	
<?php endif; ?>
	<div class="table_clear">
		<input type="submit" value="<?php echo Phpfox::getPhrase('theme.upload_logo'); ?>" class="button" />
	</div>

</form>

