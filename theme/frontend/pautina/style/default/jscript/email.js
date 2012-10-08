Email = {
    emailForm: '#js_form_email',
    emailButton: '#email-button',
    emailController: 'email.emailProcess',

    init: function() {
        $(Email.emailForm).validate({
            rules: {
                'email[message]': {
                    required: true
                }
            },
            messages: {
                'sms[message]': {
                    required: "это обязательное поле"
                }
            }
        });
    },

    send: function() {
        if ($(Email.emailForm).valid()) {
            $Core.processForm(Email.emailButton);
            $(Email.emailForm).ajaxCall(Email.emailController);
        }
    },

    sendMoreEmail: function() {

    }
};