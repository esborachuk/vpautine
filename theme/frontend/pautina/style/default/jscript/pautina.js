PautinaNotification = {
    update: function() {
        setTimeout(PautinaNotification.check, 200);
    },

    check: function() {
        var botifyBlock = $('.holder_notify_count:visible');
        if (botifyBlock.size() > 0) {
            botifyBlock.next().addClass('active');
        }
    }
};

jQuery(document).ready(function() {
    var pautinaNotificationInterval = setInterval(PautinaNotification.check, 200);
});
