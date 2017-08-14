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
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('msg'))
                                <div class="alert alert-warning">
                                    {{ Session::get('msg') }}
                                </div>
                            @endif
                            @if (Session::has('registrationStatus'))
                                <div class="alert alert-info" role="alert">
                                    {{ Session::get('registrationStatus') }}
                                </div>
                            @endif
                            @if (Session::has('registrationSuccess'))
                                <div class="alert alert-success">
                                    {{ Session::get('registrationSuccess') }}
                                </div>
                            @endif
                            <loginform>
                                <h4 class="card-title" style="margin:0"><b><center>Login</center></b></h4>
                                <div class="card-text">
                                    <p style="margin:0.5rem"><center>Welcome to Footloose!</center></p>
                                    <form action="/login" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <input name="email" type="text" class="form-control" placeholder="Email*" required>
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control" placeholder="Password*" required>
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
                                            <input title="Email" type="email" name="email" class="form-control" placeholder="Email*" required>
                                        </div>
                                        <div class="form-group">
                                            <input title="Password" type="password" name="password" class="form-control" placeholder="Password*" required>
                                        </div>
                                        <div class="form-group">
                                            <input title="Re-enter password" type="password" name="password_confirmation" class="form-control" placeholder="Re-enter password*" required>
                                        </div>
                                        <div class="form-group">
                                            <input title="Name" type="text" name="name" class="form-control" placeholder="Name*" required>
                                        </div>
                                        <div class="form-group">
                                            <input title="Birthday" name="birthday" class="form-control" placeholder="Birthday*" onfocus="(this.type='date')" required>
                                        </div>
                                        <div class="form-group">
                                            <input title="Phone" type="text" name="phone" class="form-control" placeholder="Phone*" required>
                                        </div>
                                        <div class="form-group">
                                            <input title="Line ID" type="text" name="line" class="form-control" placeholder="Line ID">
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