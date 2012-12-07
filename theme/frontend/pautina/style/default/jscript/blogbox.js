(function($) {
    $.fn.Blogbox = function() {
        Blogbox.init($(this));
    };
    var Blogbox = $.fn.Blogbox;

    Blogbox.init = function(blogLink) {
        Blogbox.blogLink = blogLink;
        blogLink.live('click', Blogbox.getBlog)
    };

    Blogbox.getBlog = function() {
        var clickedLink = $(this);
        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: getParam('sJsAjax'),
            data: 'core[call]=pautina.blogbox' +
                '&url=' + clickedLink.data('url') +
                '&userId=' + clickedLink.data('userId'),
            success: function(blog)
            {
                $('#get_blog_id').html(blog);
            }
        });

        return false;
    };
})(jQuery);

jQuery(document).ready(function($) {
    /* Initialize blogbox */
    $('.blogbox_link').Blogbox();
});