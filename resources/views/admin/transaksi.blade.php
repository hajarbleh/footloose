@if($transaction->count())
<table id="transaksiTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead><tr><th>No.</th><th>Waktu</th><th>Pembeli</th><th>Pesanan</th><th>Jumlah</th><th>Status</th><th style="min-width:11.5rem">Action</th></tr></thead>
    <tbody>
        @php $count = 1; @endphp
        @foreach($transaction as $t)
        <tr>
            <td>@php echo $count++ @endphp</td>
            <td>{{$t->timestamp}}</td>
            <td>
                {{$t->name}}<br>
                ({{$t->email}})<br>
                ({{$t->phone}})<br>
                <button class="btn btn-sm collape-trigger" data-toggle="collapse" style="margin-top:0.3rem; padding-top:0; padding-bottom:0"><small>lihat alamat</small></button>
                <div class="collapse">
                    <div style="margin-top:0.3rem">{{$t->address}}</div>
                    <hr style="margin:0.3rem 0">
                    <b>Kota: {{$t->city}}, Prov: {{$t->state}}, Kodepos: {{$t->postal_code}}</b>
                </div>

            </td>
            <td id="transactionDetailCell">
                <button class="btn btn-outline-primary btn-sm" id="{{$t->id}}" data-toggle="modal" data-target="#lihatPesanan">lihat pesanan</button>
            </td>
            <td>{{$t->total}}</td>
            <td class="text-info"><b>{{$t->transaction_status}}</b><br></td>
            <td>
                <span class="dropdown">
                    <form action="/admin/transaction/changestatus/{{$t->id}}" method="POST">
                        {{csrf_field()}}
                        <select class="btn btn-sm dropdown-toggle transaksi" name="status" id="dropdownMenuButton" onchange="this.form.submit()">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <option class="dropdown-item" value="Pesanan Diterima">Pesanan Diterima</option>
                                <option class="dropdown-item" value="Pembayaran Diterima">Pembayaran Diterima</option>
                                <option class="dropdown-item" value="Barang Dikirim">Barang Dikirim</option>
                                <option class="dropdown-item" value="Transaksi Dibatalkan">Transaksi Dibatalkan</option>
                                <option class="dropdown-item" value="Transaksi Selesain">Transaksi Selesain</option>
                            </div>
                        </select>
                    </form>
                </span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="modal fade" id="lihatPesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="EditModalTitle"><center><b>Detail Pesanan</b></center></h4>
            </div>
            <form method="POST" id="form-update-coupon">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <table cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Base</th>
                                    <th>Strap</th>
                                    <th>Tattoo</th>
                                    <th>Qty</th>
                                </tr>
                            </thead>
                            <tbody id="transactionDetailBody">

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-primary" style="width:100%;" data-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@else
<div class="alert alert-warning">
        <i class="fa fa-exclamation-triangle"></i> No Transactions
</div>
@endif