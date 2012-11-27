$(function() {
    $(document).bind('ajaxStop', function() {
        Sms.init();
        Email.init();
    });
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

jQuery(document).ready(function() {
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

jQuery(document).ready(function() {

    var backLink = jQuery('.go_back_link');
    backLink .show();
    backLink .click(function(){
        window.history.go(-1);
    });

        backLink .show();

});

/*-----back_button-----*/



