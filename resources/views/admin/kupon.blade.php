<a href="#newPromo" id="addCoupon" class="btn btn-primary btn-bg" style="margin-bottom:1rem" data-toggle="modal">+ Tambahkan Kupon</a>
@if($coupon->count())
    <table id="promoTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead><tr><th>Kode</th><th>Nama</th><th>Potongan</th><th>Mulai</th><th>Selesai</th><th>Action</th></tr></thead>
        <tbody>
            @foreach($coupon as $c)
            <tr>
                <td>{{$c->code}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->discount}}%</td>
                <td>{{$c->start_date}}</td>
                <td>{{$c->expired_date}}</td>
                <td id="couponCell">
                    <a href="#!" class="btn btn-outline-primary btn-sm" id="{{$c->id}}" data-toggle="modal" data-target="#editPromo">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="editPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="couponEditModalTitle"><center><b>Edit Informasi Promo - WELC50</b></center></h4>
                </div>
                <form method="POST" id="form-update-coupon">
                    {{csrf_field()}}
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="message-text" class="form-control-label">Nama Promo</label>
                                        <input type="text" name="name" class="form-control" value="Welcoming Promo" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Kode Promo</label>
                                        <input type="text" name="code" class="form-control" value="WELC50" maxlength="10" readonly="readonly">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="message-text" class="form-control-label">Potongan (%)</label>
                                        <input type="number" name="discount" class="form-control" max="100" min="1" value="10" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Tanggal Mulai</label>
                                        <input type="date" name="start_date" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Tanggal Selesai</label>
                                        <input type="date" name="expired_date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<div class="modal fade" id="newPromo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><center><b>Buat Kupon Promo</b></center></h4>
            </div>
            <form action="/admin/coupon/add" method="POST">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Nama Promo</label>
                                <input name="name" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Kode Promo</label>
                                <input name="code" type="text" class="form-control" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Potongan (%)</label>
                                <input name="discount" type="number" class="form-control" max="100" min="1" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Mulai</label>
                                <input name="start_date" type="date" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="form-control-label">Tanggal Selesai</label>
                                <input name="expired_date" type="date" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@else
    <div class="alert alert-warning">
            <i class="fa fa-exclamation-triangle"></i> No Coupons
    </div>
@endif
