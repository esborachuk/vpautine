$(document).ready(function() {
    Imagebox.init('#imagebox');
});

Imagebox = {
    boxDetail: '#imagebox-detail',

    init: function(block) {
        Imagebox.block = block;
        jQuery(block).find('a.imagebox').bind('click', Imagebox.showImage);
    },

    showImage: function() {
        var currentLink = $(this);
        var image = '<img src="' + currentLink.data('image') + '"/>';
        $(Imagebox.block).append(image);
        var data = 'core[call]=pautina.imagebox&width=940&req2=' + currentLink.data('id') + '$theader=true$no_remove_box=true';

        $.ajax(
        {
            type: 'GET',
            dataType: 'html',
            url: getParam('sJsAjax'),
            data: data,
            success: function(image)
            {
                $(Imagebox.boxDetail).html(image);
            }
        });

        return false;
    }
};