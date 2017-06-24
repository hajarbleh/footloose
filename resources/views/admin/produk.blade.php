<div class="row">
    <H4><b>BASE</b></H4>
    <div class="col-sm-12">
        <a href="#newBase" id="addBase" class="btn btn-primary btn-bg" style="margin-bottom:1rem; color:#FFFFFF" data-toggle="modal">+ Tambahkan Base</a> <br>
    </div>
    @if($base->count())
        @foreach($base as $b)
            <div class="col-sm-5ths col-xs-6">
                <div class="card" style="max-height:330px; min-height:330px; flex-wrap:flex">
                    <img class="card-img-top" src="{{$b->picture}}" style="width:100%" alt="Card image cap">
                    <div class="card-block" id="baseCell">
                        <b class="card-title">ID: {{$b->id}}</b>
                        <p class="card-text">
                            <b>Nama: {{$b->name}}</b><br>
                            Color: <i class="fa fa-circle large" style="color:{{$b->color}}; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black"></i><br>
                            Size: {{$b->size}}<br>
                            Category: {{$b->category}}<br>
                            Stock: {{$b->stock}}<br>
                        </p>
                           <a href="#!" class="btn btn-outline-primary btn-sm" id="{{$b->id}}" data-toggle="modal" data-target="#editBase" style="position: absolute; bottom: 0; margin-bottom:10px">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

<hr>
<div class="row">
    <H4><b>STRAP</b></H4>
    <div class="col-sm-12">
        <a href="#newStrap" id="addStrap" class="btn btn-primary btn-bg" style="margin-bottom:1rem; color:#FFFFFF" data-toggle="modal">+ Tambahkan Strap</a> <br>
    </div>
    @if($strap->count())
        @foreach($strap as $s)
            <div class="col-sm-5ths col-xs-6">
                <div class="card"style="max-height:330px; min-height:330px; flex-wrap:flex">
                    <img class="card-img-top" src="{{$s->picture}}" style="width:100%" alt="Card image cap">
                    <div class="card-block" id="strapCell">
                        <b class="card-title">ID: {{$s->id}}</b>
                        <p class="card-text">
                            <b>Nama: {{$s->name}}</b><br>
                            Color: <i class="fa fa-circle large" style="color:{{$s->color}}; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black"></i><br>
                            Size: {{$s->size}}<br>
                            Category: {{$s->category}}<br>
                            Stock: {{$s->stock}}<br>
                        </p>
                            <a href="#!" class="btn btn-outline-primary btn-sm" id="{{$s->id}}" data-toggle="modal" data-target="#editStrap" style="position: absolute; bottom: 0; margin-bottom:10px">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<hr>
<div class="row">
    <H4><b>TATTOO</b></H4>
    <div class="col-sm-12">
        <a href="#newTattoo" id="addTattoo" class="btn btn-primary btn-bg" style="margin-bottom:1rem; color:#FFFFFF" data-toggle="modal">+ Tambahkan Tattoo</a> <br>
    </div>
    @if($tattoo->count())
        @foreach($tattoo as $t)
            <div class="col-sm-5ths col-xs-6">
                <div class="card" style="max-height:330px; min-height:330px; flex-wrap:flex">
                    <img class="card-img-top" src="{{$t->picture}}" style="width:100%" alt="Card image cap">
                    <div class="card-block" id="tattooCell">
                        <b class="card-title">ID: {{$t->id}}</b>
                        <p class="card-text">
                            <b>Nama: {{$t->name}}</b><br>
                            Color: <i class="fa fa-circle large" style="color:{{$t->color}}; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black"></i><br>
                            Category: {{$t->category}}<br>
                            Stock: {{$t->stock}}<br>
                        </p>
                        <a href="#!" class="btn btn-outline-primary btn-sm" id="{{$t->id}}" data-toggle="modal" data-target="#editTattoo" style="position: absolute; bottom: 0; margin-bottom:10px">Edit</a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>

