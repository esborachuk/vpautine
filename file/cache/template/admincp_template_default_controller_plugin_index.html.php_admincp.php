<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 19, 2012, 7:05 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package  		Module_Admincp
 * @version 		$Id: index.html.php 979 2009-09-14 14:05:38Z Raymond_Benc $
 */
 
 

 if (count ( $this->_aVars['aPlugins'] )): ?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.plugin'); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
	<table>
	<tr>
		<th><?php echo Phpfox::getPhrase('admincp.name'); ?></th>
		<th style="width:60px;"><?php echo Phpfox::getPhrase('admincp.active'); ?></th>
		<th style="width:200px;"><?php echo Phpfox::getPhrase('admincp.actions'); ?></th>
	</tr>
<?php if (count((array)$this->_aVars['aPlugins'])):  foreach ((array) $this->_aVars['aPlugins'] as $this->_aVars['iKey'] => $this->_aVars['aPlugin']): ?>
	<tr class="checkRow<?php if (is_int ( $this->_aVars['iKey'] / 2 )): ?> tr<?php else:  endif; ?>">
		<td><?php echo $this->_aVars['aPlugin']['title']; ?></td>
		<td class="t_center">
			<div><input type="hidden" name="val[<?php echo $this->_aVars['aPlugin']['plugin_id']; ?>][id]" value="1" /></div>
			<div><input type="checkbox" name="val[<?php echo $this->_aVars['aPlugin']['plugin_id']; ?>][is_active]" value="1" <?php if ($this->_aVars['aPlugin']['is_active']): ?>checked="checked" <?php endif; ?>/></div>
		</td>
		<td>
			<select name="action" class="goJump" style="width:140px;">
				<option value=""><?php echo Phpfox::getPhrase('admincp.select'); ?></option>		
				<option value="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.plugin.add', array('id' => $this->_aVars['aPlugin']['plugin_id'])); ?>"><?php echo Phpfox::getPhrase('admincp.edit'); ?></option>
				<option value="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.plugin', array('delete' => $this->_aVars['aPlugin']['plugin_id'])); ?>" style="color:red;"><?php echo Phpfox::getPhrase('admincp.delete'); ?></option>
			</select>
		</td>
	</tr>
<?php endforeach; endif; ?>
	</table>
	<div class="table_bottom">
		<input type="submit" value="<?php echo Phpfox::getPhrase('admincp.update'); ?>" class="button" />
	</div>

</form>

<?php else: ?>
No plugins have been added.
<ul class="action">
	<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.plugin.add'); ?>"><?php echo Phpfox::getPhrase('admincp.create_a_new_plugin'); ?></a></li>	
</ul>
<?php endif; ?>
