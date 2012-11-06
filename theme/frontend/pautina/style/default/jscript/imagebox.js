$(document).ready(function() {
    Imagebox.init();
});

Imagebox = {
    boxDetail: '#imagebox-detail',
    link: 'a.imagebox',

    init: function()
    {
        $(Imagebox.link).live('click', Imagebox.showImage);
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
        var userId = currentLink.data('userid');

        Imagebox.getImage(photoId, userId);

        return false;
    },

    getImage: function(photoId)
    {
        var data = Imagebox.ajaxUrl(photoId);

        $.ajax({
            type: 'GET',
            dataType: 'html',
            url: getParam('sJsAjax'),
            data: data,
            success: function(image)
            {
                $(Imagebox.boxDetail).html(image);
            }
        });
    }
};