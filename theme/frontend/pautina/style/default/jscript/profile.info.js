(function($) {
    $.fn.ProfileInfo = function() {
        ProfileInfo.init($(this));
    };
    var ProfileInfo = $.fn.ProfileInfo;

   /* ProfileInfo.init = function(blogLink) {
        Blogbox.blogLink = blogLink;
        blogLink.on('click', Blogbox.showBlog)
    };

    Blogbox.showBlog = function() {
        var clickedLink = $(this),
            url = clickedLink.data('url'),
            userId = clickedLink.data('userId');

        Blogbox.getBlog(url, userId);

        return false;
    };*/

    ProfileInfo.getInfo = function(url, userId) {
        Preloader.showPreloader();
        var data = ProfileInfo.getData(url, userId);
        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: getParam('sJsAjax'),
            data: data,
            success: function(profile)
            {
                Preloader.hidePreloader();
                $('#js_basic_info_data').html(profile);
            }
        });
    };

    ProfileInfo.getData = function(url, userId) {
        var userRequest = '';
        if (userId) {
            userRequest = '&userId=' + userId
        }

        var url = 'core[call]=pautina.profile' +
            '&url=' + url +
            userRequest;

        return url;
    };
})(jQuery);

jQuery(document).ready(function($) {
    /* Initialize blogbox */
    $('#js_user_basic_edit_link').ProfileInfo();
});