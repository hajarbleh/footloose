<form action="/admin/webdetail/update" method="post">
    {{csrf_field()}}
    <div class="col-sm-6">
        <label class="sr-only" for="inlineFormInputGroup">Email Address</label>
        <div class="input-group mb-1 mr-sm-1 mb-sm-0">
            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
            <input name="email" type="text" class="form-control" id="inlineFormInputGroup" value="{{$webDetail->email}}">
        </div>
    </div>
    <div class="col-sm-6">
        <label class="sr-only" for="inlineFormInputGroup">Instagram Account</label>
        <div class="input-group mb-1 mr-sm-1 mb-sm-0">
            <div class="input-group-addon"><i class="fa fa-instagram"></i></div>
            <input name="instagram" type="text" class="form-control" id="inlineFormInputGroup" value="{{$webDetail->instagram}}">
        </div>
    </div>
    <div class="col-sm-6">
        <label class="sr-only" for="inlineFormInputGroup">Twitter Account</label>
        <div class="input-group mb-1 mr-sm-1 mb-sm-0">
            <div class="input-group-addon"><i class="fa fa-twitter"></i></div>
            <input name="twitter" type="text" class="form-control" id="inlineFormInputGroup" value="{{$webDetail->twitter}}">
        </div>
    </div>
    <div class="col-sm-6">
        <label class="sr-only" for="inlineFormInputGroup">LINE@ Account</label>
        <div class="input-group mb-1 mr-sm-1 mb-sm-0">
            <div class="input-group-addon">@</div>
            <input name="line" type="text" class="form-control" id="inlineFormInputGroup" value="{{$webDetail->line}}">
        </div>
    </div>
    <div class="col-sm-6">
        <label class="sr-only" for="inlineFormInputGroup">Facebook Account</label>
        <div class="input-group mb-1 mr-sm-1 mb-sm-0">
            <div class="input-group-addon"><i class="fa fa-facebook fa-lg"></i></div>
            <input name="facebook" type="text" class="form-control" id="inlineFormInputGroup" value="{{$webDetail->facebook}}">
        </div>
    </div>
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary" style="width:100%">Update</button>
    </div>
</form>