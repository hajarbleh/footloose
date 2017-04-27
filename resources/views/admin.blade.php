@extends('include.master')
@section('title', 'Admin Page')
@section('body')
    @include('include.navbar')
    <div style="width:100%; overflow:hidden; padding:5rem 0 0 0">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2><i class="fa fa-gear fa-lg"></i> <b>Admin Page</b></h2>
                </div>
            </div>
        </div>
    </div>

    <div style="width:100%; overflow:hidden; padding:2rem 0 3rem 0">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Cras justo odi</a>
                        <a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
                        <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                        <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                        <a href="#" class="list-group-item list-group-item-action">Vestibulum at eros</a>
                    </div>

                </div>
                <div class="col-sm-9">
                    azek
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