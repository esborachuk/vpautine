<?php
/**
 * [PHPFOX_HEADER]
 * 
 * @copyright		[PHPFOX_COPYRIGHT]
 * @author			Raymond Benc
 * @package 		Phpfox
 * @version 		$Id: template.html.php 5077 2012-12-13 09:05:45Z Raymond_Benc $
 */
 
defined('PHPFOX') or exit('NO DICE!'); 

?>{if !PHPFOX_IS_AJAX_PAGE}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="{$sLocaleDirection}" lang="{$sLocaleCode}">
	<head>
		<title>{title}</title>	
		{header}
	</head>
	<body>
		{body}	
		{block location='9'}
		<div id="mb_header">
			<div class="holder">
				<div id="mb_menu">
					{menu}
					<div class="clear"></div>
				</div>
				
				<div id="mb_search_menu">
					<div class="mb_search_div">
						<a href="#" class="actions_link">Actions</a>
						<div id="mb_sub_menu">	
							{menu_account}
						</div>			
					</div>				
					<div class="mb_search_div">
						<div id="header_search">	
							<div id="header_menu_space">
								<div id="header_sub_menu_search">
									<form method="post" id='header_search_form' action="{url link='search'}">																						
										<input type="text" name="q" value="{phrase var='core.search_dot'}" id="header_sub_menu_search_input" autocomplete="off" class="js_temp_friend_search_input" />											
										<div id="header_sub_menu_search_input"></div>
										<a href="#" onclick='$("#header_search_form").submit(); return false;' id="header_search_button">{phrase var='core.search'}</a>											
									</form>
								</div>
							</div>
						</div>					
					</div>
					{*
					<div class="mb_search_div">
						<a href="#" class="post_new_update" onclick="$Core.box('microblog.add', 500); return false;">Post a New Update</a>					
					</div>
					*}
					<div class="clear"></div>
				</div>
				
			</div>
		</div>
		<div id="mb_main_holder">
		
			<div class="holder">
				<div id="mb_content_holder">	
				
					{module name='microblog.profile'}
							
					<div id="mb_inner_holder">
						<div id="mb_content_left">
						
							{menu_sub}
							{block location='1'}					
							
							<div id="mb_footer" class="block">
								{menu_footer}
								<div id="mb_copyright">
									{copyright}
								</div>
							</div>	
						
						</div>
						<div id="mb_content_right">	
						
							<div id="content" {content_class}>	
								{breadcrumb}				
								{error}
								{block location='2'}
								{content}
								{block location='4'}
							</div>						
						</div>
					</div>
				</div>
			</div>
		
			{footer}
		</div>		
	</body>
</html>
{/if}