<div class="modal fade" id="newBase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center">
                <h4 class="modal-title"><center><b>New Base</b></center></h4>
            </div>
            <div id="newBase">
                <form action="/admin/product/base/add" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Nama</label>
                                    <input name="name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <datalist id="greyscale">
                                        <option value="#000000">
                                        <option value="#ff0000">
                                        <option value="#0000ff">
                                        <option value="#008000">
                                        <option value="#ffc0cb">
                                        <option value="#800080">
                                        <option value="#ffffff">
                                    </datalist>
                                    <fieldset class="col">
                                        <label for="excolor2">Warna</label>
                                        <input type="color" id="excolor2" name="color" list="greyscale" style="width:100%; height:37px" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Size</label>
                                    <input name="size" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label><br>
                                    <select class="btn btn-sm dropdown-toggle transaksi" name="category" id="dropdownMenuButton" style="width:100%">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($category->count())
                                                @foreach($category as $c)
                                                    <option class="dropdown-item" value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            @endif
                                        </div>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Stok</label>
                                    <input name="stock" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Gambar</label>
                                    <input name="picture" type="file" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newStrap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center">
                <h4 class="modal-title"><center><b>New Strap</b></center></h4>
            </div>
            <div id="newStrap">
                <form action="/admin/product/strap/add" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Nama</label>
                                    <input name="name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <datalist id="greyscale">
                                        <option value="#000000">
                                        <option value="#ff0000">
                                        <option value="#0000ff">
                                        <option value="#008000">
                                        <option value="#ffc0cb">
                                        <option value="#800080">
                                        <option value="#ffffff">
                                    </datalist>
                                    <fieldset class="col">
                                        <label for="excolor2">Warna</label>
                                        <input type="color" id="excolor2" name="color" list="greyscale" style="width:100%; height:37px" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Size</label>
                                    <input name="size" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label>
                                    <!--<input name="category" type="text" class="form-control">-->
                                    <select class="btn btn-sm dropdown-toggle transaksi" name="category" id="dropdownMenuButton" style="width:100%">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($category->count())
                                                @foreach($category as $c)
                                                    <option class="dropdown-item" value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            @endif
                                        </div>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Stok</label>
                                    <input name="stock" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Gambar</label>
                                    <input name="picture" type="file" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="newTattoo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center">
                <h4 class="modal-title"><center><b>New Tattoo</b></center></h4>
            </div>
            <div id="newTattoo">
                <form action="/admin/product/tattoo/add" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Nama</label>
                                    <input name="name" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <datalist id="greyscale">
                                        <option value="#000000">
                                        <option value="#ff0000">
                                        <option value="#0000ff">
                                        <option value="#008000">
                                        <option value="#ffc0cb">
                                        <option value="#800080">
                                        <option value="#ffffff">
                                    </datalist>
                                    <fieldset class="col">
                                        <label for="excolor2">Warna</label>
                                        <input type="color" id="excolor2" name="color" list="greyscale" style="width:100%; height:37px" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label>
                                    <!--<input name="category" type="text" class="form-control">-->
                                    <select class="btn btn-sm dropdown-toggle transaksi" name="category" id="dropdownMenuButton" style="width:100%">
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            @if($category->count())
                                                @foreach($category as $c)
                                                    <option class="dropdown-item" value="{{$c->id}}">{{$c->name}}</option>
                                                @endforeach
                                            @endif
                                        </div>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-control-label">Stok</label>
                                    <input name="stock" type="number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Gambar</label>
                                    <input name="picture" type="file" class="form-control" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                            </div>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editBase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><center><b>Edit Base</b></center></h4>
            </div>
            <form method="POST" id="form-update-base" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Nama</label>
                                    <input name="name" type="text" class="form-control" value="Free flop green base" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <datalist id="greyscale">
                                        <option value="#000000">
                                        <option value="#ff0000">
                                        <option value="#0000ff">
                                        <option value="#008000">
                                        <option value="#ffc0cb">
                                        <option value="#800080">
                                        <option value="#ffffff">
                                    </datalist>
                                    <fieldset class="col">
                                        <label for="excolor2">Warna</label>
                                        <input type="color" id="excolor2" name="color" list="greyscale" style="width:100%; height:37px" value="#00FF00" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Size</label>
                                    <input name="size" type="number" class="form-control" value="36" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label><br>
                                    <input name="category" type="text" class="form-control" value="Men" disabled required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Stok</label>
                                    <input name="stock" type="number" class="form-control" value="60" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input name="picture" type="file" id="file" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editStrap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><center><b>Edit Strap</b></center></h4>
            </div>
            <form method="POST" id="form-update-strap" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Nama</label>
                                    <input name="name" type="text" class="form-control" value="Free flop green base" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <datalist id="greyscale">
                                        <option value="#000000">
                                        <option value="#ff0000">
                                        <option value="#0000ff">
                                        <option value="#008000">
                                        <option value="#ffc0cb">
                                        <option value="#800080">
                                        <option value="#ffffff">
                                    </datalist>
                                    <fieldset class="col">
                                        <label for="excolor2">Warna</label>
                                        <input type="color" id="excolor2" name="color" list="greyscale" style="width:100%; height:37px" value="#00FF00" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Size</label>
                                    <input name="size" type="text" class="form-control" value="36" required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label><br>
                                    <input name="category" type="text" class="form-control" value="Men" disabled required>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="form-control-label">Stok</label>
                                    <input name="stock" type="number" class="form-control" value="60" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Gambar</label>
                                    <input name="picture" type="file" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="editTattoo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><center><b>Edit Tattoo</b></center></h4>
            </div>
            <form method="POST" id="form-update-tattoo" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Nama</label>
                                    <input name="name" type="text" class="form-control" value="Papa" required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <datalist id="greyscale">
                                        <option value="#000000">
                                        <option value="#ff0000">
                                        <option value="#0000ff">
                                        <option value="#008000">
                                        <option value="#ffc0cb">
                                        <option value="#800080">
                                        <option value="#ffffff">
                                    </datalist>
                                    <fieldset class="col">
                                        <label for="excolor2">Warna</label>
                                        <input type="color" id="excolor2" name="color" list="greyscale" style="width:100%; height:37px" value="#FFFFFF" required>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label>
                                    <input name="category" type="text" class="form-control" value="Men" disabled required>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-control-label">Stok</label>
                                    <input name="stock" type="number" class="form-control" value="60" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Gambar</label>
                                    <input name="picture" type="file" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-sm-6">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:100%; border:none; background-color:(0,0,0,0.075)">Cancel</button>
                        </div>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-primary" style="width:100%">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $(".btn-primary").on("click",function(){
            switch(this.id) {
                case "addBase":
                    $("input[name*='name']").val("");
                    $("input[name*='color']").val("#000000");
                    $("input[name*='size']").val(0);
                    $("input[name*='stock']").val(0);
                    break;

                case "addStrap":
                    $("input[name*='name']").val("");
                    $("input[name*='color']").val("#000000");
                    $("input[name*='size']").val(0);
                    $("input[name*='stock']").val(0);
                    break;

                case "addTattoo":
                    $("input[name*='name']").val("");
                    $("input[name*='color']").val("#000000");
                    $("input[name*='stock']").val(0);
                    break;

                case "addCoupon":
                    $("input[name*='name']").val("");
                    $("input[name*='code']").val("");
                    $("input[name*='discount']").val(0);
                    $("input[name*='start_date']").val("");
                    $("input[name*='expired_date']").val("");
                    break;

            }
        });
    });
</script>