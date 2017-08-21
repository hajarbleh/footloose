$(document).ready(function() {
    $('nav').css('background','transparent');
    $(window).scroll(function() {
        var x = $(window).scrollTop();
        if (x <= 0) {
            $('nav').css('background','transparent');
        } else {
            $('nav').css('background','#fff');
        }
    });

    var jumboHeight = $('.slider-helper').outerHeight();
    function parallax(){
        var scrolled = $(window).scrollTop();
        $('.slider-bg').css('height', (jumboHeight+scrolled) + 'px');
    }
    parallax();
    $(window).scroll(function(e){
        parallax();
    });
});