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

    <div class="modal fade" id="profilmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><b>Pesanan berhasil kami terima</b></h3>
                </div>
                <div class="modal-body">
                    <form class="row">
                        <div class="col-sm-12">
                            <p>Silahkan cek email anda untuk proses selanjutnya. Anda juga bisa mengecek status barang anda melalui link dibawah.</p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Exit</button>
                        </div>
                        <div class="col-xs-6">
                            <a href="user" class="btn btn-primary" style="width:100%"><i class="fa fa-truck fa-lg"></i> Cek Status</a>
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
            <?php for ($i=1;$i<=2;$i++){ ?>
            <div class="row" style="margin-bottom:1rem">
                <div class="col-xs-2">
                    <img src="assets/img/product/c1p1/col1/thumb/1.jpg" style="width:100%">
                </div>
                <div class="col-xs-3">
                    <b>Nama Produk</b><br>
                    <b>Warna</b>
                    <p>Detil</p>
                </div>
                <div class="col-xs-2">
                    Rp 120.000
                </div>
                <div class="col-xs-2">
                    QTY
                </div>
                <div class="col-xs-2">
                    Rp 240.000
                </div>
                <div class="col-xs-1">
                    <a href="#!" style="color:inherit"><i class="fa fa-times fa-lg"></i></a>
                </div>
            </div>
            <?php } ?>

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
                <b>Rp 480.000</b>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 offset-xs-9">
                <btn id="profiltrigger" class="btn btn-secondary btn-hav-w" role="button" style="margin-top:1.3rem; background-color:#3a5bb8"><b style="color:#fff"><i class="fa fa-shopping-cart fa-lg"></i> CHECKOUT</b></btn>
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
            $('nav').css('background','#fff');
            $('#profiltrigger').click(function() {
                $('#profilmodal').modal();
            });
            $('#alamattrigger').click(function() {
                $('#alamatmodal').modal();
            });
        });
    </script>
@endsection