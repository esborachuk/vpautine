Sms = {
    errorBlock: '#sms-error',
    messageTabsBlock: "#message-tabs",
    smsForm: "#js_form_sms",
    successResultBlock: "#sms-success-result",
    smsButton: '#sms-button',
    smsController: 'sms.smsProcess',

    init: function() {
        $("#tabs").tabs({
            load: function() {
                $('#messages_block').show();
            }
        });

        $(Sms.smsForm).validate({
            rules: {
                'sms[phone]': {
                    required: true,
                    digits: true,
                    minlength: 7,
                    maxlength: 7
                },
                'sms[message]': {
                    required: true,
                    maxlength: 160
                }
            },
            messages: {
                'sms[phone]': {
                    required: "это обязательное поле",
                    digits: "доступны только цифры",
                    minlength: "минимаотная длинна номера 7 цифр",
                    maxlength: "максимальная длина номера 7 цифр"
                },
                'sms[message]': {
                    required: "это обязательное поле",
                    maxlength: "максимальная сообщения номера 160 символов"
                }
            }
        });
    },

    send: function() {
        if ($(Sms.smsForm).valid()) {
            $Core.processForm(Sms.smsButton);
            $(Sms.smsForm).ajaxCall(Sms.smsController);
        }
    },

    sendMoreSms: function() {
        $(Sms.smsForm).show();
        $(Sms.successResultBlock).hide();
    }
};

