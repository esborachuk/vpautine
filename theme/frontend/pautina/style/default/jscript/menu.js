$(document).ready(function () {
    var call_menu = $("a#call-menu");
    call_menu.click(function (e) {
        e.preventDefault();
        $("div#user-menu").toggle("slow");
        call_menu.toggleClass("active");
        return false;
    });
    $(document).ready(function () {
        call_menu.hover(function () {
                call_menu.animate({'right':'-28px'},300);},
            function(){
                call_menu.animate({'right':'-59px'},300);
            });
    });

});