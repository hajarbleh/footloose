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
                        <a href="#" value='0' class="list-group-item admin active">Transaksi</a>
                        <a href="#" value='1' class="list-group-item admin">Kategori</a>
                        <a href="#" value='2' class="list-group-item admin">Produk</a>
                        <a href="#" value='3' class="list-group-item admin">Harga</a>
                        <a href="#" value='4' class="list-group-item admin">Kupon Promo</a>
                        <a href="#" value='5' class="list-group-item admin">Slider</a>
                        <a href="#" value='6' class="list-group-item admin">FOTM</a>
                        <a href="#" value='7' class="list-group-item admin">FAQ</a>
                        <a href="#" value='8' class="list-group-item admin">Web Info</a>
                        <a href="#" value='9' class="list-group-item admin">User</a>
                    </div>

                </div>
                <div class="col-sm-10">
                    <div class="sectionContent" id="section0" style="font-size:0.85em">
                        @include('admin.transaksi')
                    </div>
                    <div class="sectionContent" id="section1" style="font-size:0.85em">
                        @include('admin.kategori')
                    </div>
                    <div class="sectionContent" id="section2" style="font-size:0.85em">
                        @include('admin.produk')
                    </div>
                    <div class="sectionContent" id="section3" style="font-size:0.85em">
                        @include('admin.price')
                    </div>
                    <div class="sectionContent" id="section4" style="font-size:0.85em">
                        @include('admin.kupon')
                    </div>
                    <div class="sectionContent" id="section5" style="font-size:0.85em">
                        @include('admin.slider')
                    </div>
                    <div class="sectionContent" id="section6" style="font-size:0.85em">
                        @include('admin.fotm')
                    </div>
                    <div class="sectionContent" id="section7" style="font-size:0.85em">
                        @include('admin.faq')
                    </div>
                    <div class="sectionContent" id="section8" style="font-size:0.85em">
                        @include('admin.detail')
                    </div>
                    <div class="sectionContent" id="section9" style="font-size:0.85em">
                        @include('admin.user')
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
<script type="text/javascript" src="{{ URL::asset('assets/js/admin.js') }}"></script>
<script>
    CKEDITOR.replace( 'faqeditor' );
</script>

@endsection