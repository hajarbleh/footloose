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
        @yield('pagecss')
        <script src="assets/js/jquery-3.1.1.min.js"></script>
        <script src="assets/js/tether.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <title>Footloose | @yield('title')</title>
    </head>
    <body>
        <div id="spinner" style="position:fixed; width:100%; z-index:30; height:100%; background-color:#fff; text-align:center; padding-top:calc(50vh - 2rem)">
            <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
            <span class="sr-only">Loading...</span>
        </div>
        @yield('body')
        
        @include('include.footer')

        @yield('pagescript')
        <script>
            $(document).ready(function(){
                $('#spinner').hide();
            });
        </script>
    </body>
</html>