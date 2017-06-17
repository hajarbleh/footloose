@extends('include.master')
@section('title', 'Login')
@section('body')
    @include('include.navbar')    
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
                                    <form action="/login" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Email">
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
                                    <form action="/register" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password_confirmation" class="form-control" placeholder="Re-enter password">
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
@endsection
        
@section('pagescript')
    <script>
        $(document).ready(function() {
            $('signupform').hide();
            $('#login').click(function(){
                $('signupform').hide();
                $('loginform').show();
            });
            $('#signup').click(function(){
                $('loginform').hide();
                $('signupform').show();
            });
        });
    </script>
@endsection