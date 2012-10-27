jQuery(document).ready(function(){
    jQuery("a#call-menu").click(function(){
        jQuery("div#user-menu").toggle("fast");
        jQuery(this).toggleClass("active");
        return false;
    });
});