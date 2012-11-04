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
