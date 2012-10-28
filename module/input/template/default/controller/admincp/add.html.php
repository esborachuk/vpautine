<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author  		Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: add.html.php 4074 2012-03-28 14:02:40Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>


<div id="js_field_holder">
	<form method="post" onsubmit="return $Core.input.checkSubmit();" action="{if $bIsEdit != 0}{url link='admincp.input.add'}id_{$bIsEdit}/{else}{url link='admincp.input.add'}{/if}" id="js_custom_field">
		<div class="table_header">
			{phrase var='custom.field_details'}
		</div>
		
		<div class="table">
			<div class="table_left">
				You want to see this input when adding a new:
			</div>
			<div class="table_right">
				<select name="val[module]" id="lst_module">
					{foreach from=$aModulesEnabled item=aModule key=sModule}		
						<option value="{$aModule.module_id}.{$aModule.action}" id="{$aModule.module_id}.{$aModule.action}">{$aModule.module_phrase}</option>
					{/foreach}
				</select>
			</div>
		</div>
		
		<div class="table">
			<div class="table_left">
				What type of input do you want?:
			</div>
			<div class="table_right">
				<select name="val[type_id]" id="select_type">
					<option value="shorttext" id="opt_shorttext">Short Text</option>
					<option value="longtext" id="opt_longtext">Long Text</option>
					<option value="select" id="opt_select">Drop Down List</option>
					<option value="multiselect" id="opt_multiselect">Drop Down List with Multiple Selection</option>
					<option value="radio" id="opt_radio">Radio List</option>
					<option value="checkbox" id="opt_checkbox">Marks List</option>
				</select>
			</div>
		</div>
		
		<div class="table" id="div_options">
			<div class="table_left">
				Please add options to this new input:
			</div>
			<div class="table_right">
				<div id="div_input_option"></div>
					<input type="button" id="btn_addOption" value="New Option" onclick="$Core.input.addOption();" class="button">
			</div>
		</div>
		
		<div class="table">
			<div class="table_left">
				What name do you want for this input?
			</div>
			<div class="table_right">
				<div id="div_input_name">
				</div>
				{* These inputs are added from a JS function that takes into account languages and existing values *}
			</div>
		</div>
		
		<div class="table">
			<div class="table_left">
				Who should be able to add info to this input:
			</div>
			<div class="table_right">
				{foreach from=$aUserGroups item=aGroup}
					<div>						
						<input id="user_group_id_{$aGroup.user_group_id}" class="chk_input" type="checkbox" name="val[condition][usergroup][]" value="{$aGroup.user_group_id}">
						<label for="group_{$aGroup.user_group_id}">{$aGroup.title}</label>
					</div>
				{/foreach}
			</div>
		</div>
		
		<div class="table">
			<div class="table_left">
				Should we force users to enter a value here?
			</div>
			<div class="table_right">
				<select name="val[required]" id="lst_required">
					<option value="1" id="opt_required_yes">Yes</option>
					<option value="2"id="opt_required_no">No</option>
				</select>
			</div>
		</div>
		
		<div class="table_clear">
			<input type="submit" value="{if $bIsEdit}{phrase var='custom.update'}{else}{phrase var='custom.add'}{/if}" class="button" />			
		</div>
	</form>
</div>

