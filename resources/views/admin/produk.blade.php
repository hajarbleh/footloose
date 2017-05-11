<div class="row">
    <div class="col-sm-12">
        <a href="#!" class="btn btn-primary btn-bg" style="margin-bottom:1rem">+ Tambahkan Produk</a>
    </div>
    @for($i=1;$i<=7;$i++)
    <div class="col-sm-5ths col-xs-6">
        <div class="card">
            <img class="card-img-top" src="assets/img/product/c1p1/col1/1.jpg" style="width:100%" alt="Card image cap">
            <div class="card-block">
                <b class="card-title">ID: 2123</b>
                <p class="card-text">
                    <b>Nama Produk</b><br>
                    Base / Women<br>
                    Stock: 17
                </p>
                <a href="#" class="btn btn-outline-primary btn-sm">Edit</a>
                <a href="#" class="btn btn-outline-danger btn-sm">Hapus</a>
            </div>
        </div>
    </div>
    @endfor
</div>