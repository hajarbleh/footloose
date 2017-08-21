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
    <script type="text/javascript" src="{{ URL::asset('assets/js/faq.js') }}"></script>
@endsection
