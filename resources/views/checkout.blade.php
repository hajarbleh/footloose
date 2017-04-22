<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.css">
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
        <link rel="stylesheet" href="assets/css/havaianas.css">
        <link rel="icon" href="assets/img/ui/favicon.png">
        <title>Footloose | My Data</title>
    </head>
    <body>
        
        <?php include "parts/navbar.php"; ?>

        <div style="width:100%; overflow:hidden; padding:5rem 0 0 0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <h2><i class="fa fa-shopping-cart fa-lg"></i> <b>Shopping Cart</b></h2>
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
                                <a href="#!" class="btn btn-primary" style="width:100%" onclick="alert('New data sucessfully saved')"><i class="fa fa-shopping-cart fa-lg"></i> Save</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div style="width:100%; overflow:hidden; margin-top:2rem; margin-bottom:1rem; padding:1rem 0 1rem 0; background-color:rgba(0,0,0,0.03")>
            <div class="container">
                <div class="row" style="margin-bottom:1rem">
                    <div class="col-xs-5">
                        <b>Items</b>
                    </div>
                    <div class="col-xs-2">
                        <b>Price</b>
                    </div>
                    <div class="col-xs-2">
                        <b>Quantity</b>
                    </div>
                    <div class="col-xs-3">
                        <b>Subtotal</b>
                    </div>
                </div>
                <?php for ($i=1;$i<=2;$i++){ ?>
                <div class="row" style="margin-bottom:1rem">
                    <div class="col-xs-2">
                        <img src="assets/img/product/c1p1/col1/thumb/1.jpg" style="width:100%">
                    </div>
                    <div class="col-xs-3">
                        <b>Nama Produk</b><br>
                        <b>Warna</b>
                        <p>Detil</p>
                    </div>
                    <div class="col-xs-2">
                        Rp 120.000
                    </div>
                    <div class="col-xs-2">
                        QTY
                    </div>
                    <div class="col-xs-2">
                        Rp 240.000
                    </div>
                    <div class="col-xs-1">
                        x
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
        
        <div class="container" style="margin-bottom:3rem">
            <div class="row">
                <div class="col-xs-2 offset-xs-7">
                    Ongkos Kirim<br>
                    Subtotal
                </div>
                <div class="col-xs-3">
                    <b>Rp 40.000</b><br>
                    <b>Rp 480.000</b>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 offset-xs-9">
                    <btn class="btn btn-secondary btn-hav-w" role="button" style="margin-top:1.3rem; background-color:#3a5bb8"><b style="color:#fff"><i class="fa fa-shopping-cart fa-lg"></i> CHECKOUT</b></btn>
                </div>
            </div>
        </div>
        
        <?php include "parts/footer.php"; ?>
        

        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/tether.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
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
    </body>
</html>