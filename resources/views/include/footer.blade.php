<div style="width:100%; overflow:hidden; padding:3rem 0 3rem 0; background-color:rgba(0,0,0,0.1)">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-xs-12" style="text-align:center">
                <h5><b>Where you can find us.</b></h5>
                <div class="col-sm-12 col-xs-12">
                    <p style="margin-bottom:2rem">check our faq or give us a shout, we're happy to help!</p>
                </div>
                <div class="col-sm-3 col-xs-6">
                    @if(!($webDetail->email))
                    <i class="fa fa-envelope fa-2x"></i><br>-<br>
                    @else
                    <i class="fa fa-envelope fa-2x"></i><br>{{$webDetail->email}}<br>
                    @endif
                </div>    
                <div class="col-sm-2 col-xs-6">
                    @if(!($webDetail->phone))
                    <i class="fa fa-phone fa-2x"></i><br>-
                    @else
                    <i class="fa fa-phone fa-2x"></i><br>{{$webDetail->phone}}
                    @endif
                </div>
                <div class="col-sm-2 col-xs-6">
                    <a href="/faq"><i style="color:#2a2a2a" class="fa fa-question-circle fa-2x"></i><br><p style="color:#2a2a2a">FAQ</p><br></a>
                </div>
                <div class="col-sm-2 col-xs-6">
                    @if(!($webDetail->whatsapp))
                    <i class="fa fa-whatsapp fa-2x"></i><br>-
                    @else
                    <i class="fa fa-whatsapp fa-2x"></i><br>{{$webDetail->whatsapp}}
                    @endif
                </div>
                <div class="col-sm-3 col-xs-6">
                    @if(!($webDetail->line))
                    <label style="font-size:20; margin-top:3px; margin-bottom:-1px"><b>LINE@</b></label><br>-
                    @else
                    <label><b>LINE@</b></label><br>{{$webDetail->line}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div style="width:100%; overflow:hidden; background-color:#2a2a2a; color:white;">
    <center>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-xs-12" style="padding:3rem 0 3rem 0; text-align:center">
                    <h5><b>Keep in touch</b></h5>
                    <a href="https://www.facebook.com/{{$webDetail->facebook}}"><i style="color:white" class="fa fa-facebook-square fa-3x"></i></a>
                    <a href="https://www.twitter.com/{{$webDetail->twitter}}"><i style="color:white" class="fa fa-twitter-square fa-3x"></i></a>
                    <a href="https://www.instagram.com/{{$webDetail->instagram}}"><i style="color:white" class="fa fa-instagram fa-3x"></i></a>
                </div>
                
            </div>
        </div>
    </center>
</div>