$(document).ready(function(){
    var currentSection = 0;
    var sectionTitle = ['Transaksi', 'Kategori', 'Produk', 'Price', 'Kupon Promo',  'Slider', 'Freeflop of The Month', 'FAQ', 'Web Info', 'User'];

    $('.sectionContent').hide();
    $('#section0').show();
    $('.list-group-item.admin').click(function(){
        currentSection = $(this).attr('value');
        $('#sectionTitle').html(sectionTitle[currentSection]);
        $('.list-group-item.admin').removeClass('active');
        $('.sectionContent').hide();
        $('#section'+currentSection).show();
        $(this).addClass('active');
    });
    $('#sectionTitle').html(sectionTitle[currentSection]);
    $('.collape-trigger').click(function(){
        jQuery.noConflict();
        $(this).parent().children('.collapse').collapse('toggle');
    });
    
    $(window).scroll(function() {
        var x = $(window).scrollTop();
        if (x <= 100) {
            $('nav').css('background','#464646');
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
    //$('#sectionContent').html('uwah');
    $('#transaksiTable').DataTable();
});