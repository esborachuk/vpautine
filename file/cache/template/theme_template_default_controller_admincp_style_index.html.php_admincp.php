<?php defined('PHPFOX') or exit('NO DICE!'); ?>
<?php /* Cached: August 24, 2012, 11:59 pm */ ?>
<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: index.html.php 1298 2009-12-05 16:19:23Z Raymond_Benc $
 */
 
 

 if (count ( $this->_aVars['aStyles'] )): ?>
<form method="post" action="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme'); ?>">
<?php echo '<div><input type="hidden" name="' . Phpfox::getTokenName() . '[security_token]" value="' . Phpfox::getService('log.session')->getToken() . '" /></div>'; ?>
	<div class="table_header">
<?php echo Phpfox::getPhrase('theme.styles'); ?>
	</div>
	<table>
	<tr>
		<th style="width:20px;"></th>
		<th><?php echo Phpfox::getPhrase('admincp.name'); ?></th>
		<th class="t_center" style="width:60px;"><?php echo Phpfox::getPhrase('theme.default_manage'); ?></th>
		<th class="t_center" style="width:60px;"><?php echo Phpfox::getPhrase('theme.active'); ?></th>
	</tr>
<?php if (count((array)$this->_aVars['aStyles'])):  foreach ((array) $this->_aVars['aStyles'] as $this->_aVars['iKey'] => $this->_aVars['aStyle']): ?>
	<tr class="checkRow<?php if (is_int ( $this->_aVars['iKey'] / 2 )): ?> tr<?php else:  endif; ?>">
		<td class="t_center">
			<a href="#" class="js_drop_down_link" title="Manage"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/bullet_arrow_down.png','alt' => '')); ?></a>
			<div class="link_menu">
				<ul>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme.style.add', array('id' => $this->_aVars['aStyle']['style_id'])); ?>"><?php echo Phpfox::getPhrase('theme.edit_style'); ?></a></li>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme.style.css', array('id' => $this->_aVars['aStyle']['style_id'])); ?>"><?php echo Phpfox::getPhrase('theme.edit_css'); ?></a></li>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme.style.logo', array('id' => $this->_aVars['aStyle']['style_id'])); ?>"><?php echo Phpfox::getPhrase('theme.change_logo'); ?></a></li>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme.style.export', array('id' => $this->_aVars['aStyle']['style_id'])); ?>"><?php echo Phpfox::getPhrase('theme.export_style'); ?></a></li>
<?php if (! $this->_aVars['aStyle']['is_default_style']): ?>
					<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme.style', array('id' => $this->_aVars['aStyle']['theme_id'],'delete' => $this->_aVars['aStyle']['style_id'])); ?>" onclick="return confirm('<?php echo Phpfox::getPhrase('theme.are_you_sure', array('phpfox_squote' => true)); ?>');"><?php echo Phpfox::getPhrase('theme.delete'); ?></a></li>
<?php endif; ?>
				</ul>
			</div>		
		</td>	
		<td><?php echo $this->_aVars['aStyle']['name']; ?></td>
		<td class="t_center">
			<div class="js_item_is_active"<?php if (! $this->_aVars['aStyle']['is_default']): ?> style="display:none;"<?php endif; ?>>
				<a href="#?call=theme.updateStyleDefaultState&amp;id=<?php echo $this->_aVars['aStyle']['style_id']; ?>&amp;active=0" class="js_item_active_link js_remove_default" title="<?php echo Phpfox::getPhrase('theme.remove_as_default'); ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/bullet_green.png','alt' => '')); ?></a>
			</div>
			<div class="js_item_is_not_active"<?php if ($this->_aVars['aStyle']['is_default']): ?> style="display:none;"<?php endif; ?>>
				<a href="#?call=theme.updateStyleDefaultState&amp;id=<?php echo $this->_aVars['aStyle']['style_id']; ?>&amp;active=1" class="js_item_active_link js_remove_default" title="<?php echo Phpfox::getPhrase('theme.set_as_default'); ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/bullet_red.png','alt' => '')); ?></a>
			</div>		
		</td>			
		<td class="t_center">
			<div class="js_item_is_active"<?php if (! $this->_aVars['aStyle']['is_active']): ?> style="display:none;"<?php endif; ?>>
				<a href="#?call=theme.updateStyleActivity&amp;id=<?php echo $this->_aVars['aStyle']['style_id']; ?>&amp;active=0" class="js_item_active_link" title="<?php echo Phpfox::getPhrase('theme.deactivate'); ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/bullet_green.png','alt' => '')); ?></a>
			</div>
			<div class="js_item_is_not_active"<?php if ($this->_aVars['aStyle']['is_active']): ?> style="display:none;"<?php endif; ?>>
				<a href="#?call=theme.updateStyleActivity&amp;id=<?php echo $this->_aVars['aStyle']['style_id']; ?>&amp;active=1" class="js_item_active_link" title="<?php echo Phpfox::getPhrase('theme.activate'); ?>"><?php echo Phpfox::getLib('phpfox.image.helper')->display(array('theme' => 'misc/bullet_red.png','alt' => '')); ?></a>
			</div>		
		</td>	
	</tr>
<?php endforeach; endif; ?>
	</table>
	<div class="table_bottom">
		<input type="submit" value="<?php echo Phpfox::getPhrase('admincp.update'); ?>" class="button" />
	</div>

</form>

<?php else: ?>
<div class="message">
<?php echo Phpfox::getPhrase('theme.no_styles_found'); ?>
</div>
<ul class="action">
	<li><a href="<?php echo Phpfox::getLib('phpfox.url')->makeUrl('admincp.theme.style.add', array('theme' => $this->_aVars['aTheme']['theme_id'])); ?>"><?php echo Phpfox::getPhrase('theme.create_a_new_style'); ?></a></li>
</ul>
<?php endif; ?>
