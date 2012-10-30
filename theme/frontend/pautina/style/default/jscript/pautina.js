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

    //if isset User Logo Image, add class to user image block
    var profile_logo_image = $('#profile_logo_image');
    if (profile_logo_image.size() > 0) {
        $('.profile_image').addClass('isset_profile_logo_image');
    };
});
