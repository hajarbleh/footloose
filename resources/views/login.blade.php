<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">        
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/havaianas.css">
        <link rel="icon" href="assets/img/ui/favicon.png">
        <title>Footloose | My Data</title>
    </head>
    <body>
        
        <?php include "parts/navbar.php"; ?>
        
        
        <div style="width:100%; overflow:hidden; padding:3rem 0 5rem 0; margin-top:4rem">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 offset-sm-4">
                        <div class="card card-inverse" style="width:100%; background-color:#3a5bb8; min-height:13.5rem">
                            <div class="card-block">
                                <loginform>
                                    <h4 class="card-title" style="margin:0"><b><center>Login</center></b></h4>
                                    <div class="card-text">
                                        <p style="margin:0.5rem"><center>Welcome to Footloose!</center></p>
                                        <form>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Username/Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <button class="btn btn-secondary btn-hav-w" type="submit" style="width:100%">LOGIN</button>
                                            <p style="text-align:center; margin-top:2rem; margin-bottom:0">baru disini? <a id="signup" href="#!" style="color:white">Sign up</a></p>
                                        </form>
                                    </div>
                                </loginform>
                                <signupform>
                                    <h4 class="card-title" style="margin:0"><b><center>Sign Up</center></b></h4>
                                    <div class="card-text">
                                        <p style="margin:0.5rem"><center>Welcome to Footloose!</center></p>
                                        <form>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" placeholder="Password">
                                            </div>
                                            <button class="btn btn-secondary btn-hav-w" type="submit" style="width:100%">SIGN UP</button>
                                            <p style="text-align:center; margin-top:2rem; margin-bottom:0">Sudah punya akun? <a id="login" href="#!" style="color:white">Login</a></p>
                                        </form>
                                    </div>
                                </signupform>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <?php include "parts/footer.php"; ?>
    
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/tether.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#mobile-dropdown').hide();
                $('#mobile-dropdown-toggle').click(function(){
                    $('#mobile-dropdown').fadeToggle();
                });
                $('signupform').hide();
                $('#login').click(function(){
                    $('signupform').hide();
                    $('loginform').show();
                });
                $('#signup').click(function(){
                    $('loginform').hide();
                    $('signupform').show();
                });
                $(window).scroll(function() {
                    var x = $(window).scrollTop();
                    if (x <= 0) {
                        $('nav').css('background','transparent');
                    } else {
                        $('nav').css('background','#fff');
                    }
                });
            });
        </script>
    </body>
</html>