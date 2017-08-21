@extends('include.master')
@section('title', 'Product Name')
@section('body')
    @include('include.navbarwhite')

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
                    <div class="col-sm-6">
                        <btn id="carttrigger" class="btn btn-secondary btn-hav-w" role="button" style="margin-top:1.3rem; background-color:#3a5bb8; width:100%"><b style="color:#fff"><i class="fa fa-shopping-cart fa-lg"></i> ADD TO CART</b></btn>
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
        <script type="text/javascript" src="{{ URL::asset('assets/js/product.js') }}"></script>
@endsection