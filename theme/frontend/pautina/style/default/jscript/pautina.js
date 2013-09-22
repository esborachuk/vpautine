(function($){
   var button = $('#js_registration_submit');
    $(button).live('click',function(e){
    if($(this).hasClass('work_button')){return true;}
       $('#header_menu_login_form').slideUp('slow',function(){
           $('#js_signup_block').slideDown('slow').addClass('visible_form');
           $(this).addClass('hidden_form');
           $('#js_registration_submit').addClass('work_button');
       });

        return false;
    })
})(jQuery);