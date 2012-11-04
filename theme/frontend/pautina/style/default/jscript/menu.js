Menu = {
    menuBlock: '#user-menu',

    toggle: function() {
        $(Menu.menuBlock).toggle('fast');
    }
};

var call_menu = $("a#call-menu");

$(document).ready(function () {
    call_menu.hover(function () {
            call_menu.animate({'right':'-28px'},300);},
        function(){
            call_menu.animate({'right':'-59px'},300);
        });
});