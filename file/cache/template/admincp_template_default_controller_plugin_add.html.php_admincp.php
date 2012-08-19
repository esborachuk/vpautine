<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 19, 2012, 6:57 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Admincp
 * @version 		$Id: add.html.php 979 2009-09-14 14:05:38Z Raymond_Benc $
 */
 


 echo $this->_aVars['sCreateJs']; ?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl("admincp.plugin.add"); ?>" id="js_form" onsubmit="<?php echo $this->_aVars['sGetJsForm']; ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
<?php if ($this->_aVars['bIsEdit']): ?>
	<div><input type="hidden" name="id" value="<?php echo $this->_aVars['aForms']['plugin_id']; ?>" /></div>
<?php endif; ?>
	<div class="table_header">
<?php echo Phpfox::getPhrase('admincp.plugin_details'); ?>
	</div>
<?php Phpfox::getBlock('admincp.product.form', array()); ?>
<?php Phpfox::getBlock('admincp.module.form', array()); ?>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.title'); ?>:
		</div>
		<div class="table_right">
			<input type="text" name="val[title]" value="<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['title']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['title']) : (isset($this->_aVars['aForms']['title']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['title']) : '')); ?>
" size="30" id="title" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.hook'); ?>:
		</div>
		<div class="table_right">
			<select name="val[call_name]" id="call_name">
				<option value=""><?php echo Phpfox::getPhrase('admincp.select'); ?>:</option>
<?php if (count((array)$this->_aVars['aHooks'])):  foreach ((array) $this->_aVars['aHooks'] as $this->_aVars['hook_type'] => $this->_aVars['aHook1']): ?>
				<optgroup label="<?php echo $this->_aVars['hook_type']; ?>">
<?php if (count((array)$this->_aVars['aHook1'])):  foreach ((array) $this->_aVars['aHook1'] as $this->_aVars['module_name'] => $this->_aVars['aHook2']): ?>
<?php if ($this->_aVars['hook_type'] != 'library'): ?>
					<option value="" style="font-weight:bold;"><?php echo Phpfox::getLib('phpfox.locale')->translate($this->_aVars['module_name'], 'module'); ?></option>
<?php endif; ?>
<?php if (count((array)$this->_aVars['aHook2'])):  foreach ((array) $this->_aVars['aHook2'] as $this->_aVars['aHook3']): ?>
						<option value="<?php echo $this->_aVars['aHook3']['call_name']; ?>"<?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val'));


if (isset($this->_aVars['aField']) && isset($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]) && !is_array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]))
							{
								$this->_aVars['aForms'][$this->_aVars['aField']['field_id']] = array($this->_aVars['aForms'][$this->_aVars['aField']['field_id']]);
							}

if (isset($this->_aVars['aForms'])
 && is_numeric('call_name') && in_array('call_name', $this->_aVars['aForms']))
							
{
								echo ' selected="selected" ';
							}

							if (isset($aParams['call_name'])
								&& $aParams['call_name'] == $this->_aVars['aHook3']['call_name'])

							{

								echo ' selected="selected" ';

							}

							else

							{

								if (isset($this->_aVars['aForms']['call_name'])
									&& !isset($aParams['call_name'])
									&& $this->_aVars['aForms']['call_name'] == $this->_aVars['aHook3']['call_name'])
								{
								 echo ' selected="selected" ';
								}
								else
								{
									echo "";
								}
							}
							?>
><?php if ($this->_aVars['hook_type'] != 'library'): ?>--- <?php endif;  echo $this->_aVars['aHook3']['call_name']; ?></option>
<?php endforeach; endif; ?>
<?php endforeach; endif; ?>
				</optgroup>
<?php endforeach; endif; ?>
			</select>
		</div>
		<div class="clear"></div>
	</div>
	<div class="table">
		<div class="table_left">
<?php echo Phpfox::getPhrase('admincp.active'); ?>:
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
/> <?php echo Phpfox::getPhrase('admincp.yes'); ?></span>
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
/> <?php echo Phpfox::getPhrase('admincp.no'); ?></span>
			</div>
		</div>
		<div class="clear"></div>
	</div>	
	<div class="table_header">
<?php echo Phpfox::getPhrase('admincp.php_code'); ?>
	</div>
	<div class="table">
		<div class="table_span">
			<textarea name="val[php_code]" rows="20" cols="50" style="width:98%;" id="php_code"><?php $aParams = (isset($aParams) ? $aParams : Phpfox::getLib('phpfox.request')->getArray('val')); echo (isset($aParams['php_code']) ? Phpfox::getLib('phpfox.parse.output')->clean($aParams['php_code']) : (isset($this->_aVars['aForms']['php_code']) ? Phpfox::getLib('phpfox.parse.output')->clean($this->_aVars['aForms']['php_code']) : '')); ?>
</textarea>
		</div>
	</div>
	<div class="table_clear">
		<input type="submit" value="<?php echo Phpfox::getPhrase('admincp.save'); ?>" class="button" />
	</div>	

</form>

