<?php 
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: search.html.php 4876 2012-10-10 10:27:26Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>
{if !empty($aSearchTool) && is_array($aSearchTool)}
	<div class="header_bar_menu">							
		{if isset($aSearchTool.search)}							
			<div class="header_bar_search">
				<form method="post" action="{$aSearchTool.search.action}" onbeforesubmit="$Core.Search.checkDefaultValue(this,\'{$aSearchTool.search.default_value}\');">
					<div>
						<input type="hidden" name="search[submit]" value="1" />
					</div>
					<div class="header_bar_search_holder">
						<div class="header_bar_search_default">{$aSearchTool.search.default_value}</div>
						<input type="text" class="txt_input{if isset($aSearchTool.search.actual_value)} input_focus{/if}" name="search[{$aSearchTool.search.name}]" value="{if isset($aSearchTool.search.actual_value)}{$aSearchTool.search.actual_value|clean}{else}{$aSearchTool.search.default_value}{/if}" />
						<div class="header_bar_search_input"></div>
					</div>
					<div id="js_search_input_holder">
						<div id="js_search_input_content">
							{if isset($sModuleForInput)}
								{module name='input.add' module=$sModuleForInput bAjaxSearch=true}
							{/if}
						</div>
					</div>
				</form>
			</div>
		{/if}
		
		{if !Phpfox::isMobile() && isset($aSearchTool.filters) && count($aSearchTool.filters)}
			<div class="header_filter_holder">								
				{foreach from=$aSearchTool.filters key=sSearchFilterName item=aSearchFilters}
					{if !isset($aSearchFilters.is_input)}
						<div class="header_bar_float">							
							<div class="header_bar_drop_holder">
								<ul class="header_bar_drop">
									<li><span>{$sSearchFilterName}:</span></li>
									<li><a href="#" class="header_bar_drop">{if isset($aSearchFilters.active_phrase)}{$aSearchFilters.active_phrase}{else}{$aSearchFilters.default_phrase}{/if}</a></li>
								</ul>
								<div class="clear"></div>
								<div class="action_drop_holder">
									<ul class="action_drop"{if isset($aSearchFilters.height)} style="height:{$aSearchFilters.height}; overflow:auto;"{/if}>
									{foreach from=$aSearchFilters.data item=aSearchFilter}
										<li>
											<a href="{$aSearchFilter.link}" class="ajax_link {if isset($aSearchFilter.is_active)}active{/if}"{if isset($aSearchFilters.width)} style="width:{$aSearchFilters.width};"{/if}>
												{$aSearchFilter.phrase}
											</a>																	
										</li>
									{/foreach}
									</ul>
								</div>
							</div>
						</div>
					{/if}
				{/foreach}	
				{if Phpfox::isModule('input') && isset($bHasInputs) && $bHasInputs == true}											
					<a href="#" onclick="$('#js_search_input_holder').show(); return false;" class="header_bar_advanced_filters">
						{phrase var='input.advanced_filters'}
					</a>				
				{/if}
				<div class="clear"></div>								
			</div>
			
		{/if}
	</div>
{/if}

