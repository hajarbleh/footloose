@extends('include.master')
@section('title', 'Home')
@section('body')
    @include('include.navbar')

    <div style="width:100%; height:100vh; background-color:grey">
        <div class="banner-container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="max-height:100vh;">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <div class="slider-helper" style="height:100vh"></div>
                        <div class="slider-bg" style="background:url(assets/img/promo/promobanner1.jpg) no-repeat center center;"></div>
                    </div>
                    <div class="carousel-item">
                        <div class="slider-helper" style="height:100vh"></div>
                        <div class="slider-bg" style="background:url(assets/img/promo/promobanner2.jpg) no-repeat center center;"></div>
                    </div>
                    <div class="carousel-item">
                        <div class="slider-helper" style="height:100vh"></div>
                        <div class="slider-bg" style="background:url(assets/img/promo/promobanner1.jpg) no-repeat center center;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="width:100%; min-height:20rem; overflow:hidden; color:white; background-color:#3a5bb8; text-align:center; padding:3rem 0 3rem 0">
        <h2><b>Flipflop of the Month</b></h2>
        <div class="container" style="margin-top:2rem">
            <div class="row">
                <?php for ($i=0;$i<5;$i++){ ?>
                <div class="col-sm-5ths col-xs-6">
                    <a href="{{url('/product')}}" class="card" style="text-align:center">
                        <img class="card-img-top img-fluid" src="assets/img/product/c1p1/col1/thumb/1.jpg" alt="Card image cap">
                        <div class="card-block">
                            <p style="line-height:1.2rem; margin-bottom:0.5rem">Nama Produk</p>
                            <h5><b>Rp 150.000</b></h5>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>        

    <div style="width:100%; min-height:20rem; overflow:hidden; color:white; background-color:#ff6d6d; text-align:center; padding:3rem 0 3rem 0">
        <h2><b>Make Your Own</b></h2>
        <div class="container" style="margin-top:2rem">
            <div class="row">
                <div class="col-md-2 offset-md-2 col-xs-6">
                    <img src="assets/img/home/base.png" style="width:90%">
                    <h2 style="margin-top:1rem; margin-bottom:0"><b>1</b></h2>
                    <p>Choose your style</p>
                </div>
                <div class="col-md-2 col-xs-6">
                    <img src="assets/img/home/base.png" style="width:90%">
                    <h2 style="margin-top:1rem; margin-bottom:0"><b>2</b></h2>
                    <p>Select base color</p>
                </div>
                <div class="col-md-2 col-xs-6">
                    <img src="assets/img/home/strap.png" style="width:90%">
                    <h2 style="margin-top:1rem; margin-bottom:0"><b>3</b></h2>
                    <p>Select strap color</p>
                </div>
                <div class="col-md-2 col-xs-6">
                    <img src="assets/img/home/acc.png" style="width:90%">
                    <h2 style="margin-top:1rem; margin-bottom:0"><b>4</b></h2>
                    <p>Personalize tattoo</p>
                </div>
                <div class="col-sm-12">
                    <a class="btn btn-secondary btn-hav-w" href="{{url('/makeyourown')}}" role="button" style="margin-top:1.5rem"><b style="color:#ff6d6d">MAKE NOW</b></a>
                </div>
            </div>
        </div>
    </div>


    <div style="width:100%; overflow:hidden; padding-top:3rem; padding-bottom:3rem">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" style="text-align:center">
                    <h2 style="margin-bottom:2rem"><b>Best Seller</b></h2>
                </div>
                <?php for ($i=0;$i<5;$i++){ ?>
                <div class="col-sm-5ths col-xs-6">
                    <a href="{{url('/product')}}" class="card" style="text-align:center">
                        <img class="card-img-top img-fluid" src="assets/img/product/c1p1/col1/thumb/1.jpg" alt="Card image cap">
                        <div class="card-block">
                            <p style="line-height:1.2rem; margin-bottom:0.5rem">Nama Produk</p>
                            <h5><b>Rp 150.000</b></h5>
                        </div>
                    </a>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

@endsection
        
@section('pagescript')
        <script>
            $(document).ready(function() {
                $('#mobile-dropdown').hide();
                $('#mobile-dropdown-toggle').click(function(){
                    $('#mobile-dropdown').fadeToggle();
                });
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
        </script>
@endsection
