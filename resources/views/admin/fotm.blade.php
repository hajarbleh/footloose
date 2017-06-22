<div class="row">
    @foreach($ffotm as $john)
        <div class="col-sm-4 col-xs-6">
            <label>Flipflop of the month #{{$john->id}}</label>
            <form action="/admin/ffotm/update/{{$john->id}}" method="POST">
                {{csrf_field()}}
                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                    <div class="input-group-addon">Base ID</div>
                    <input name="base_id" type="text" class="form-control" value="{{$john->base_id}}" required>
                </div>
                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                    <div class="input-group-addon">Strap ID</div>
                    <input name="strap_id" type="text" class="form-control" value="{{$john->strap_id}}" required>
                </div>
                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                    <div class="input-group-addon">Tattoo ID</div>
                    <input name="tattoo_id" type="text" class="form-control" value="{{$john->tattoo_id}}">
                </div>
                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                    <div class="input-group-addon">Category</div>
                    <select class="btn btn-sm dropdown-toggle transaksi" name="category_id" id="dropdownMenuButton" style="width:100%; height:37px; border-style:solid; border-width: 1px 1px 1px 1px; border-color:#D3D3D3;">
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if($category->count())
                                @foreach($category as $c)
                                    <option class="dropdown-item" value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            @endif
                        </div>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%">Update</button>
            </form>
        </div>
    @endforeach
</div>