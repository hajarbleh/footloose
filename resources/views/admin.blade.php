@extends('include.master')
@section('title', 'Admin Page')
@section('pagecss')
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap4.min.css">
@endsection

@section('body')
    @include('include.navbar')
    <div style="width:100%; overflow:hidden; padding:5rem 0 0 0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2><i class="fa fa-gear fa-lg"></i> <b>Admin /</b> <span id="sectionTitle"></h2>
                </div>
            </div>
        </div>
    </div>

    <div style="width:100%; overflow:hidden; padding:2rem 0 3rem 0">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="list-group">
                        <a href="#" value='5' class="list-group-item active">Transaksi</a>
                        <a href="#" value='0' class="list-group-item">Categories</a>
                        <a href="#" value='1' class="list-group-item">Products</a>
                        <a href="#" value='2' class="list-group-item">Kupon Promo</a>
                        <a href="#" value='3' class="list-group-item">FAQ</a>
                        <a href="#" value='4' class="list-group-item">Web Info</a>
                    </div>

                </div>
                <div class="col-sm-9">
                    <div id="sectionContent">
<!--                         <table id="transaksiTable" class="table table-striped table-bordered" cellspacing="0" width="100%"><thead><tr><th>Tanggal</th><th>Pembeli</th><th>Pesanan</th><th>Status</th><th>Action</th></tr></thead><tbody><tr><td>2008/09/26</td><td>Andi Ersaldy Raisha (andi.ersaldy@gmail.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>Joko Widodo (this@man.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>John Stephanus Peter (john@john.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>Andi Ersaldy Raisha (andi.ersaldy@gmail.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>Joko Widodo (this@man.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>John Stephanus Peter (john@john.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>Andi Ersaldy Raisha (andi.ersaldy@gmail.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>Joko Widodo (this@man.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>John Stephanus Peter (john@john.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>Andi Ersaldy Raisha (andi.ersaldy@gmail.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>Joko Widodo (this@man.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>John Stephanus Peter (john@john.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>Andi Ersaldy Raisha (andi.ersaldy@gmail.com)</td><td></td><td></td><td></td></tr><tr><td>2008/09/26</td><td>John Stephanus Peter (john@john.com)</td><td></td><td></td><td></td></tr></tbody></table>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')

<script src="http://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function(){
        var currentSection = 5;
        var sectionTitle = ['Categories', 'Products', 'Kupon Promo', 'FAQ', 'Web Info', 'Transaksi'];

        $('.list-group-item').click(function(){
            currentSection = $(this).attr('value');
            $('#sectionTitle').html(sectionTitle[currentSection]);
            $('.list-group-item').removeClass('active');
            $(this).addClass('active');
        });
        $('#sectionTitle').html(sectionTitle[currentSection]);
        
        //$('#sectionContent').html('uwah');

        
        $('#transaksiTable').DataTable();
    });
</script>

@endsection