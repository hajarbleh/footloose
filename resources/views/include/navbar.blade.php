<nav class="navbar navbar-fixed-top navbar-light bg-faded" style="background-color:transparent; transition:0.2s">
    <div class="container">
        <button id="mobile-dropdown-toggle" class="hidden-lg-up pull-right" type="button" style="border:none; background:transparent;"> <i class="fa fa-bars fa-2x"></i></button>        
        <a class="navbar-brand" href="{{url('/')}}">
            <img id="logo" src="assets/img/ui/logoblack.png" style="height:2rem; margin-right:0.5rem"> <b>FootLoose</b>
        </a><br id="navbarHack">
        <div class="collapse navbar-toggleable-md" id="navbarResponsive">
            <ul class="nav navbar-nav float-sm-right">
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/makeyourown')}}"><b>Make Your Own</b></a>
                </li>
                    @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#!" id="nav-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                            <div class="dropdown-menu" aria-labelledby="nav-2">
                                <a class="dropdown-item" href="{{url('/myprofile')}}">Profile</a>
                                <hr style="margin:0.5rem 0 0.5rem 0">
                                <form action="/logout" method="POST">
                                    {{csrf_field()}}
                                    <button type="submit" class="dropdown-item">Logout</a>
                                </form>
                            </div>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('/login')}}"><i class="fa fa-user fa-lg"></i></a>
                        </li>
                    @endif
                <li class="nav-item">
                    <a class="nav-link" href="{{url('/checkout')}}"><i class="fa fa-shopping-cart fa-lg"></i></a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>

<div id="mobile-dropdown" class="hidden-lg-up">
    <div style="height:3.3rem; background-color:#fff; width:100%; margin-bottom:1rem">
    </div>
    <div class="container">
        <a style="color:#fff" href="{{url('/mskeyourown')}}"><b>Make Your Own</b></a><br>
        <hr style="border-color:grey">
        <a style="color:#fff" href="{{url('/myprofile')}}"><b>My Account</b></a>
        <hr style="border-color:grey">
        <a style="color:#fff" href="{{url('/checkout')}}"><b>Checkout</b></a>
    </div>
</div>

<script>
    $(document).ready(function(){

        $('#mobile-dropdown').hide();
        $('#mobile-dropdown-toggle').click(function(){
            $('#mobile-dropdown').fadeToggle();
        });
        $('nav').css('background','#fff');

    });
</script>