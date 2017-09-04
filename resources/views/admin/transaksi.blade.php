@if($orders->count())
<table id="transaksiTable" class="table table-striped table-bordered display" cellspacing="0" width="100%">
    <thead><tr><th>No.</th><th>Waktu</th><th>Order ID</th><th>Pembeli</th><th>Pesanan</th><th>Jumlah</th><th>Courier Service</th><th>Status</th><th style="min-width:11.5rem">Action</th></tr></thead>
    <tbody>
        @php $count = 1; @endphp
        @foreach($orders as $order)
        <tr>
            <td>@php echo $count++ @endphp</td>
            <td>{{$order->created_at}}</td>
            <td>MYO-#@php printf("%04d", $order->id); @endphp</td>
            <td>
                {{$order->user_name}}<br>
                ({{$order->user_email}})<br>
                ({{$order->user_phone}})<br>
                <button class="btn btn-sm collape-trigger" data-toggle="collapse" style="margin-top:0.3rem; padding-top:0; padding-bottom:0"><small>lihat alamat</small></button>
                <div class="collapse">
                    <div style="margin-top:0.3rem">{{$order->custom_attributes['address']}}</div>
                </div>
            </td>
            <td id="transactionDetailCell">
                <button class="btn btn-outline-primary btn-sm" id="{{$order->id}}" data-toggle="modal" data-target="#lihatPesanan">lihat pesanan</button>
            </td>
            <td>Rp. {{$order->custom_attributes['total']}}</td>
            <td>{{$order->custom_attributes['service']}}</td>
            @if($order->state == 'completed')
            <td class="text-info"><b>Menunggu konfirmasi admin</b><br></td>
            @else
            <td class="text-info"><b>{{$order->state}}</b><br></td>
            @endif
            <td>
                <span class="dropdown">
                    <form action="/admin/transaction/changestatus/{{$order->id}}" method="POST">
                        {{csrf_field()}}
                        <select class="btn btn-sm dropdown-toggle transaksi" name="status" id="dropdownMenuButton" onchange="this.form.submit()">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <option class="dropdown-item" value="Pesanan Diterima">Order accepted</option>
                                <option class="dropdown-item" value="Pembayaran Diterima">Payment confirmed</option>
                                <option class="dropdown-item" value="Barang Dikirim">Order delivered</option>
                                <option class="dropdown-item" value="Transaksi Dibatalkan">Transaction cancelled</option>
                                <option class="dropdown-item" value="Transaksi Selesai">Transaction done</option>
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
                                    <th>Category</th>
                                    <th>Size</th>
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