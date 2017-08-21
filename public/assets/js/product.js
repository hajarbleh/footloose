function qty(x){
    quantity = document.getElementById("qty");
    if (x == "+" ) quantity.value ++;
    else if (x == "-") quantity.value --;
}
$(document).ready(function() {
    $('.imgBox').imgZoom();
    $('#sizingtrigger').click(function() {
        $('#sizingmodal').modal();
    });
    $('#carttrigger').click(function() {
        $('#cartmodal').modal();
    });
    $(window).scroll(function() {
        var x = $(window).scrollTop();
        if (x <= 100) {
            $('nav').css('background','#3a5bb8');
            $('.navbar-dark .navbar-nav .nav-link').css('color','#fff');
            $('.navbar-brand').css('color','#fff');
            $('#mobile-dropdown-toggle').css('color','#fff');
            $('#logo').attr('src','assets/img/ui/logowhite.png');
        } else {
            $('nav').css('background','#fff');
            $('.navbar-dark .navbar-nav .nav-link').css('color','#2a2a2a');
            $('.navbar-brand').css('color','#2a2a2a');
            $('#mobile-dropdown-toggle').css('color','#2a2a2a');
            $('#logo').attr('src','assets/img/ui/logoblack.png');
        }
    });                 
});