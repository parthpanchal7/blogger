$(document).ready(function(){
    $('.navbar_toggler').click(function() {
        $('.main_menu').toggleClass('menu_collapsed');
        $('html').toggleClass('menu_opened');
    });
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
    
         //>=, not <=
         if (scroll >= 200) {
            $("#header").addClass("sticky_header_active");
        } else {
            $("#header").removeClass("sticky_header_active");
        }
    });
})