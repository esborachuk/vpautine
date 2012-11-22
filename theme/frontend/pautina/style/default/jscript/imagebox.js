$(document).ready(function() {
    Imagebox.init();
    //AllImages.init();
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
                Imagebox.createBlockForImage();
                $(Imagebox.boxDetail).html(image)
                                     .parent().show();
            }
        });
    },

    createBlockForImage: function()
    {
        if ($('#imagebox-detail').length == 0) {
            var block = '<div id="imagebox-detail" class="feed">' +
                            '<a href="#" class="closePautina"></a>' +
                            '<div class="info"></div>' +
                        '</div>';

            $('#content_holder').prepend(block);
        }
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

var AllImages = {
    imagesBox: $('#insert_next_photo'),
    page: 1,

    init: function(pageCount, requestUrl, userId)
    {
        this.pageCount = pageCount;
        this.requestUrl = requestUrl;
        this.userId = userId;
        AllImages.isDownloading = false;
        $(window).scroll(this.scrolling);
    },

    scrolling: function()
    {
        if (AllImages.canDownload() === true) {
            AllImages.getPhotos();
        }
    },

    canDownload: function()
    {
        if (AllImages.isDownloading === true) {
            return false;
        }

        if (AllImages.page > AllImages.pageCount - 1) {
            return false;
        }

        if (AllImages.isBottomOfPage() === false) {
            return false;
        }

        return true;
    },

    isBottomOfPage: function()
    {
        var canDownload = false;
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();
        var scrollHeight = $(window).scrollTop();

        if ( documentHeight - (windowHeight + scrollHeight) < 100 ) {
            canDownload = true;
        }

        return canDownload;
    },

    getPhotos: function()
    {
        AllImages.isDownloading = true;
        AllImages.showPreloader();
        $.ajax(
            {
                type: 'GET',
                dataType: 'html',
                url: getParam('sJsAjax'),
                data: AllImages.getUrl(),
                success: function(images)
                {
                    AllImages.isDownloading = false;
                    AllImages.hidePreloader();
                    $('#insert_next_photo').append('<div class="newclass">' + images + '</div>');
                }
            });
    },

    getUrl: function()
    {
        AllImages.page++;
        return 'core[call]=pautina.getMoreImages' +
            '&page=' + AllImages.page +
            '&requestUrl=' + AllImages.requestUrl +
            '&userId=' + AllImages.userId;
    },

    showPreloader: function()
    {

    },

    hidePreloader: function()
    {

    }
};