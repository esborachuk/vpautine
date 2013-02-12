(function($) {
    $.fn.Blogbox = function() {
        Blogbox.init($(this));
    };
    var Blogbox = $.fn.Blogbox;

    Blogbox.init = function(blogLink) {
        Blogbox.blogLink = blogLink;
        blogLink.on('click', Blogbox.showBlog)
    };

    Blogbox.showBlog = function() {
        var clickedLink = $(this),
            url = clickedLink.data('url'),
            userId = clickedLink.data('userId');

        Blogbox.getBlog(url, userId);

        return false;
    };

    Blogbox.getBlog = function(url, userId) {
        Preloader.showPreloader();
        var data = Blogbox.getData(url, userId);
        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: getParam('sJsAjax'),
            data: data,
            success: function(blog)
            {
                Preloader.hidePreloader();
                $('#get_blog_id').html(blog);
                $Core.loadInit();
            }
        });
    };

    Blogbox.getData = function(url, userId) {
        var userRequest = '';
        if (userId) {
            userRequest = '&userId=' + userId
        }

        var urlString = 'core[call]=pautina.blogbox' +
                '&url=' + url +
                userRequest;

        return urlString;
    };
})(jQuery);

jQuery(document).ready(function($) {
    /* Initialize blogbox */
    $('.blogbox_link').Blogbox();
});