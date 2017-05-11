<a href="#newPromo" class="btn btn-primary btn-bg" style="margin-bottom:1rem" data-toggle="modal">+ Tambahkan Kupon</a>
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
                <a href="#!" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editPromo">Edit</a>
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
                <a href="#!" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editPromo">Edit</a>
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
                <a href="#!" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#editPromo">Edit</a>
                <a href="#!" class="btn btn-outline-danger btn-sm">Hapus</a>
            </td>
        </tr>
    </tbody>
</table>

<div class="modal fade" id="editPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><center><b>Edit Informasi Promo - WELC50</b></center></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Nama Promo</label>
                                <input type="text" class="form-control" value="Welcoming Promo">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Kode Promo</label>
                                <input type="text" class="form-control" value="WELC50" maxlength="10">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Potongan (%)</label>
                                <input type="number" class="form-control" max="100" min="1" value="10">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Mulai</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Selesai</label>
                                <input type="date" class="form-control">
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

<div class="modal fade" id="newPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><center><b>Buat Kupon Promo</b></center></h4>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Nama Promo</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Kode Promo</label>
                                <input type="text" class="form-control" maxlength="10">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Potongan (%)</label>
                                <input type="number" class="form-control" max="100" min="1">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Mulai</label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Selesai</label>
                                <input type="date" class="form-control">
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