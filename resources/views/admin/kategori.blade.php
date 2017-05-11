<!--
<a href="#!" class="btn btn-primary btn-bg" style="margin-bottom:1rem">+ Tambahkan Kategori</a>
<div class="card kategori">
        <h4>Category 1</h4>
        <div class="card kategori">
                <b>Subcategory 1.1</b>
        </div>
        <div class="card kategori">
                <b>Subcategory 1.2</b>
        </div>
</div>
<div class="card kategori">
        <h4>Category 2</h4>
</div>
-->



<table id="categoryTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead><tr><th>Nama Kategori</th><th>Jumlah Produk</th><th>Status</th><th>Action</th></tr></thead>
    <tbody>
        <tr>
            <td>Women</td>
            <td>29</td>
            <td class="text-success">Enabled</td>
            <td>
                <a href="#editKategori" class="btn btn-outline-primary btn-sm" data-toggle="modal">Edit</a>
                <a href="#!" class="btn btn-outline-danger btn-sm">Disable</a>
            </td>
        </tr>
        <tr>
            <td>Men</td>
            <td>10</td>
            <td class="text-danger"><b>Disabled</b></td>
            <td>
                <a href="#editKategori" class="btn btn-outline-primary btn-sm" data-toggle="modal">Edit</a>
                <a href="#!" class="btn btn-outline-success btn-sm">Enable</a>
            </td>
        </tr>
        <tr>
            <td>Kids</td>
            <td>0</td>
            <td class="text-danger"><b>Disabled</b></td>
            <td>
                <a href="#editKategori" class="btn btn-outline-primary btn-sm" data-toggle="modal">Edit</a>
                <a href="#!" class="btn btn-outline-success btn-sm">Enable</a>
            </td>
        </tr>
        <tr>
            <td>Category4</td>
            <td>0</td>
            <td class="text-danger"><b>Disabled</b></td>
            <td>
                <a href="#editKategori" class="btn btn-outline-primary btn-sm" data-toggle="modal">Edit</a>
                <a href="#!" class="btn btn-outline-success btn-sm">Enable</a>
            </td>
        </tr>
    </tbody>
</table>

<div class="modal fade" id="editKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><center><b>Edit Kategori - Perempuan</b></center></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Nama Kategori</label>
                                <input type="text" class="form-control" value="Women">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                    </div>
                    <div class="col-sm-6">
                        <button type="button" class="btn btn-primary" style="width:100%">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>