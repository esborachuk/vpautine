(function($) {
    $.fn.Blogbox = function() {
        Blogbox.init($(this));
    };
    var Blogbox = $.fn.Blogbox;

    Blogbox.init = function(blogLink) {
        Blogbox.blogLink = blogLink;
        blogLink.on('click', Blogbox.getBlog)
    };

    Blogbox.getBlog = function() {
        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: getParam('sJsAjax'),
            data: 'core[call]=pautina.blogbox' +
                '&url=' + Blogbox.blogLink.data('url') +
                '&userId=' + Blogbox.blogLink.data('userId'),
            success: function(blog)
            {
                $('#get_blog_id').html(blog);
            }
        });
    };
})(jQuery);

jQuery(document).ready(function($) {
    /* Initialize blogbox */
    $('.blogbox_link').Blogbox();
});