(function($) {
    $.fn.Tab = function() {
        Tab.init($(this));
    };
    var Tab = $.fn.Tab;

    Tab.init = function(block) {
        Tab.block = block;
        Tab.navigation = block.find('.navigate a');
        Tab.tabs = block.find('.tabs-wrapper');
        Tab.tabs.eq(0).show();
        Tab.navigation.live('click', Tab.generateTabs);
    };

    Tab.generateTabs = function() {
        Tab.navigation.removeClass('active');
        var link = $(this).addClass('active');
        Tab.tabs.hide();
        Tab.block.find('#' + link.data('link')).show();

        return false;
    }
})(jQuery);