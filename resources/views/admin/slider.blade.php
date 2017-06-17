<a href="#newSlider" id="addSlider" class="btn btn-primary btn-bg" style="margin-bottom:1rem" data-toggle="modal">+ Tambahkan Slider</a>
@if($slider->count())
    <div class="row">
        @foreach($slider as $s)
        <div class="col-sm-4 col-xs-6">
            <h5><label>Slider ID: {{$s->id}}</label></h5>
            <form action="/admin/slider/update/{{$s->id}}" method="POST">
                {{csrf_field()}}
                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                    <div style="overflow:hidden; height:200px">
                        <img src="{{$s->photo}}" style="width:100%"/>
                    </div>
                    <label>Title :</label> <br>
                    <input name="title" type="text" class="form-control" value="{{$s->title}}"><br>
                    <label>Body :</label> <br>
                    <input name="body" type="text" class="form-control" value="{{$s->body}}"><br>
                    <label>Link :</label><br>
                    <input name="link" type="text" class="form-control" value="{{$s->link}}">  <br>               <label>Photo :</label><br>
                    <input name="photo" type="file" class="form-control">
                </div>
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-outline-primary" style="width:100%">Update</button>
                </div>
            </form>
            <form action="/admin/slider/delete/{{$s->id}}" method="POST">
                {{csrf_field()}}
                <div class="col-sm-6">
                    <button type="" class="btn btn-outline-danger" style="width:100%">Delete</button>
                </div>
            </form>
        </div>
        @endforeach
    </div>
@endif

<div class="modal fade" id="newSlider" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="text-align:center">
                <h4 class="modal-title"><center><b>New Slider</b></center></h4>
            </div>
            <div id="newSlider">
                <form action="/admin/slider/add" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Judul</label>
                                    <input name="title" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message-text" class="form-control-label">Isi</label>
                                    <input name="body" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Link</label>
                                    <input name="link" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-control-label">Gambar</label>
                                    <input name="picture" type="file" class="form-control">
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