@extends('include.master')
@section('title', 'My Data')
@section('body')
    @include('include.navbar')
    <div style="width:100%; overflow:hidden; padding:5rem 0 0 0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2><i class="fa fa-user fa-lg"></i> <b>My Data</b></h2>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    @if (Session::has('msg'))
                        <div class="alert alert-warning">
                            {{ Session::get('msg') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="profilmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="EditModalTitle"><center><b>Edit Profile</b></center></h4>
                </div>
                <form action="/editprofile/{{$user->id}}" method="POST">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label for="name">Name*</label>
                                <input name="name" type="text" class="form-control" id="name" value="{{$user->name}}" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="birthday">Birthday*</label>
                                <input name="birthday" type="date" class="form-control" id="birthday" value="{{$user->birthday}}" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="phone">Phone*</label>
                                <input name="phone" type="number" class="form-control" id="phone" value="{{$user->phone}}" required>
                            </div>
                            <div class="form-group col-sm-12">
                                <label for="line">Line ID</label>
                                <input name="line" type="text" class="form-control" id="line" value="{{$user->line}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="width:100%"> <i class="fa fa-save fa-lg"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="passwordmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/changepassword/{{$user->id}}" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="modal-body">
                                <div class="form-group col-sm-12">
                                    <label for="current_password">Current Password*</label>
                                    <input name="current_password" type="password" class="form-control" id="current_password" placeholder="Current Password" required>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="new_password">New Password*</label>
                                    <input name="new_password" type="password" class="form-control" id="new_password" placeholder="New Password" required>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="new_password_confirmation">Re-type Password*</label>
                                    <input name="new_password_confirmation" type="password" class="form-control" id="new_password_confirmation" placeholder="Re-type Password" required>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="width:100%"> <i class="fa fa-save fa-lg"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alamatmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/editaddress/{{$user->id}}" method="POST">
                    {{csrf_field()}}
	                {{ Form::hidden('cityID', '0', array('id' => 'cityID')) }}
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label for="address">Address*</label>
                                <textarea name="address" class="form-control" id="address" rows="10" value="{{$user->address}}" required></textarea>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="prov">Province*</label>
                                <select name="state" class="form-control" id="prov" onchange="selectProv(this)" required>
                                    <option name="0"value="0"></option>
                                    @foreach($provinces as $p)
                                        <option name="{{$p['province_id']}}" value="{{$p['province']}}">{{$p['province']}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="kota">City*</label>
                                <select name="city" class="form-control" id="kota" onchange="selectCity(this)" required></select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="kodepos">Postal Code*</label>
                                <input name="postal_code" type="number" class="form-control" id="kodepos" value="{{$user->postal_code}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="width:100%"> <i class="fa fa-save fa-lg"></i> Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lihatPesanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="EditModalTitle"><center><b>Detail Pesanan</b></center></h4>
                </div>
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
                                <tr>
                                    
                                </tr>
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
            </div>
        </div>
    </div>

    <div style="width:100%; overflow:hidden; padding:3rem 0 5rem 0">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card" style="width:100%; margin-bottom:1.5rem; border:solid 1px #ddd">
                        <div class="card-block">
                            <h4 class="card-title"><b>Payment Information</b></h4>
                            <div class="card-text">
                                You are one step away to complete your order! Please send your payment within 3x24 hours to BCA / Sonia Felicia / 4971179761 and send your payment confirmation through out LINE@ (@hellofootloose). Thank you!
                            </div>
                        </div>
                    </div><div class="card" style="width:100%; margin-bottom:1.5rem; border:solid 1px #ddd">
                        <div class="card-block">
                            <h4 class="card-title"><b>Status Pesanan</b></h4>
                            <div class="card-text">                                
                                <div class="table-responsive">
                                <table id="transaksiTable" class="table table-striped table-bordered display" cellspacing="0" width="100%">
                                    <thead><tr><th>No.</th><th>Waktu</th><th>Order ID</th><th>Pesanan</th><th>Jumlah</th><th>Courier Service</th><th>Status</th></tr></thead>
                                    <tbody>
                                        @php $count = 1; @endphp
                                        @foreach($orders as $order)
                                        <tr>
                                            <td>@php echo $count++ @endphp</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>MYO-#@php printf("%04d", $order->id);@endphp</td>
                                            <td id="transactionDetailCell">
                                                <button class="btn btn-outline-primary btn-sm" id="{{$order->id}}" data-toggle="modal" onclick="seedetails(this)" data-target="#lihatPesanan">lihat pesanan</button>
                                            </td>
                                            <td>{{$order->custom_attributes['total'] + $order->custom_attributes['delivery_cost']}}</td>
                                            <td>{{$order->custom_attributes['service']}}</td>
                                            @if($order->state == "completed")
                                            <td class="text-info"><b>Menunggu konfirmasi admin</b><br></td>
                                            @else
                                            <td class="text-info"><b>{{$order->state}}</b><br></td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card" style="width:100%; border:solid 1px #ddd; min-height:13.5rem">
                            <div class="card-block">
                                <h4 class="card-title"><b>Data Diri</b></h4>
                                <div class="card-text">
                                    <div class="row">
                                        <div class="col-xs-3">Nama</div>
                                        @if(!($user->name))
                                            <div class="col-xs-9">-</div>
                                        @else
                                            <div class="col-xs-9">{{$user->name}}</div>
                                        @endif
                                        <div class="col-xs-3">Email</div>
                                        @if(!($user->email))
                                            <div class="col-xs-9">email@email.com</div>
                                        @else
                                            <div class="col-xs-9">{{$user->email}}</div>
                                        @endif
                                        <div class="col-xs-3">Password</div>
                                        <div class="col-xs-9">******</div>
                                        <div class="col-xs-3">Phone</div>
                                        @if(!($user->phone))
                                            <div class="col-xs-9">-</div>
                                        @else
                                            <div class="col-xs-9">{{$user->phone}}</div>
                                        @endif
                                    </div>
                                </div>
                                <br>
                                <a href="#!" id="profiltrigger" class="btn btn-primary pull-right" style="margin-left:10px">EDIT PROFILE</a>
                                <a href="#!" id="passwordtrigger" class="btn btn-primary pull-right">CHANGE PASSWORD</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card" style="width:100%; border:solid 1px #ddd; min-height:13.5rem">
                            <div class="card-block">
                                <h4 class="card-title"><b>Alamat Pengiriman</b></h4>
                                <p class="card-text">
                                        @if(!($user->address))
                                            -
                                        @else
                                            {{$user->address}}
                                        @endif
                                </p>
                                <p class="card-text">
                                    Kota: 
                                        @if(!($user->city))
                                            -
                                        @else
                                            {{$user->city}}
                                        @endif
                                    , 
                                    Prov: 
                                        @if(!($user->state))
                                            -
                                        @else
                                            {{$user->state}}
                                        @endif
                                    , 
                                    Kodepos: 
                                        @if(!($user->postal_code))
                                            -
                                        @else
                                            {{$user->postal_code}}
                                        @endif
                                </p>
                                <a href="#!" id="alamattrigger" class="btn btn-primary pull-right">EDIT</a>
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
    <script type="text/javascript" src="{{ URL::asset('assets/js/myprofile.js') }}"></script>
@endsection