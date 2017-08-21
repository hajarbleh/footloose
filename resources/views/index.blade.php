@extends('include.master')
@section('title', 'Home')
@section('body')
    @include('include.navbar')

    <div style="width:100%; height:100vh; background-color:grey">
        <div class="banner-container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="max-height:100vh;">
                <ol class="carousel-indicators">
                    @foreach($slider as $s)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$loop->index}}" class="{{$loop->first ? 'active' : ''}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    @foreach($slider as $s)
                    <div class="carousel-item {{$loop->first ? 'active' : ''}}">
                        <a href="{{$s->link}}"><div class="slider-helper" style="height:100vh"></div></a>
                        <div class="slider-bg" style="background:url({{$s->photo}}) no-repeat center center; background-size: cover;">
                            <div style="position:absolute; height:100%; width:100%; display:table;">
                                <b><p style="margin-top:100px; vertical-align:middle; text-align:center; font-size:80px">{{$s->title}}</p></b>
                            </div>
                            <div style="position:absolute; height:100%; width:100%; display:table;">
                                <p style="margin-top:200px; vertical-align:middle; text-align:center; font-size:50px">{{$s->body}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div style="width:100%; min-height:20rem; overflow:hidden; color:white; background-color:#3a5bb8; text-align:center; padding:3rem 0 3rem 0">
        <h2><b>Freeflop of the Month</b></h2>
        <div class="container" style="margin-top:2rem">
            <div class="row">
                <div class="col-sm-10 offset-sm-1">
                    @foreach($ffotm as $f)
                        <div class="col-xs-4">
                            <a data-baseid="{{$f->base_id}}" data-basename="{{$f->base_name}}" data-basepic="{{$f->base_picture}}" data-strapid="{{$f->strap_id}}" data-strapname="{{$f->strap_name}}" data-strappic="{{$f->strap_picture}}" data-categoryid="{{$f->category_id}}" href="#ffotm" class="card" style="text-align:center" onclick="selectffotm(this)" data-toggle="modal">
                                <img class="card-img-top img-fluid" style="position:absolute" src="{{$f->base_picture}}" alt="Card image cap">
                                <img class="card-img-top img-fluid" style="z-index:10; position:relative" src="{{$f->strap_picture}}" alt="Card image cap">
                                @if($f->tattoo_id)
                                <img class="card-img-top img-fluid" style="z-index:15; position:absolute; left: 0px; top: 0px;" src="{{$f->tattoo_picture}}" alt="Card image cap">
                                @endif
                                <div class="card-block">
                                    @if(!($f->tattoo_id))
                                    <p style="line-height:1.2rem; margin-bottom:0.5rem"><b>{{$f->base_name}} with {{$f->strap_name}}</b></p>
                                    @else
                                    <p style="line-height:1.2rem; margin-bottom:0.5rem"><b>{{$f->base_name}} with {{$f->strap_name}} and {{$f->tattoo_name}}</b></p>
                                    @endif
                                    <p style="line-height:1.2rem; margin-bottom:0.5rem">{{$f->category_name}}</p>
                                    <h5><b>Rp {{$price->price}}</b></h5>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>        

    <div style="width:100%; min-height:20rem; overflow:hidden; color:white; background-color:#ff6d6d; text-align:center; padding:3rem 0 3rem 0">
        <h2><b>Make Your Own</b></h2>
        <div class="container" style="margin-top:2rem">
            <div class="row">
                <div class="col-md-2 offset-md-2 col-xs-6">
                    <img src="assets/img/home/base.png" style="width:90%">
                    <h2 style="margin-top:1rem; margin-bottom:0"><b>1</b></h2>
                    <p>Choose your style</p>
                </div>
                <div class="col-md-2 col-xs-6">
                    <img src="assets/img/home/base.png" style="width:90%">
                    <h2 style="margin-top:1rem; margin-bottom:0"><b>2</b></h2>
                    <p>Select base color</p>
                </div>
                <div class="col-md-2 col-xs-6">
                    <img src="assets/img/home/strap.png" style="width:90%">
                    <h2 style="margin-top:1rem; margin-bottom:0"><b>3</b></h2>
                    <p>Select strap color</p>
                </div>
                <div class="col-md-2 col-xs-6">
                    <img src="assets/img/home/acc.png" style="width:90%">
                    <h2 style="margin-top:1rem; margin-bottom:0"><b>4</b></h2>
                    <p>Personalize tattoo</p>
                </div>
                <div class="col-sm-12">
                    <a class="btn btn-secondary btn-hav-w" href="{{url('/makeyourown')}}" role="button" style="margin-top:1.5rem"><b style="color:#ff6d6d">MAKE NOW</b></a>
                </div>
            </div>
        </div>
    </div>
@endsection

<div class="modal fade" id="ffotm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center">
                <h4 class="modal-title"><center><b>BUY OUR FREEFLOP OF THE MONTH</b></center></h4>
            </div>
            <form action="/addtocart" method="POST" id="addtocart">
                {{csrf_field()}}
                {{ Form::hidden('categoryID', 'secret', array('id' => 'categoryID')) }}
                {{ Form::hidden('baseID', 'secret', array('id' => 'baseID')) }}
                {{ Form::hidden('strapID', 'secret', array('id' => 'strapID')) }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div id="outofstockalert"></div>
                                <label for="size" class="form-control-label">Size</label>
                                <select id="size" class="form-control" onchange="getffotmstock(this)">
                                    <option selected disabled>Size</option>
                                    <?php for($i = 36; $i < 41; $i++) {
                                        echo "<option value='" . $i . "'>" . $i . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
							<div class="form-group">
                                <label for="quantity" class="form-control-label">Quantity</label>
                                <input id="quantity" name="quantity" type="number" class="form-control" min="1" max="10000" disabled required>
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
                            <button type="submit" data-toggle="modal" class="btn btn-primary" style="width:100%"><i class="fa fa-shopping-cart fa-md" style="margin-right:5px"></i>ADD TO CART</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="addtocart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center">
                <h3><b>Item added to your shopping cart!</b></h3>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5">
                            <img id="basepic" src="" style="position:absolute; width:170%; margin-left:-80px">
                            <img id="strappic" src="" style="z-index:10; position:relative; width:196%; margin-left:-80px">
                        </div>
                        <div class="col-xs-7">
                            <b><h5 id="flopname" style="margin-top:2rem">Blue Havaianas</h5></b>
                            <ul>
                                <li id="sizeModal">Size: 9</li>
                                <li id="baseModal">Base: Blue</li>
                                <li id="strapModal">Strap: Black</li>
                                <li id="tattooModal">Tattoo: None</li>
                            </ul>
                            <p id="quantityModal">Quantity: 2</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)"><i class="fa fa-arrow-circle-left fa-lg"></i> Continue shoping</button>
                    </div>
                    <div class="col-xs-6">
                        <a href="checkout" class="btn btn-primary" style="width:100%"><i class="fa fa-shopping-cart fa-lg"></i> Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
@section('pagescript')
    <script type="text/javascript" src="{{ URL::asset('assets/js/index.js') }}"></script>
@endsection
