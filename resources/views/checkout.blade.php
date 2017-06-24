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
                            <p><b>Pastikan bahwa alamat pengiriman dibawah sudah benar.</b></p>
                            <p>Jalan Teknik Komputer IV Perumahan Dosen ITS Blok U-125, Kampus ITS Sukolilo</p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="user" class="btn btn-secondary" style="width:100%; border:none"><i class="fa fa-pencil fa-lg"></i> Ganti Alamat</a>
                        </div>
                        <div class="col-xs-6">
                            <a id="finalizetrigger" href="#!" class="btn btn-primary" style="width:100%"><i class="fa fa-truck fa-lg"></i> Lanjutkan</a>
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
                            <p>Terima kasih sudah memesan barang di Footlose. Silahkan cek email anda untuk melanjutkan pembayaran, atau cek status barang di halaman profilmu.</p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="button" data-dismiss="modal" class="btn btn-secondary" style="width:100%; border:none"> Exit</button>
                        </div>
                        <div class="col-xs-6">
                            <a id="finalize" href="user" class="btn btn-primary" style="width:100%"><i class="fa fa-truck fa-lg"></i> Cek Status</a>
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
                    <img src="assets/img/product/c1p1/col1/thumb/1.jpg" style="width:100%">
                </div>
                <div class="col-xs-3">
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
                    <a href="#!" style="color:inherit"><i class="fa fa-times fa-lg"></i></a>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <div class="container" style="margin-bottom:3rem">
        <div class="row">
            <div class="col-xs-2 offset-xs-7">
                Ongkos Kirim<br>
                Subtotal
            </div>
            <div class="col-xs-3">
                <b>Rp 40.000</b><br>
                <b>Rp {{$total}}</b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 offset-xs-9">
                <btn id="alamattrigger" class="btn btn-secondary btn-hav-w" role="button" style="margin-top:1.3rem; background-color:#3a5bb8"><b style="color:#fff"><i class="fa fa-shopping-cart fa-lg"></i> CHECKOUT</b></btn>
            </div>
        </div>
    </div>

@endsection

@section('pagescript')
    <script>
        $(document).ready(function() {
            $('#finalizetrigger').click(function() {
                $('#finalizemodal').modal('show');
                $('#alamatmodal').modal('hide');
            });
            $('#alamattrigger').click(function() {
                $('#alamatmodal').modal('show');
            });
        });
    </script>
@endsection