$(document).ready(function() {
    ChangeCover.init();
});

ChangeCover = {
    init: function() {
        if ($('#profile_logo_image').length > 0) {
            $('#profile_header_block').addClass('isset_logo');
        }
    }
};
