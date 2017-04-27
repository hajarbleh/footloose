@extends('include.master')
@section('title', 'Browse')
@section('body')
    @include('include.navbarwhite')
    <div style="width:100%; min-height:5rem; overflow:hidden; color:#fff; background-color:#3a5bb8; padding:5rem 0 1rem 0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <b>Home / Category</b>
                </div>
                <div class="col-sm-2">
                    <h2><b>Category</b></h2>
                </div>
                <div class="col-sm-2 hidden-md-up">
                    <hr style="border-color:rgba(255,255,255,0.5)">
                    <a href="#!" id="filter-toggle" style="color:#fff">Filter &#9662</a>
                </div>
                <div id="filter" class="col-sm-8 hidden-sm-down" style="text-align:center">
                    <form class="form-inline">
                        <select class="form-control form-control-sm hav-filter">
                            <option selected disabled>Category</option>
                            <option>Men</option>
                            <option>Sandals</option>
                            <option>-- Flipflops</option>
                            <option>-- Boots</option>
                            <option>Women</option>
                            <option>-- Flipflops</option>
                            <option>-- Boots</option>
                            <option>Kids</option>
                            <option>-- Flipflops</option>
                            <option>-- Boots</option>
                        </select>
                        <select class="form-control form-control-sm hav-filter">
                            <option selected disabled>Size</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                        </select>
                        <select class="form-control form-control-sm hav-filter">
                            <option selected disabled>Color</option>
                            <option>Top</option>
                            <option>Slim</option>
                        </select>
                        <select class="form-control form-control-sm hav-filter">
                            <option selected disabled>Sort By</option>
                            <option>Lowest Price</option>
                            <option>Highest Price</option>
                            <option>New Arrival</option>
                        </select>
                        <button class="btn btn-secondary btn-sm btn-hav-w" style="padding-left:1rem; padding-right:1rem; color:#3a5bb8; line-height:1.35rem">FILTER</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div style="width:100%; overflow:hiddenc; padding-top:3rem">
        <div class="container">
            <div class="row">
                <?php for ($i=0;$i<10;$i++){ ?>
                <div class="col-sm-5ths col-xs-6">
                    <a href="product" class="card" style="text-align:center">
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
            $filterflag = 0;
            $('#filter-toggle').click(function(){
                if ($filterflag === 0){
                    $('#filter').removeClass("hidden-sm-down");
                    $filterflag = 1;
                }
                else {
                    $('#filter').addClass("hidden-sm-down");
                    $filterflag = 0;
                }
            });

            $('#mobile-dropdown').hide();
            $('#mobile-dropdown-toggle').click(function(){
                $('#mobile-dropdown').fadeToggle();
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
    </script>
@endsection