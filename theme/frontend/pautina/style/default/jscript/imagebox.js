$(document).ready(function() {
    Imagebox.init('#imagebox');
});

Imagebox = {
    boxDetail: '#imagebox-detail',

    init: function(block)
    {
        Imagebox.block = block;
        $(block).find('a.imagebox').live('click', Imagebox.showImage);
        $('#pautina-close').live('click', Imagebox.close);
    },

    showImage: function()
    {
        $('#main_content_padding').prepend('<div id="imagebox-detail"><a id="pautina-close">Close</a><div class="pautina-info"></div></div>');

        var currentLink = $(this);
        var data = 'core[call]=pautina.imagebox&width=580&req2=' + currentLink.data('id') + '$theader=true$no_remove_box=true';

        $.ajax(
        {
            type: 'GET',
            dataType: 'html',
            url: getParam('sJsAjax'),
            data: data,
            success: function(image)
            {
                $('#imagebox-detail .pautina-info').html(image);
            }
        });

        return false;
    },

    close: function()
    {
        $('#imagebox-detail').remove();
    }
};