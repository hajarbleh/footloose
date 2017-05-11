@extends('include.master')
@section('title', 'Admin Page')
@section('pagecss')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css">
@endsection

@section('body')
    @include('include.navbarwhite')
    <div style="width:100%; overflow:hidden; padding:5rem 0 0 0; color:#fff; background-color:#464646;">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <b><i class="fa fa-gear fa-lg"></i> <b>Admin Page</b></b>
                </div>
                <div class="col-sm-12">
                    <h2><b><span id="sectionTitle"></b></h2>
                </div>
            </div>
        </div>
    </div>
      

    <div style="width:100%; overflow:hidden; padding:2rem 0 3rem 0">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="list-group" style="font-size:0.9rem">
                        <a href="#" value='5' class="list-group-item active">Transaksi</a>
                        <a href="#" value='2' class="list-group-item">Kupon Promo</a>
                        <a href="#" value='0' class="list-group-item">Kategori</a>
                        <a href="#" value='1' class="list-group-item">Produk</a>
                        <a href="#" value='3' class="list-group-item">FAQ</a>
                        <a href="#" value='4' class="list-group-item">Web Info</a>
                    </div>

                </div>
                <div class="col-sm-10">
                    <div class="sectionContent" id="section5" style="font-size:0.85em">
                        <table id="transaksiTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead><tr><th>No.</th><th>Tanggal</th><th>Pembeli</th><th>Pesanan</th><th>Status</th><th style="min-width:8.7rem">Action</th></tr></thead>
                            <tbody>
                                <tr>
                                    <td>1235435</td>
                                    <td>2008/09/26</td>
                                    <td>
                                        Andi Ersaldy Raisha <br>
                                        (andi.ersaldy@gmail.com)<br>
                                        <button class="btn btn-sm collape-trigger" data-toggle="collapse" style="padding-top:0; padding-bottom:0">...</button>
                                        <div class="collapse">
                                            Jalan Teknik Komputer IV Perumahan Dosen ITS Blok U-125, Kampus ITS Sukolilo
                                            <hr style="margin:0.3rem 0">
                                            <b>Kota: Surabaya, Prov: Jawa Timur, Kodepos: 60111</b>
                                        </div>

                                    </td>
                                    <td>
                                        Yellow Base, Blue Strap, Tiger Tattoo<br>
                                        <h5>Rp 240.000</h5></b>
                                    </td>
                                    <td class="text-info"><b>Pembayaran Diterima</b><br></td>
                                    <td>
                                        <a href="#!" class="btn btn-primary btn-sm">Ubah Status</a>
                                        <a href="#!" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6345345</td>
                                    <td>2008/11/26</td>
                                    <td>
                                        Andi Ersaldy Raisha <br>
                                        (andi.ersaldy@gmail.com)<br>
                                        <button class="btn btn-sm collape-trigger" data-toggle="collapse" style="padding-top:0; padding-bottom:0">...</button>
                                        <div class="collapse">
                                            Jalan Teknik Komputer IV Perumahan Dosen ITS Blok U-125, Kampus ITS Sukolilo
                                            <hr style="margin:0.3rem 0">
                                            <b>Kota: Surabaya, Prov: Jawa Timur, Kodepos: 60111</b>
                                        </div>

                                    </td>
                                    <td>
                                        Yellow Base, Blue Strap, Tiger Tattoo<br>
                                        <h5>Rp 240.000</h5></b>
                                    </td>
                                    <td class="text-success"><b>Transaksi Selesai</b></td>
                                    <td>
                                        <a href="#!" class="btn btn-primary btn-sm">Ubah Status</a>
                                        <a href="#!" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8168465</td>
                                    <td>2010/09/26</td>
                                    <td>
                                        Andi Ersaldy Raisha <br>
                                        (andi.ersaldy@gmail.com)<br>
                                        <button class="btn btn-sm collape-trigger" data-toggle="collapse" style="padding-top:0; padding-bottom:0">...</button>
                                        <div class="collapse">
                                            Jalan Teknik Komputer IV Perumahan Dosen ITS Blok U-125, Kampus ITS Sukolilo
                                            <hr style="margin:0.3rem 0">
                                            <b>Kota: Surabaya, Prov: Jawa Timur, Kodepos: 60111</b>
                                        </div>

                                    </td>
                                    <td>
                                        Yellow Base, Blue Strap, Tiger Tattoo<br>
                                        <h5>Rp 240.000</h5></b>
                                    </td>
                                    <td class="text-primary"><b>Barang Dikirim</b></td>
                                    <td>
                                        <a href="#!" class="btn btn-primary btn-sm">Ubah Status</a>
                                        <a href="#!" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>1517248</td>
                                    <td>2009/09/26</td>
                                    <td>
                                        Andi Ersaldy Raisha <br>
                                        (andi.ersaldy@gmail.com)<br>
                                        <button class="btn btn-sm collape-trigger" data-toggle="collapse" style="padding-top:0; padding-bottom:0">...</button>
                                        <div class="collapse">
                                            Jalan Teknik Komputer IV Perumahan Dosen ITS Blok U-125, Kampus ITS Sukolilo
                                            <hr style="margin:0.3rem 0">
                                            <b>Kota: Surabaya, Prov: Jawa Timur, Kodepos: 60111</b>
                                        </div>

                                    </td>
                                    <td>
                                        Yellow Base, Blue Strap, Tiger Tattoo<br>
                                        <h5>Rp 240.000</h5></b>
                                    </td>
                                    <td class="text-danger"><b>Transaksi Dibatalkan</b></td>
                                    <td>
                                        <a href="#!" class="btn btn-primary btn-sm">Ubah Status</a>
                                        <a href="#!" class="btn btn-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sectionContent" id="section0" style="font-size:0.85em">
                        <a href="#!" class="btn btn-primary btn-bg" style="margin-bottom:1rem">+ Tambahkan Kategori</a>
                        <table id="categoryTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead><tr><th>Nama Kategori</th><th>Jumlah Produk</th><th>Status</th><th>Action</th></tr></thead>
                            <tbody>
                                <tr>
                                    <td>Perempuan</td>
                                    <td>29</td>
                                    <td class="text-success">Enabled</td>
                                    <td>
                                        <a href="#!" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <a href="#!" class="btn btn-outline-danger btn-sm">Disable</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Laki-laki</td>
                                    <td>10</td>
                                    <td class="text-danger"><b>Disabled</b></td>
                                    <td>
                                        <a href="#!" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <a href="#!" class="btn btn-outline-success btn-sm">Enable</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Category3</td>
                                    <td>0</td>
                                    <td class="text-danger"><b>Disabled</b></td>
                                    <td>
                                        <a href="#!" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <a href="#!" class="btn btn-outline-success btn-sm">Enable</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Category4</td>
                                    <td>0</td>
                                    <td class="text-danger"><b>Disabled</b></td>
                                    <td>
                                        <a href="#!" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <a href="#!" class="btn btn-outline-success btn-sm">Enable</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sectionContent" id="section1" style="font-size:0.85em">
                        <div class="row">
                            <div class="col-sm-12">
                                <a href="#!" class="btn btn-primary btn-bg" style="margin-bottom:1rem">+ Tambahkan Produk</a>
                            </div>
                            @for($i=1;$i<=7;$i++)
                            <div class="col-sm-5ths col-xs-6">
                                <div class="card">
                                    <img class="card-img-top" src="assets/img/product/c1p1/col1/1.jpg" style="width:100%" alt="Card image cap">
                                    <div class="card-block">
                                        <b class="card-title">Nama Produk</b>
                                        <p class="card-text">
                                            Base<br>
                                            Men / Flipflop<br>
                                            Stock: 17
                                        </p>
                                        <a href="#" class="btn btn-outline-primary btn-sm" btn-sm>Edit</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm">Hapus</a>
                                    </div>
                                </div>
                            </div>
                            @endfor
                        </div>
                    </div>
                    <div class="sectionContent" id="section2" style="font-size:0.85em">
                        <a href="#!" class="btn btn-primary btn-bg" style="margin-bottom:1rem">+ Tambahkan Kupon</a>
                        <table id="promoTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead><tr><th>Kode</th><th>Nama</th><th>Potongan</th><th>Mulai</th><th>Selesai</th><th>Action</th></tr></thead>
                            <tbody>
                                <tr>
                                    <td>WELC50</td>
                                    <td>Welcoming Promo</td>
                                    <td>10%</td>
                                    <td>10 Oktober 2017</td>
                                    <td>28 Oktober 2017</td>
                                    <td>
                                        <a href="#!" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <a href="#!" class="btn btn-outline-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HOT50</td>
                                    <td>HOT Promo</td>
                                    <td>5%</td>
                                    <td>1 Maret 2017</td>
                                    <td>28 Maret 2017</td>
                                    <td>
                                        <a href="#!" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <a href="#!" class="btn btn-outline-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>HOT50</td>
                                    <td>HOT Promo</td>
                                    <td>5%</td>
                                    <td>1 Maret 2017</td>
                                    <td>28 Maret 2017</td>
                                    <td>
                                        <a href="#!" class="btn btn-outline-primary btn-sm">Edit</a>
                                        <a href="#!" class="btn btn-outline-danger btn-sm">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sectionContent" id="section3">
                        <div class="row">
                            <div class="col-sm-12">
                                <textarea name="faqeditor" id="faqeditor" rows="10" cols="80">
                                    FAQ
                                </textarea>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary" style="width:100%">Update</button>
                            </div>
                        </div>
                    </div>
                    <div class="sectionContent" id="section4">
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="sr-only" for="inlineFormInputGroup">Email Address</label>
                                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                                    <div class="input-group-addon">@</div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Email Address">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="sr-only" for="inlineFormInputGroup">Instagram Account</label>
                                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                                    <div class="input-group-addon"><i class="fa fa-instagram"></i></div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Instagram Account">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="sr-only" for="inlineFormInputGroup">Twitter Account</label>
                                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                                    <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Twitter Account">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="sr-only" for="inlineFormInputGroup">LINE@ Account</label>
                                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                                    <div class="input-group-addon">@</div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="LINE@ Account">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="sr-only" for="inlineFormInputGroup">Facebook Account</label>
                                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                                    <div class="input-group-addon"><i class="fa fa-facebook fa-lg"></i></div>
                                    <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Facebook Account">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <button class="btn btn-outline-primary" style="width:100%">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')

        
<script src="assets/js/ckeditor.js"></script>
<script src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function(){
        var currentSection = 5;
        var sectionTitle = ['Kategori', 'Produk', 'Kupon Promo', 'FAQ', 'Web Info', 'Transaksi'];

        $('.sectionContent').hide();
        $('#section5').show();
        $('.list-group-item').click(function(){
            currentSection = $(this).attr('value');
            $('#sectionTitle').html(sectionTitle[currentSection]);
            $('.list-group-item').removeClass('active');
            $('.list-group-item').removeClass('active');
            $('.sectionContent').hide();
            $('#section'+currentSection).show();
            $(this).addClass('active');
        });
        $('#sectionTitle').html(sectionTitle[currentSection]);
        $('.collape-trigger').click(function(){
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
</script>
<script>
    CKEDITOR.replace( 'faqeditor' );
</script>

@endsection