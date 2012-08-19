<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 19, 2012, 7:11 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: add.html.php 3468 2011-11-07 15:59:47Z Miguel_Espinoza $
 */
 
 

?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme.style.add'); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
<?php if ($this->_aVars['bIsEdit']): ?>
	<div><input type="hidden" name="id" value="<?php echo $this->_aVars['aForms']['style_id']; ?>" /></div>
<?php endif; ?>
	<div class="table_header">
<?php echo Phpfox::getPhrase('theme.style_details'); ?>
	</div>
<?php if (! $this->_aVars['bIsEdit']): ?>
	<div class="table">
		<div class="table_left">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('theme.parent_theme'); ?>:
		</div>
		<div class="table_right">
			<select name="val[theme_id]">
				<option value="0"><?php echo Phpfox::getPhrase('theme.select'); ?>:</option>
<?php if (count((array)$this->_aVars['aThemes'])):  foreach ((array) $this->_aVars['aThemes'] as $this->_aVars['aTheme']): ?>
				<option value="<?php echo $this->_aVars['aTheme']['theme_id']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('theme_id') && in_array('theme_id', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['theme_id'])
								&& $aParams['theme_id'] == $this->_aVars['aTheme']['theme_id'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['theme_id'])
									&& !isset($aParams['theme_id'])
									&& $this->_aVars['aForms']['theme_id'] == $this->_aVars['aTheme']['theme_id'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo $this->_aVars['aTheme']['name']; ?></option>
<?php endforeach; endif; ?>
			</select>
		</div>
		<div class="clear"></div>
	</div>		
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('theme.parent_style'); ?>:
		</div>
		<div class="table_right">
			<select name="val[parent_id]">
<?php if (count((array)$this->_aVars['aStyles'])):  foreach ((array) $this->_aVars['aStyles'] as $this->_aVars['aStyle']): ?>
				<option value="<?php echo $this->_aVars['aStyle']['style_id']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('parent_id') && in_array('parent_id', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['parent_id'])
								&& $aParams['parent_id'] == $this->_aVars['aStyle']['style_id'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['parent_id'])
									&& !isset($aParams['parent_id'])
									&& $this->_aVars['aForms']['parent_id'] == $this->_aVars['aStyle']['style_id'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php echo $this->_aVars['aStyle']['name']; ?></option>
<?php endforeach; endif; ?>
			</select>
		</div>
		<div class="clear"></div>
	</div>	
<?php endif; ?>
	<div class="table">
		<div class="table_left">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('theme.name'); ?>:
		</div>
		<div class="table_right">
			<input type="text" name="val[name]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['name']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['name']) : (isset($this->_aVars['aForms']['name']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['name']) : '')); ?>
" size="40" />
		</div>
		<div class="clear"></div>
	</div>
<?php if (! $this->_aVars['bIsEdit']): ?>
	<div class="table">
		<div class="table_left">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('theme.folder_name'); ?>:
		</div>
		<div class="table_right">
			<input type="text" name="val[folder]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['folder']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['folder']) : (isset($this->_aVars['aForms']['folder']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['folder']) : '')); ?>
" size="40" />
		</div>
		<div class="clear"></div>
	</div>	
<?php endif; ?>
	<div class="table">
		<div class="table_left">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('theme.logo_image'); ?>:
		</div>
		<div class="table_right">
			<input type="text" name="val[logo_image]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['logo_image']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['logo_image']) : (isset($this->_aVars['aForms']['logo_image']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['logo_image']) : '')); ?>
" size="40" />			
			<div class="extra_info">
<?php echo Phpfox::getPhrase('theme.default_logo_file_name_eg_logo_png'); ?>
			</div>
		</div>
		<div class="clear"></div>
	</div>	
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('theme.creator'); ?>:
		</div>
		<div class="table_right">
			<input type="text" name="val[creator]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['creator']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['creator']) : (isset($this->_aVars['aForms']['creator']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['creator']) : '')); ?>
" size="40" />
		</div>
		<div class="clear"></div>
	</div>		
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('theme.website'); ?>:
		</div>
		<div class="table_right">
			<input type="text" name="val[website]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['website']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['website']) : (isset($this->_aVars['aForms']['website']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['website']) : '')); ?>
" size="40" />
		</div>
		<div class="clear"></div>
	</div>		
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('theme.version'); ?>:
		</div>
		<div class="table_right">
			<input type="text" name="val[version]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['version']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['version']) : (isset($this->_aVars['aForms']['version']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['version']) : '')); ?>
" size="10" />
		</div>
		<div class="clear"></div>
	</div>		
	<div class="table">
		<div class="table_left">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('theme.is_default'); ?>:
		</div>
		<div class="table_right">	
			<div class="item_is_active_holder">		
				<span class="js_item_active item_is_active"><input type="radio" name="val[is_default]" value="1" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));
