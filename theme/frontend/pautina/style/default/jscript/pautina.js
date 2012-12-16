$(function() {
    $(document).bind('ajaxStop', function() {
        Sms.init();
        Email.init();
    });
});

$(document).ready(function() {
    Preloader = {
        showPreloader: function() {
            var windowHeight = $(document).height();
            var documentHeight = $(document).height();

            $('#main_core_body_holder').prepend('<div class="preloader"><div class="preloader_icon"></div></div>');
            $('.preloader').css({'height': documentHeight}).fadeIn(400);
            $('.preloader_icon').css({'height': windowHeight / 2});
        },

        hidePreloader: function() {
            $('.preloader').remove();
        }
    }
});

PautinaNotification = {
    update: function() {
        setTimeout(PautinaNotification.check, 200);
    },

    check: function() {
        var notifyBlockHidden = $('.holder_notify_count:visible');
        if (notifyBlockHidden.size() > 0) {
            notifyBlockHidden.next().addClass('active');
        }
        var notifyBlockShow = $('.holder_notify_count:hidden');
        if (notifyBlockShow.size() > 0) {
            notifyBlockShow.next().removeClass('active');
        }
    }
};

$(document).ready(function() {
    // check notifications and update button class
    var pautinaNotificationInterval = setInterval(PautinaNotification.check, 200);
});

/*-------header_static_position--------*/
$(window).scroll(function(){
    if ($(this).scrollTop() > 120) {
        $('#header_menu').addClass('header_menu_top')
            .animate({});
    } else {
        $('#header_menu').removeClass('header_menu_top');
    }
});
/*--------header_static_position--------*/

/*-----back_button-----*/

$(document).ready(function() {

    var backLink = $('.go_back_link');

    backLink .live('click', function(e){
        e.preventDefault();
        window.history.go(-1);
    });

    backLink .show();

});

/*-----back_button-----*/


$(document).ready(function() {

/*---------slide-title---------*/


    $('.image-block, #imagebox li, .js_outer_photo_div, .js_video_parent, .js_album_parent, #js_controller_friend_index #main_content_padding').live('hover', function(){
        $(this).find($('.slide-block')).stop(true, true).slideToggle("fast");
    },
    function(){
        $(this).find($('.slide-block')).stop(true, true).slideToggle("fast");
    });

/*---------slide-title----------*/

/*------------send-message-on-CTRL+ENTER--------------*/

    jQuery(document).keydown(function(e) {
        if (e.ctrlKey && e.keyCode == 13) {
            $('textarea:focus').parents('.js_comment_feed_form').submit();
        }
    });

/*------------send-message-on-CTRL+ENTER--------------*/

});




