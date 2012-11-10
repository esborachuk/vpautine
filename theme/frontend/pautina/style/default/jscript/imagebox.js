$(document).ready(function() {
    Imagebox.init();
});

var Imagebox = {
    boxDetail: '#imagebox-detail .info',
    link: 'a.imagebox',
    closeLink: 'a.closePautina',
    preloader: 'preloader',

    init: function()
    {
        $(Imagebox.link).live('click', Imagebox.showImage);
        $(Imagebox.closeLink).live('click', Imagebox.closeImageBox);
    },

    ajaxUrl: function(photoId)
    {
        return 'core[call]=pautina.imagebox' +
            '&width=200' +
            '&req2=' + photoId +
            '&theater=true' +
            '&no_remove_box=true';
    },

    showImage: function()
    {
        var currentLink = $(this);
        var photoId = currentLink.data('photoid');
        //var userId = currentLink.data('userid');

        Imagebox.getImage(photoId);

        return false;
    },

    getImage: function(photoId)
    {
        var data = Imagebox.ajaxUrl(photoId);
        Imagebox.showPreloader();

        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: getParam('sJsAjax'),
            data: data,
            success: function(image)
            {
                Imagebox.hidePreloader();
                $(Imagebox.boxDetail).html(image)
                                     .parent().show();
            }
        });
    },

    closeImageBox: function()
    {
        $(Imagebox.boxDetail).html('')
                             .parent().hide();

        return false;
    },

    showPreloader: function()
    {
        var windowHeight = $(document).height();

        $('#main_core_body_holder').prepend('<div class="preloader"></div>');
        $('.preloader').css({'height': windowHeight});
    },

    hidePreloader: function()
    {
        $('.preloader').hide();
    }
};