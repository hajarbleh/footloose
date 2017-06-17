@extends('include.master')
@section('title', 'Home')
@section('body')
    @include('include.navbar')
    
     <div style="width:100%; min-height:20rem; overflow:hidden; color:black; background-color:lightgrey; text-align:left; padding:3rem 0 3rem 0">
        <div class="faq-content" style="margin-top:50px; margin-left:170px">
            <h2><b>FAQ</b></h2>
            <div id="faq">
                    {!! $FAQ->body !!}
            </div>
        </div>
    </div>

@endsection
        
@section('pagescript')
    <script>
        $(document).ready(function() {
            $('nav').css('background','transparent');
            $(window).scroll(function() {
                var x = $(window).scrollTop();
                if (x <= 0) {
                    $('nav').css('background','transparent');
                } else {
                    $('nav').css('background','#fff');
                }
            });

            var jumboHeight = $('.slider-helper').outerHeight();
            function parallax(){
                var scrolled = $(window).scrollTop();
                $('.slider-bg').css('height', (jumboHeight+scrolled) + 'px');
            }
            parallax();
            $(window).scroll(function(e){
                parallax();
            });
        });
    </script>
@endsection
