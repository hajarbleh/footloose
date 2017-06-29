@extends('include.master')
@section('title', 'Make Your Own')
@section('body')
    @include('include.navbarwhite')
    <style>
        input[type="radio"] {
            display:none;
        }

        input[type="radio"] + label span {
            display:inline-block;
            width:30px;
            height:30px;
            margin:-1px 0px 0 0;
            vertical-align:middle;
            cursor:pointer;
            -moz-border-radius:  50%;
            border-radius:  50%;
        }

        input[type="radio"] + label span {
             background-color:#0f0;
             border:solid 3px #fff
        }

        input[type="radio"]:checked + label span{
             border:solid 3px #2a2a2a;
        }

    </style>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <div style="width:100%; min-height:20rem; overflow:hidden; color:#fff; background-color:#94d6de; padding:4rem 0 2rem 0">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <img id="basePreview" style="width:120%; position:absolute" />
                    <img id="strapPreview" style="width:130%; z-index: 10; position:relative" />
                </div>
                <div class="col-md-4">
                    <h3 style="margin-top:4rem"><b>Make Your Own</b></h3>
                        <h4 style="margin-bottom:0; line-height:1.3rem">Preview</h4>
                    <b>
                        <p style="margin-top:0.7rem" id="quantityPreview">Quantity: 1</p>
                    </b>
                </div>
            </div>
        </div>
    </div>  

    <div class="banner-container">
        <div id="carousel-example-generic" data-interval="false" class="carousel slide" data-ride="carousel" style="max-height:100vh;">
            <form action="/addtocart" method="POST" id="addtocart">
                {{csrf_field()}}
                <div class="carousel-inner" role="listbox">
                    <div id="category" class="carousel-item active">
                        <div class="slider-helper" style="height:10vh"></div>
                        <div class="col-sm-12" style="min-height:12rem; display: table; vertical-align: middle; text-align: center">
                            <p style="color:#ff6d6d;"><b>1. Choose Category</b></p>
                            <select id="listCategory" class="form-control form-control-sm" onchange="selectCategory(this)" style="margin: 0 auto; display: block; width: 15%; background-color:rgba(0, 0, 0, 0.075); border:none; margin-top:0.3rem">
                                <option selected disabled>Category</option>
                                @foreach($category as $c)
                                    <option value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>
                            <a class="btn btn-secondary btn-hav-w" style="color:#ff6d6d; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="next" id="nextCategory">Next</a>
                        </div>
                    </div>
                    <div id="size" class="carousel-item">
                        <div class="slider-helper" style="height:10vh"></div>
                         <div class="col-sm-12" style="min-height:12rem; display: table; vertical-align: middle; text-align: center">
                            <p style="color:#ff6d6d"><b>2. Choose your size</b></p>
                            <select id="listSize" class="form-control form-control-sm" onchange="selectSize(this)" style="margin: 0 auto; display: block; width: 15%; background-color:rgba(0, 0, 0, 0.075); border:none; margin-top:0.3rem" disabled>
                                <option selected disabled>Size</option>
                            </select>
                            <a class="btn btn-secondary btn-hav-w" href="#carousel-example-generic" style="color:#ff6d6d; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="prev" id="prevSize">Prev</a>
                            <a class="btn btn-secondary btn-hav-w" style="color:#ff6d6d; margin-left: 5px; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="next" id="nextSize">Next</a>
                        </div>
                    </div>
                    <div id="colorbase" class="carousel-item">
                        <div class="slider-helper" style="height:10vh"></div>
                        <div class="col-sm-12" style="min-height:12rem; display: table; vertical-align: middle; text-align: center">
                            <p style="color:#ff6d6d"><b>3. Select base color</b></p>
                            <div id="baseColor">
                                <span>
                                    <input type="radio" id="base04" name="basecol" />
                                    <label for="base04">
                                        <span style="background-color:#fff95e"></span>
                                    </label>
                                </span>
                            </div>
                            <a class="btn btn-secondary btn-hav-w" href="#carousel-example-generic" style="color:#ff6d6d; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="prev" id="prevBase">Prev</a>
                            <a class="btn btn-secondary btn-hav-w" style="color:#ff6d6d; margin-left: 5px; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="next" id="nextBase">Next</a>
                        </div>
                    </div>
                    <div id="colorstrap" class="carousel-item">
                        <div class="slider-helper" style="height:10vh"></div>
                        <div class="col-sm-12" style="min-height:12rem; display: table; vertical-align: middle; text-align: center">
                            <p style="color:#ff6d6d"><b>4. Select strap color</b></p>
                            <div id="strapColor">
                                <span>
                                    <input type="radio" id="strap04" name="strapcol" />
                                    <label for="strap04">
                                        <span style="background-color:#fff95e"></span>
                                    </label>
                                </span>
                            </div>
                            <a class="btn btn-secondary btn-hav-w" href="#carousel-example-generic" style="color:#ff6d6d; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="prev" id="prevStrap">Prev</a>
                            <a class="btn btn-secondary btn-hav-w" style="color:#ff6d6d; margin-left: 5px; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="next" id="nextStrap">Next</a>
                        </div>
                    </div>
                    <div id="tattoo" class="carousel-item">
                        <div class="slider-helper" style="height:10vh"></div>
                        <div class="col-sm-12" style="min-height:12rem; display: table; vertical-align: middle; text-align: center">
                            <p style="color:#ff6d6d"><b>5. Add Tattoo</b></p>
                            <p><i>Coming soon</i></p>
                            <a class="btn btn-secondary btn-hav-w" href="#carousel-example-generic" style="color:#ff6d6d; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="prev" id="prevTattoo">Prev</a>
                            <a class="btn btn-secondary btn-hav-w" href="#carousel-example-generic" style="color:#ff6d6d; margin-left: 5px; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="next" id="nextTattoo">Next</a>
                        </div>
                    </div>
                    <div id="quantity" class="carousel-item">
                        <div class="slider-helper" style="height:10vh"></div>
                        <div class="col-sm-12" style="min-height:12rem; display: table; vertical-align: middle; text-align: center">
                            <p style="color:#ff6d6d"><b>6. Quantity</b></p>
                            <div class="input-group input-group-sm" style="width:5rem; margin: 0 auto;">
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button" style="background-color:rgba(0, 0, 0, 0.1); border:none; height:2rem" onclick="updqty('-')">-</button>
                                </span>
                                <span class="input-group">
                                    <input type="text" class="form-control" id="qty" value="1" style="background-color:rgba(0, 0, 0, 0.075); border:none; width:5rem; height:2rem" disabled>
                                </span>
                                <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="button" style="background-color:rgba(0, 0, 0, 0.1); border:none; height:2rem" onclick="updqty('+')">+</button>
                                </span>
                            </div>
                            <a class="btn btn-secondary btn-hav-w" href="#carousel-example-generic" style="color:#ff6d6d; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" data-slide="prev" id="prevQuantity">Prev</a>
                            <button class="btn btn-secondary btn-hav-w" href="#carousel-example-generic" style="color:#ff6d6d; margin-left: 5px; margin-top: 20px; border-style:solid; border-width:1px 1px 1px 1px; border-color:#d8d6d6" type="submit" id="modaltrigger">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('pagescript')
    <script>
        function updqty(x){
            quantity = document.getElementById("qty");
            var baseStock = document.getElementsByName("basecol")[0].getAttribute('data-stock');
            var strapStock = document.getElementsByName("strapcol")[0].getAttribute('data-stock');
            if (x == "+" && quantity.value < Math.min(baseStock, strapStock)) {
                quantity.value ++;
                document.getElementById("quantityPreview").innerHTML = "Quantity: " + quantity.value;
            }
            else if (x == "-" && quantity.value > 1) {
                quantity.value --;
                document.getElementById("quantityPreview").innerHTML = "Quantity: " + quantity.value;
            }
        }

        function selectCategory(category) {
            $('#listSize').removeAttr('disabled');
            $("#listSize").empty();
            var appendOption = "";
            for(var i = 35; i < 41; i++) {
                appendOption += "<option value=" + i + ">" + i + "</option>";
            }
            $('#listSize').append(appendOption);

            var nextCat = document.getElementById("nextCategory");
            nextCat.href="#carousel-example-generic";
            var nextSize = document.getElementById("nextSize");
            nextSize.removeAttribute('href');
        }

        function selectSize(size) {
            var categoryID = $('#listCategory').val();
            $.ajax({
                type: 'GET',
                url: '/base/category/' + categoryID + '/size/' + size.value,
                dataType: 'JSON',
                success: function(message) {
                    $('#baseColor').empty();
                    var appendOption =  "";
                    if(message.data.length) {
                        for(var i = 0; i < message.data.length; i++) {
                            appendOption += "<span><input type='radio' data-stock='" + message.data[i].stock + "' data-picture='" + message.data[i].picture + "' data-name='" + message.data[i].name + "' value='" + message.data[i].id + "' id='base" + message.data[i].id + "' name='basecol' onclick='selectBase(this)'/><label for='base" + message.data[i].id + "'><span style='background-color:" + message.data[i].color + "'></span></label></span>"
                        }
                    }
                    else {
                        appendOption += "<i>Mohon maaf, stok base untuk ukuran ini sedang habis</i>"
                    }
                    $('#baseColor').append(appendOption);
                }
            });

            var nextSize = document.getElementById("nextSize");
            nextSize.href="#carousel-example-generic";
            var nextBase = document.getElementById("nextBase");
            nextBase.removeAttribute('href');
        }

        function selectBase(base) {
            var categoryID = $('#listCategory').val();
            var size = $('#listSize').val();
            var basePreview = document.getElementById("basePreview");
            basePreview.src= base.getAttribute('data-picture');
            var selectedName = base.getAttribute('data-name');
            var selectedID = base.id;
            document.getElementsByName("basecol")[0].dataset.name = selectedName;
            document.getElementsByName("basecol")[0].dataset.picture = base.getAttribute('data-picture');
            $.ajax({
                type: 'GET',
                url: '/strap/category/' + categoryID + '/size/' + size,
                dataType: 'JSON',
                success: function(message) {
                    $('#strapColor').removeAttr('disabled');
                    $('#strapColor').empty();
                    var appendOption =  "";
                    if(message.data.length) {
                        for(var i = 0; i < message.data.length; i++) {
                            appendOption += "<span><input type='radio' data-stock='" + message.data[i].stock + "' data-picture='" + message.data[i].picture + "' data-name='" + message.data[i].name + "' value='" + message.data[i].id + "' id='strap" + message.data[i].id + "' name='strapcol' onclick='selectStrap(this)'/><label for='strap" + message.data[i].id + "'><span style='background-color:" + message.data[i].color + "'></span></label></span>"
                        }
                    }
                    else {
                        appendOption += "<i>Mohon maaf, stok strap untuk ukuran ini sedang habis</i>"
                    }

                    $('#strapColor').append(appendOption);
                }
            });

            var nextBase = document.getElementById("nextBase");
            nextBase.href="#carousel-example-generic";
            var nextStrap = document.getElementById("nextStrap");
            nextStrap.removeAttribute('href');
        }

        function selectStrap(strap) {
            var strapPreview = document.getElementById("strapPreview");
            strapPreview.src= strap.getAttribute('data-picture');
            var selectedName = strap.getAttribute('data-name');
            document.getElementsByName("strapcol")[0].dataset.name = selectedName;
            document.getElementsByName("strapcol")[0].dataset.picture = strap.getAttribute('data-picture');
            var nextStrap = document.getElementById("nextStrap");
            nextStrap.href="#carousel-example-generic";
        }

        $(document).ready(function() {
            $('#addtocart').on('submit', function(e) {
                $.ajaxSetup({
                    headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
                })
                e.preventDefault(e);

                var size = $('#listSize').val();
                var categoryID = document.getElementById('listCategory').value;
                var baseID = $("input[name='basecol']:checked").val();
                var strapID = $("input[name='strapcol']:checked").val();
                var quantity = document.getElementById('qty').value;
                console.log(size + " " + categoryID + " " + baseID + " " + strapID + " " + quantity);
                $.ajax({
                    type: 'POST',
                    url: '/addtocart',
                    data : {size: size, categoryID: categoryID, baseID: baseID, strapID: strapID, quantity: quantity},
                    dataType: 'json',
                    success: function(message) {
                        document.getElementById("flopname").innerHTML = document.getElementsByName('basecol')[0].getAttribute('data-name') + " with " + document.getElementsByName('strapcol')[0].getAttribute('data-name');
                        document.getElementById("sizeModal").innerHTML = "Size : " + $('#listSize').val();
                        document.getElementById("baseModal").innerHTML = "Base : " + document.getElementsByName('basecol')[0].getAttribute('data-name');
                        document.getElementById("strapModal").innerHTML = "Strap : " + document.getElementsByName('strapcol')[0].getAttribute('data-name');
                        document.getElementById("tattooModal").innerHTML = "Tattoo : -";
                        document.getElementById("quantityModal").innerHTML = "Quantity : " + document.getElementById('qty').value;
                        $("#basepic").attr("src",document.getElementsByName('basecol')[0].getAttribute('data-picture'));
                        $("#strappic").attr("src",document.getElementsByName('strapcol')[0].getAttribute('data-picture'));
                        jQuery.noConflict();
                        $('#modal').modal('show');
                    }
                });
            });
            $('nav').css('background','#94d6de');

        });
    </script>
@endsection