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

    ajaxUrl: function(photoId, userId)
    {
        var userRequest = '';
        if (userId) {
            userRequest = '&userid=' + userId;
        }

        return 'core[call]=pautina.imagebox' +
            '&width=200' +
            '&req2=' + photoId +
            userRequest +
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

    getImage: function(photoId, userId)
    {
        var data = Imagebox.ajaxUrl(photoId, userId);
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
                $('#scrollbar_wrapper').show();
                Imagebox.addScroll($('#scrollbar_wrapper'));
            }
        });
    },

    addScroll: function(oScrollbar)
    {
        oScrollbar.tinyscrollbar();
        oScrollbar.tinyscrollbar_update();
    },

    createBlockForImage: function()
    {
        if ($('#imagebox-detail').length == 0) {
            var block = '<div id="imagebox-detail" class="feed">' +
                            '<a href="#" class="closePautina"></a>' +
                            '<div class="info"></div>' +
                        '</div>';

            $('#ajax_wrapper').prepend(block);
            var windowHeight = $(window).height();
            var headerHeight = 80;
            var photosGridBlockHeight = $('#js_actual_photo_content').height();
            var ImageWrapperHeight = windowHeight - headerHeight;
            if (photosGridBlockHeight < ImageWrapperHeight) {
                $('#js_actual_photo_content').css('min-height', ImageWrapperHeight);
            }
            $('#scrollbar_wrapper').css({height: ImageWrapperHeight});
            $('#scrollbar_wrapper .viewport').css({height: ImageWrapperHeight});


        }
    },

    closeImageBox: function()
    {
        $('.preloader').remove();
        $(Imagebox.boxDetail).html('')
                             .parent().hide();
        $('#feed_wrapper').animate({opacity: 1});

        return false;
    },

    showPreloader: function()
    {
        if ($('.preloader').length > 0) {
            blockHeight = $(Imagebox.boxDetail).height();

            $(Imagebox.boxDetail).prepend('<div class="preloader_block"><div class="preloader_icon"></div></div>');
            $('.preloader_block').css({'height': blockHeight}).fadeIn(400);
            $('.preloader_icon').css({'height': blockHeight / 2});
        } else {
            var windowHeight = $(document).height();
            var documentHeight = $(document).height();

            $('#main_core_body_holder').prepend('<div class="preloader"><div class="preloader_icon"></div></div>');
            $('.preloader').css({'height': documentHeight}).fadeIn(400);
            $('.preloader_icon').css({'height': windowHeight / 2});
        }

        $('#feed_wrapper').animate({opacity: 0.3});
    },

    hidePreloader: function()
    {
        $(Imagebox.boxDetail).removeClass('show_preloader');
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

        AllImages.updateViewDetailPosition();
    },

    updateViewDetailPosition: function()
    {
        var contentOffset = $('#content_holder').offset();
        var contentTop = contentOffset.top;
        var scrollHeight = $(window).scrollTop();
        var photoBlockHeight = $('#scrollbar_wrapper').height();
        var windowHeight = $(window).height();
        var documentHeight = $(document).height();
        var footerHeight = 80;
        var headerHeight = 80;

        if (contentTop - headerHeight <= scrollHeight) {
            if (scrollHeight + windowHeight >= documentHeight - footerHeight) {
                $('#scrollbar_wrapper')
                    .removeClass('fixed_position')
                    .css({bottom: 0, top: 'inherit'});
            } else {
                $('#scrollbar_wrapper')
                    .addClass('fixed_position')
                    .css({top: 100});
            }
        } else {
            $('#scrollbar_wrapper')
                .removeClass('fixed_position')
                .css({top: 0});
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
        AllImages.windowHeight = $(window).height();
        AllImages.documentHeight = $(document).height();
        AllImages.scrollHeight = $(window).scrollTop();

        if ( AllImages.documentHeight - (AllImages.windowHeight + AllImages.scrollHeight) < 400 ) {
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
                    AllImages.updateViewDetailPosition();
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