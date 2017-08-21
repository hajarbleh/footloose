@if($category->count())
<table id="categoryTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead><tr><th>Nama Kategori</th><th>Status</th><th>Action</th></tr></thead>
    <tbody>
        @foreach($category as $c)
        <tr>
            <td>{{ $c->name }}</td>
            @if($c->is_enabled == 1)
            <td class="text-success">Enabled</td>
            <form action="/admin/category/togglestatus/{{$c->id}}" method="POST">
                {{csrf_field()}}
                <td id="categoryCell">
                    <a href="#editKategori" class="btn btn-outline-primary btn-sm" id="{{$c->id}}" data-toggle="modal">Edit</a>
                    <button type="submit" class="btn btn-outline-danger btn-sm">Disable</button>
                </td>
            </form>
            @else
            <td class="text-danger"><b>Disabled</b></td>
            <form action="/admin/category/togglestatus/{{$c->id}}" method="POST">
                    {{csrf_field()}}
                <td id="categoryCell">
                    <a href="#editKategori" class="btn btn-outline-primary btn-sm" id="{{$c->id}}" data-toggle="modal">Edit</a>
                    <button type="submit" class="btn btn-outline-success btn-sm">Enable</button>
                </td>
            </form>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>


<div class="modal fade" id="editKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="categoryEditModalTitle"><center><b>Edit Kategori - </b></center></h4>
            </div>
            <form method="POST" id="form-update-category">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="message-text" class="form-control-label">Nama Kategori</label>
                                <input name="name" type="text" class="form-control" value="{{$c->name}}" required>
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
@else
<div class="alert alert-warning">
        <i class="fa fa-exclamation-triangle"></i> No Categories
</div>
@endif

<script type="text/javascript" src="{{ URL::asset('assets/js/admin/kategori.js') }}"></script>