$(function() {
    $(document).bind('ajaxStop ', function() {
        Sms.init();
    });
});

Sms = {
    init: function() {
        $( "#message-tabs" ).tabs();
    },

    send: function(phone, message) {
        var url = window.location.protocol + '//' + window.location.host + '?do=/sms/index/';
        $.ajax({
            url: url,
            data: 'sms-phone=123456',
            success: function(data) {
                alert('1');
            }
        });
    }
};