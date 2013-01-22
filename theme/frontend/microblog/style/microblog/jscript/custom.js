/**
 * @version 		$Id: custom.js 5077 2012-12-13 09:05:45Z Raymond_Benc $
 */

$Behavior.microBlog = function(){
	
	$('.actions_link').click(function(){
		$('#mb_sub_menu ul').show();		
		return false;
	});
	
	$('.mb_follow_link .first').click(function(){
		$(this).parent().find('ul:first').show();
		return false;
	});
	
	$('.mb_follow_link a.main, a.mb_follow_user').click(function(){
		$.ajaxCall('microblog.addFollow', 'f_user_id=' + $(this).attr('rel'));
		$(this).hide();
		return false;
	});	
};