if (isset($this->_aVars['aForms']) && is_numeric('is_default') && in_array('is_default', $this->_aVars['aForms']) ){echo ' checked="checked"';}
if ((isset($aParams['is_default']) && $aParams['is_default'] == '1'))
{echo ' checked="checked" ';}
else
{
 if (isset($this->_aVars['aForms']) && isset($this->_aVars['aForms']['is_default']) && !isset($aParams['is_default']) && $this->_aVars['aForms']['is_default'] == '1')
 {
    echo ' checked="checked" ';}
 else
 {
 }
}
?> 
/> <?php echo Phpfox::getPhrase('theme.yes'); ?></span>
				<span class="js_item_active item_is_not_active"><input type="radio" name="val[is_default]" value="0" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));
if (isset($this->_aVars['aForms']) && is_numeric('is_default') && in_array('is_default', $this->_aVars['aForms']) ){echo ' checked="checked"';}
if ((isset($aParams['is_default']) && $aParams['is_default'] == '0'))
{echo ' checked="checked" ';}
else
{
 if (isset($this->_aVars['aForms']) && isset($this->_aVars['aForms']['is_default']) && !isset($aParams['is_default']) && $this->_aVars['aForms']['is_default'] == '0')
 {
    echo ' checked="checked" ';}
 else
 {
 if (!isset($this->_aVars['aForms']) || ((isset($this->_aVars['aForms']) && !isset($this->_aVars['aForms']['is_default']) && !isset($aParams['is_default']))))
{
 echo ' checked="checked"';
}
 }
}
?> 
/> <?php echo Phpfox::getPhrase('theme.no'); ?></span>
			</div>
		</div>
		<div class="clear"></div>		
	</div>			
	<div class="table">
		<div class="table_left">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif;  echo Phpfox::getPhrase('theme.is_active'); ?>:
		</div>
		<div class="table_right">	
			<div class="item_is_active_holder">		
				<span class="js_item_active item_is_active"><input type="radio" name="val[is_active]" value="1" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));
if (isset($this->_aVars['aForms']) && is_numeric('is_active') && in_array('is_active', $this->_aVars['aForms']) ){echo ' checked="checked"';}
if ((isset($aParams['is_active']) && $aParams['is_active'] == '1'))
{echo ' checked="checked" ';}
else
{
 if (isset($this->_aVars['aForms']) && isset($this->_aVars['aForms']['is_active']) && !isset($aParams['is_active']) && $this->_aVars['aForms']['is_active'] == '1')
 {
    echo ' checked="checked" ';}
 else
 {
 if (!isset($this->_aVars['aForms']) || ((isset($this->_aVars['aForms']) && !isset($this->_aVars['aForms']['is_active']) && !isset($aParams['is_active']))))
{
 echo ' checked="checked"';
}
 }
}
?> 
/> <?php echo Phpfox::getPhrase('theme.yes'); ?></span>
				<span class="js_item_active item_is_not_active"><input type="radio" name="val[is_active]" value="0" <?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));
if (isset($this->_aVars['aForms']) && is_numeric('is_active') && in_array('is_active', $this->_aVars['aForms']) ){echo ' checked="checked"';}
if ((isset($aParams['is_active']) && $aParams['is_active'] == '0'))
{echo ' checked="checked" ';}
else
{
 if (isset($this->_aVars['aForms']) && isset($this->_aVars['aForms']['is_active']) && !isset($aParams['is_active']) && $this->_aVars['aForms']['is_active'] == '0')
 {
    echo ' checked="checked" ';}
 else
 {
 }
}
?> 
/> <?php echo Phpfox::getPhrase('theme.no'); ?></span>
			</div>
		</div>
		<div class="clear"></div>		
	</div>	
	
	<div class="table_header">
		Custom Values
	</div>
	<div class="table">
		<div class="table_left">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif; ?>Left Column Width:
		</div>
		<div class="table_right">
			<input type="text" name="val[l_width]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['l_width']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['l_width']) : (isset($this->_aVars['aForms']['l_width']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['l_width']) : '')); ?>
" size="10" />
		</div>
		<div class="clear"></div>
	</div>	
	<div class="table">
		<div class="table_left">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif; ?>Center Column Width:
		</div>
		<div class="table_right">
			<input type="text" name="val[c_width]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['c_width']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['c_width']) : (isset($this->_aVars['aForms']['c_width']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['c_width']) : '')); ?>
" size="10" />
		</div>
		<div class="clear"></div>
	</div>		
	<div class="table">
		<div class="table_left">
<?php if (Phpfox::getParam('core.display_required')): ?><span class="required"><?php echo Phpfox::getParam('core.required_symbol'); ?></span><?php endif; ?>Right Column Width:
		</div>
		<div class="table_right">
			<input type="text" name="val[r_width]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['r_width']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['r_width']) : (isset($this->_aVars['aForms']['r_width']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['r_width']) : '')); ?>
" size="10" />
		</div>
		<div class="clear"></div>
	</div>		
	
	<div class="table_clear">
		<input type="submit" value="<?php if ($this->_aVars['bIsEdit']):  echo Phpfox::getPhrase('theme.update');  else:  echo Phpfox::getPhrase('theme.submit');  endif; ?>" class="button" />
	</div>

</form>

