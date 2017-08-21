@extends('include.master')
@section('title', 'Check Out')
@section('body')
    @include('include.navbar')        

    <div style="width:100%; overflow:hidden; padding:5rem 0 0 0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2><i class="fa fa-shopping-cart fa-lg"></i> <b>Shopping Cart</b></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alamatmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><b>Konfirmasi alamat pengiriman</b></h3>
                </div>
                <div class="modal-body">
                    <form class="row">
                        <div class="col-sm-12">
                            <center><div id="erroralert2"></div></center>
                        </div>
                        <div id="successalert" class="alert alert-warning" style="padding-bottom:0px; display:none">
                            <center><p><i>Pesanan Berhasil Kami Terima, Terima kasih.</i></p></center>
                        </div>
                        <div class="col-sm-12">
                            <p><b>Pastikan bahwa alamat pengiriman dibawah sudah benar.</b></p>
                            <p id="address">{{Auth::user()->address}}, Kode pos {{Auth::user()->postal_code}}, Kota {{Auth::user()->city}}, Provinsi {{Auth::user()->state}}</p>
                            <p>
                                <b>Payment Information</b><br/>
                                You are one step away to complete your order! Please send your payment within 3x24 hours to BCA / Sonia Felicia / 4971179761 and send your payment confirmation through out LINE@ (@hellofootloose). Thank you! (This information can also be accessed from your profile page)
                            </p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="/myprofile" class="btn btn-secondary" style="width:100%; border:none"><i class="fa fa-pencil fa-lg"></i> Ganti Alamat</a>
                        </div>
                        <div class="col-xs-6">
                            <button id="finalizetrigger" data-toggle="modal" class="btn btn-primary" style="width:100%"><i class="fa fa-truck fa-lg"></i> Lanjutkan</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="finalizemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><b>Pesanan Berhasil Kami Terima</b></h3>
                </div>
                <div class="modal-body">
                    <form class="row">
                        <div class="col-sm-12">
                            <p>Terima kasih sudah memesan barang di Footloose. Silahkan cek email anda untuk melanjutkan pembayaran, atau cek status barang di halaman profilmu.</p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary" style="width:100%; border:none"> Exit</button>
                        </div>
                        <div class="col-xs-6">
                            <a id="finalize" href="myprofile" class="btn btn-primary" style="width:100%"><i class="fa fa-truck fa-lg"></i> Cek Status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div style="width:100%; overflow:hidden; margin-top:2rem; margin-bottom:1rem; padding:1rem 0 1rem 0;">
        <div class="container">
            <div class="row" style="margin-bottom:1rem">
                <div class="col-xs-5">
                    <b>Items</b>
                </div>
                <div class="col-xs-2">
                    <b>Price</b>
                </div>
                <div class="col-xs-2">
                    <b>Quantity</b>
                </div>
                <div class="col-xs-3">
                    <b>Subtotal</b>
                </div>
            </div>
            <hr>
            @foreach($cart as $c)
            <div class="row" style="margin-bottom:1rem">
                <div class="col-xs-2">
                    <img id="basepic" src="{{$c['custom_attributes']['base_picture']}}" style="position:absolute; width:170%; margin-left:-80px; margin-top:-15px">
                    <img id="strappic" src="{{$c['custom_attributes']['strap_picture']}}" style="z-index:10; position:relative; width:203%; margin-left:-80px; margin-top:-15px">
                </div>
                <div id="products" class="col-xs-3">
                    <b>Product: </b><br>
                    {{$c['name']}} with {{$c['custom_attributes']['strap_name']}} <br/>
                    <b>Size: </b><br/>
                    {{$c['custom_attributes']['size']}} <br/>
                    <b>Category: </b><br/>
                    {{$c['custom_attributes']['category_name']}}

                </div>
                <div class="col-xs-2">
                    {{$c['price']}}
                </div>
                <div class="col-xs-2">
                    {{$c['quantity']}}
                </div>
                <div class="col-xs-2">
                    Rp {{$c['quantity'] * $c['price']}}
                </div>
                <div class="col-xs-1">
                    <form action="/cart/remove/{{$c->id}}" method="POST">
                        {{csrf_field()}}
                        <button type="submit" style="outline:none; border-color:transparent; background-color:transparent"><i class="fa fa-times fa-lg"></i></button>
                    </form>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <div class="container" style="margin-bottom:3rem">
        <div class="row">
            <div class="col-xs-2 offset-xs-7">
                Select Courier
            </div>
            <select id="selectCourier" class="form-control form-control-sm" style="display: block; width: 15%; background-color:rgba(0, 0, 0, 0.075); border:none; margin-top:0.3rem" onchange="selectCour(this)">
                <option selected disabled>Select Courier</option>
                <option value="jne">JNE</option>
                <option value="pos">Pos Indonesia</option>
                <option value="tiki">TIKI</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div class="row">
            <div class="col-xs-2 offset-xs-7">
                Select Service
            </div>
            <select id="selectService" class="form-control form-control-sm" style="display: block; width: 15%; background-color:rgba(0, 0, 0, 0.075); border:none; margin-top:0.3rem" onchange='selectServ()' disabled>
            </select>
        </div>
        <div class="row">
            <div class="col-xs-2 offset-xs-7">
                Delivery Cost
            </div>
            <div id="deliveryCost" class="col-xs-3" style="padding-left:0px">
                <b>Rp -</b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 offset-xs-7">
                Total
            </div>
            <div id="total" class="col-xs-3" style="padding-left:0px">
                <b>Rp {{$total}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 offset-xs-7">
                <div id="erroralert"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-2 offset-xs-7">
                Kupon
            </div>
            <form method="POST" action="/usecoupon/">
                {{csrf_field()}}
                @if(session()->has('coupon'))
                    <div class="col-xs-2" style="padding-left:0px">
                        <input type="text" name="coupon" class="form-control" value="{{session()->get('coupon')->code}}">
                    </div>
                    <div class="col-xs-1" style="padding-left:0px">
                        <button class="btn btn-secondary" type="submit" style="width:100%">
                            <i class="fa fa-check fa-lg" style="color:#66ff66"></i>
                        </button>
                    </div>
                @else
                    <div class="col-xs-2" style="padding-left:0px">
                        <input type="text" name="coupon" class="form-control" placeholder="Coupon code">
                    </div>
                    <div class="col-xs-1" style="padding-left:0px">
                        <button class="btn btn-secondary" type="submit" style="width:100%">
                            Use
                        </button>
                    </div>
                @endif
            </form>
            @if(session()->has('message'))
                <div class="col-xs-3 offset-xs-9 alert alert-warning">{{session()->get('message')}}</div>
            @endif
        </div>
        <div class="row">
            <div class="col-xs-3 offset-xs-9">
                <btn id="alamattrigger" class="btn btn-secondary btn-hav-w" role="button" style="margin-top:1.3rem; background-color:#3a5bb8"><b style="color:#fff"><i class="fa fa-shopping-cart fa-lg"></i> CHECKOUT</b></btn>
            </div>
        </div>
    </div>

@endsection

@section('pagescript')
    <script type="text/javascript" src="{{ URL::asset('assets/js/checkout.js') }}"></script>
@endsection