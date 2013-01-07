Menu = {
    menuBlock: '#user-menu',

    toggle: function() {
        $(Menu.menuBlock).toggle('fast');
    }
};
 MenuOver = {
       Hover: "a#call-menu",
        animate: function () {
            $(MenuOver.Hover).animate({'right':'-28px'},300);}
};
MenuOut = {
    Hover: "a#call-menu",
    animate:function(){
        $(MenuOut.Hover).animate({'right':'-59px'},300);
    }
};

$(document).ready(function() {
    ChangeCover.init();
});

ChangeCover = {
    coverLink: '#profile_header_logo #section_menu',
    coverSection: '#profile_header_logo',
    init: function(){
      if( $(ChangeCover.coverSection).height() > 0){
          // $(ChangeCover.coverLink).hide();
           var y =  $(ChangeCover.coverSection).height()/1.4;    //detect height of block with photo
           var x =  $(ChangeCover.coverSection).width();         //detect width
           $(ChangeCover.coverLink).css({'top': y});
            console.log('andrew_script_run');
        $(ChangeCover.coverSection).mouseenter(function(){
            $(ChangeCover.coverLink).show();
        }).mouseleave(function() {
                $(ChangeCover.coverLink).hide();
            }) }else{
          $(ChangeCover.coverLink).show();
      }
    }
};
