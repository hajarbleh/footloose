@extends('include.master')
@section('title', 'Product Name')
@section('body')
    @include('include.navbarwhite')
    <style>
        input[type="radio"] {
            display:none;
        }

        input[type="radio"] + label span {
            display:inline-block;
            width:30px;
            height:30px;
            margin:-1px 0px 0 0;
            vertical-align:middle;
            cursor:pointer;
            -moz-border-radius:  50%;
            border-radius:  50%;
        }

        input[type="radio"] + label span {
             background-color:#0f0;
             border:solid 3px #fff
        }

        input[type="radio"]:checked + label span{
             border:solid 3px #2a2a2a;
        }

    </style>

    <div style="width:100%; min-height:5rem; overflow:hidden; color:#fff; background-color:#3a5bb8; padding:5rem 0 0 0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <b>Home / Category / Product Name</b>
                </div>
                <div class="col-sm-2">
                    <h2><b>Category</b></h2>
                </div>
            </div>
        </div>
    </div>


    <div style="width:100%; min-height:5rem; overflow:hidden; padding:2rem 0 3rem 0">
        <div class="container">
            <div class="row">
                <div class="col-sm-1" id="thumbBig">
                    <img src="assets/img/product/c1p1/col1/thumb/1.jpg" style="width:100%">
                    <img src="assets/img/product/c1p1/col1/thumb/2.jpg" style="width:100%">
                    <img src="assets/img/product/c1p1/col1/thumb/3.jpg" style="width:100%">
                </div>
                <div class="col-sm-5 imgBox">
                    <img src="assets/img/product/c1p1/col1/1.jpg" data-origin="assets/img/product/c1p1/col1/1.jpg" style="width:100%">
                </div>
                <div class="col-sm-1" id="thumbSmall" style="margin-bottom:2rem">
                    <img src="assets/img/product/c1p1/col1/thumb/1.jpg" style="width:32%">
                    <img src="assets/img/product/c1p1/col1/thumb/2.jpg" style="width:32%">
                    <img src="assets/img/product/c1p1/col1/thumb/3.jpg" style="width:32%">
                </div>
                <div class="col-sm-6">
                    <div class="col-sm-12">
                        <h4><b>Nama Produk</b></h4>
                        <h1><b>Rp 999.999</b></h1>
                        <div style="padding:1rem; background-color:rgba(0, 0, 0, 0.075); margin:1.5rem 0 1.5rem 0">
                            <b>Description</b><br>
                            <p>The Slim Crystal Poem features a floral Swarovski embellishment on a slim metallic strap for added glamour. A tonal Havaianas logo and our signature textured footbed provide style and comfort.</p>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <h6><b>Color</b></h6>
                        <span>
                            <input type="radio" id="radio01" name="radio" />
                            <label for="radio01">
                                <span style="background-color:#dbc9c9"></span>
                            </label>
                        </span>

                        <span>
                            <input type="radio" id="radio02" name="radio" />
                            <label for="radio02">
                                <span style="background-color:#d08a8a"></span>
                            </label>
                        </span>

                        <span>
                            <input type="radio" id="radio03" name="radio" />
                            <label for="radio03">
                                <span style="background-color:#45c7a4"></span>
                            </label>
                        </span>

                        <span>
                            <input type="radio" id="radio04" name="radio" />
                            <label for="radio04">
                                <span style="background-color:#fff95e"></span>
                            </label>
                        </span>

                    </div>
                    <div class="col-sm-3">
                        <h6><b>Size</b></h6>
                        <select class="form-control form-control-sm" style="background-color:rgba(0, 0, 0, 0.075); border:none">
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                        </select>
                        <a id="sizingtrigger" href="#!" style="color:#2a2a2a"><b style="font-size:0.8rem"><i class="fa fa-question-circle"></i> Sizing Chart</b></a><br><br>
                        <div class="modal fade" id="sizingmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <img src="assets/img/misc/sizechart.jpg" style="width:100%">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h6><b>Quantity</b></h6>
                        <div class="input-group input-group-sm" style="width:6rem">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button" style="background-color:rgba(0, 0, 0, 0.1); border:none" onclick="qty('-')">-</button>
                            </span>
                            <input type="text" class="form-control" id="qty" value="1" style="background-color:rgba(0, 0, 0, 0.075); border:none" disabled>
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" type="button" style="background-color:rgba(0, 0, 0, 0.1); border:none" onclick="qty('+')">+</button>
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <btn id="carttrigger" class="btn btn-secondary btn-hav-w" role="button" style="margin-top:1.3rem; background-color:#3a5bb8"><b style="color:#fff"><i class="fa fa-shopping-cart fa-lg"></i> ADD TO CART</b></btn>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="text-align:center">
                    <h3><b>Item added to your shopping cart!</b></h3>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-5">
                                <img src="assets/img/custom/base/cblue.png" style="width:100%">
                            </div>
                            <div class="col-xs-7">
                                <h5 style="margin-top:2rem"><b>Nama Produk</b></h5>
                                <ul>
                                    <li>Size: 9</li>
                                    <li>Base: Blue</li>
                                    <li>Strap: Black</li>
                                    <li>Acc: None</li>
                                </ul>
                                <p>Quantity: 2</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)"><i class="fa fa-arrow-circle-left fa-lg"></i> Continue shoping</button>
                        </div>
                        <div class="col-xs-6">
                            <a href="checkout" class="btn btn-primary" style="width:100%"><i class="fa fa-shopping-cart fa-lg"></i> Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
        
@section('pagescript')
        <script src="assets/js/jquery.imgzoom.js"></script>
        <script>
            function qty(x){
                ampas = document.getElementById("qty");
                if (x == "+" ) ampas.value ++;
                else if (x == "-") ampas.value --;
            }
            $(document).ready(function() {
                $('.imgBox').imgZoom();
                $('#sizingtrigger').click(function() {
                    $('#sizingmodal').modal();
                });
                $('#carttrigger').click(function() {
                    $('#cartmodal').modal();
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