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
                                <img src="assets/img/custom/base/cblue.png" style="width:100%">
                            </div>
                            <div class="col-xs-7">
                                <h5 style="margin-top:2rem"><b>Blue Havaianas</b></h5>
                                <ul>
                                    <li>Size: 9</li>
                                    <li>Base: Blue</li>
                                    <li>Strap: Black</li>
                                    <li>Acc: None</li>
                                </ul>
                                <p>Quantity: 2</p>
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

    <div style="width:100%; min-height:20rem; overflow:hidden; color:#fff; background-color:#ff6d6d; padding:4rem 0 2rem 0">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-2">
                    <img src="assets/img/custom/base/cblue.png" style="width:90%">
                </div>
                <div class="col-md-4">
                    <h3 style="margin-top:4rem"><b>Make Your Own</b></h3>
                        <p style="margin-bottom:0; line-height:1.3rem">Women, 7/8 Slim, caprisea blue base, yellow strap, no pins.</p>
                    <b>
                        <p style="margin-top:0.7rem">Quantity: 1</p>
                    </b>
                    <h2 style="color:#fff"><b>Rp 150.000</b></h2>
                    <a class="btn btn-secondary btn-hav-w" href="#!" role="button" style="margin-top:0.7rem" id="modaltrigger"><b style="color:#ff6d6d"><i class="fa fa-shopping-cart fa-md"></i> ADD TO CART</b></a>
                </div>
            </div>
        </div>
    </div>  

    <div style="width:100%; overflow:hidden; color:#373a3c; background-color:#fff; padding:1rem 0 1rem 0">

        <div class="container">
            <div class="row">

                <div class="col-sm-5ths col-xs-12" style="height:9rem">
                    <p style="color:#ff6d6d"><b>1. Choose your size</b></p>
                    <select class="form-control form-control-sm" style="background-color:rgba(0, 0, 0, 0.075); border:none; margin-top:0.3rem">
                        <option selected disabled>Size</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                    </select>
                </div>

                <div class="col-sm-5ths col-xs-6" style="border-left:solid 1px rgba(255, 109, 109, 0.55); height:9rem">
                    <p style="color:#ff6d6d"><b>2. Select base color</b></p>
                    <span>
                        <input type="radio" id="base01" name="basecol" />
                        <label for="base01">
                            <span style="background-color:#dbc9c9"></span>
                        </label>
                    </span>

                    <span>
                        <input type="radio" id="base02" name="basecol" />
                        <label for="base02">
                            <span style="background-color:#d08a8a"></span>
                        </label>
                    </span>

                    <span>
                        <input type="radio" id="base03" name="basecol" />
                        <label for="base03">
                            <span style="background-color:#45c7a4"></span>
                        </label>
                    </span>

                    <span>
                        <input type="radio" id="base04" name="basecol" />
                        <label for="base04">
                            <span style="background-color:#fff95e"></span>
                        </label>
                    </span>
                </div>

                <div class="col-sm-5ths col-xs-6" style="border-left:solid 1px rgba(255, 109, 109, 0.55); height:9rem">
                    <p style="color:#ff6d6d"><b>3. Select strap color</b></p>
                    <span>
                        <input type="radio" id="strap01" name="strapcol" />
                        <label for="strap01">
                            <span style="background-color:#dbc9c9"></span>
                        </label>
                    </span>

                    <span>
                        <input type="radio" id="strap02" name="strapcol" />
                        <label for="strap02">
                            <span style="background-color:#d08a8a"></span>
                        </label>
                    </span>

                    <span>
                        <input type="radio" id="strap03" name="strapcol" />
                        <label for="strap03">
                            <span style="background-color:#45c7a4"></span>
                        </label>
                    </span>

                    <span>
                        <input type="radio" id="strap04" name="strapcol" />
                        <label for="strap04">
                            <span style="background-color:#fff95e"></span>
                        </label>
                    </span>
                </div>

                <div class="col-sm-5ths col-xs-6" style="border-left:solid 1px rgba(255, 109, 109, 0.55); height:9rem">
                    <p style="color:#ff6d6d"><b>4. Add Tattoo</b></p>
                    <select class="form-control form-control-sm" style="background-color:rgba(0, 0, 0, 0.075); border:none">
                        <option selected disabled>Location</option>
                        <option>Location 1</option>
                        <option>Location 2</option>
                    </select>
                    <select class="form-control form-control-sm" style="margin-top:0.3rem; background-color:rgba(0, 0, 0, 0.075); border:none">
                        <option selected disabled>Accessories</option>
                        <option>Acc 1</option>
                        <option>Acc 2</option>
                        <option>Acc 3</option>
                        <option>Acc 4</option>
                        <option>Acc 5</option>
                    </select>
                </div>

                <div class="col-sm-5ths col-xs-6" style="border-left:solid 1px rgba(255, 109, 109, 0.55); height:9rem">
                    <p style="color:#ff6d6d"><b>5. Quantity</b></p>
                    <div class="input-group input-group-sm" style="width:5rem">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button" style="background-color:rgba(0, 0, 0, 0.1); border:none" onclick="qty('-')">-</button>
                        </span>
                        <input type="text" class="form-control" id="qty" value="1" style="background-color:rgba(0, 0, 0, 0.075); border:none" disabled>
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button" style="background-color:rgba(0, 0, 0, 0.1); border:none" onclick="qty('+')">+</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pagescript')
    <script>
        function qty(x){
            quantity = document.getElementById("qty");
            if (x == "+" ) quantity.value ++;
            else if (x == "-") quantity.value --;
        }

        $(document).ready(function() {
            $('#modaltrigger').click(function() {
                $('#modal').modal();
            });
             $('nav').css('background','#ff6d6d');
        });
    </script>
@endsection