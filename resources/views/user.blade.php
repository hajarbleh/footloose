@extends('include.master')
@section('title', 'My Data')
@section('body')
    @include('include.navbar')
    <div style="width:100%; overflow:hidden; padding:5rem 0 0 0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2><i class="fa fa-user fa-lg"></i> <b>My Data</b></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="profilmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="row">
                        <div class="form-group col-sm-12">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Andi Ersaldy">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="andi.ersaldy@gmail.com">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="phone">Phone</label>
                            <input type="number" class="form-control" id="phone" placeholder="6287888999000">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="pass">New Password</label>
                            <input type="password" class="form-control" id="pass" placeholder="******">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="pass2">Retype Password</label>
                            <input type="password" class="form-control" id="pass2" placeholder="******">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Exit</button>
                        </div>
                        <div class="col-xs-6">
                            <a href="#!" class="btn btn-primary" style="width:100%" onclick="alert('New data sucessfully saved')"><i class="fa fa-save fa-lg"></i> Save</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="alamatmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <form class="row">
                        <div class="form-group col-sm-6">
                            <label for="address">New Address</label>
                            <textarea class="form-control" id="address" rows="10" placeholder="Jalan Teknik Komputer IV Perumahan Dosen ITS Blok U-125, Kampus ITS Sukolilo"></textarea>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="prov">Province</label>
                            <select class="form-control" id="prov">
                                <option>Jawa Timur</option>
                                <option>Jawa Barat</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="kota">City</label>
                            <select class="form-control" id="kota">
                                <option>Surabaya</option>
                                <option>Malang</option>
                                <option>Bandung</option>
                                <option>Jakarta</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="kodepos">Postal Code</label>
                            <input type="number" class="form-control" id="kodepos" placeholder="60111">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Exit</button>
                        </div>
                        <div class="col-xs-6">
                            <a href="#!" class="btn btn-primary" style="width:100%" onclick="alert('New data sucessfully saved')"><i class="fa fa-save fa-lg"></i> Save</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="width:100%; overflow:hidden; padding:3rem 0 5rem 0">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card card-inverse" style="width:100%; background-color:#3a5bb8; min-height:13.5rem">
                        <div class="card-block">
                            <h4 class="card-title"><b>Personal Data</b></h4>
                            <div class="card-text">
                                <div class="row">
                                    <div class="col-xs-3">Nama</div>
                                    <div class="col-xs-9">Andi Ersaldy</div>                                        
                                    <div class="col-xs-3">Email</div>
                                    <div class="col-xs-9">andi.ersaldy@gmail.com</div>
                                    <div class="col-xs-3">Password</div>
                                    <div class="col-xs-9">******</div>
                                    <div class="col-xs-3">Phone</div>
                                    <div class="col-xs-9">6287888999000</div>
                                </div>
                            </div>
                            <a href="#!" id="profiltrigger" class="btn btn-hav-w pull-right" style="background-color:#fff; color:#3a5bb8">EDIT</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card card-inverse" style="width:100%; background-color:#ff6d6d; min-height:13.5rem">
                        <div class="card-block">
                            <h4 class="card-title"><b>Sending Address</b></h4>
                            <p class="card-text">Jalan Teknik Komputer IV Perumahan Dosen ITS Blok U-125, Kampus ITS Sukolilo</p>
                            <p class="card-text">Kota: Surabaya, Prov: Jawa Timur, Kodepos: 60111</p>
                            <a href="#!" id="alamattrigger" class="btn btn-hav-w pull-right" style="background-color:#fff; color:#ff6d6d">EDIT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script>
        $(document).ready(function() {
            $('#mobile-dropdown').hide();
            $('#mobile-dropdown-toggle').click(function(){
                $('#mobile-dropdown').fadeToggle();
            });
            $('nav').css('background','#fff');
            $('#profiltrigger').click(function() {
                $('#profilmodal').modal();
            });
            $('#alamattrigger').click(function() {
                $('#alamatmodal').modal();
            });
        });
    </script>
@endsection