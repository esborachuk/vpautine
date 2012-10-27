jQuery(document).ready(function () {
    jQuery("a#call-menu").click(function () {
        jQuery("div#user-menu").toggle("slow");
        jQuery(this).toggleClass("active");
        return false;
    });
});