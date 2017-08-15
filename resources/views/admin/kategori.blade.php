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

<script type="text/javascript">
    $(document).ready(function(){
        $(".btn-outline-primary").on("click",function(){
            switch(this.parentElement.id) {
                case "categoryCell":
                    $.ajax({
                        type: 'GET',
                        url: '/admin/category/' + this.id,
                        dataType: 'JSON',
                        success: function(message){
                            $("#form-update-category").attr('action',"/admin/category/update/" + message.data.id);
                            $("input[name*='name']").val(message.data.name);
                            document.getElementById("categoryEditModalTitle").innerHTML = "<center><b>Edit Kategori - " + message.data.name + "</b></center>";
                        }
                    });
                    break;

                case "couponCell":
                    $.ajax({
                        type: 'GET',
                        url: '/admin/coupon/' + this.id,
                        dataType: 'JSON',
                        success: function(message) {
                            $("#form-update-coupon").attr('action', "/admin/coupon/update/" + message.data.id);
                            $("input[name*='name']").val(message.data.name);
                            $("input[name*='code']").val(message.data.code);
                            $("input[name*='discount']").val(message.data.discount);
                            $("input[name*='start_date']").val(message.data.start_date.split(' ')[0]);
                            $("input[name*='expired_date']").val(message.data.expired_date.split(' ')[0]);
                            document.getElementById("couponEditModalTitle").innerHTML = "<center><b>Edit Informasi Promo - " + message.data.name + "</b></center>";
                        }
                    });
                    break;

                case "transactionDetailCell":
                    $.ajax({
                        type: 'GET',
                        url: '/admin/transaction/detail/' + this.id,
                        dataType: 'JSON',
                        success: function(message) {
                            document.getElementById('transactionDetailBody').innerHTML = '';
                            var tableAppend = '';
                            for(var i = 0; i < message.data.length; i++) {
                                tableAppend += '<tr><td>' + (i+1) + '</td><td>' + message.data[i].name + '</td><td>' + message.data[i]['custom_attributes']['strap_name'] + '</td><td>';
                                tableAppend += '-';
                                tableAppend += '</td><td>' + message.data[i]['custom_attributes']['category_name'] + '</td></td>';
                                tableAppend += '</td><td>' + message.data[i]['custom_attributes']['size'] + '</td></td>';
                                tableAppend += '</td><td>' + message.data[i].quantity + '</td></tr>';
                            }
                            $('#transactionDetailBody').append(tableAppend);
                        }
                    });
                    break;

                case "baseCell":
                    $.ajax({
                        type: 'GET',
                        url: '/admin/product/base/' + this.id,
                        dataType: 'JSON',
                        success: function(message) {
                            $("#form-update-base").attr('action', "/admin/product/base/update/" + message.data.id);
                            $("input[name*='name']").val(message.data.name);
                            $("input[name*='color']").val(message.data.color);
                            $("input[name*='size']").val(message.data.size);
                            $("input[name*='category']").val(message.data.category);
                            $("input[name*='stock']").val(message.data.stock);
                            $("input[name*='picture']").val(message.data.picture);
                        }
                    });
                    break;

                case "strapCell":
                    $.ajax({
                        type: 'GET',
                        url: '/admin/product/strap/' + this.id,
                        dataType: 'JSON',
                        success: function(message) {
                            $("#form-update-strap").attr('action', "/admin/product/strap/update/" + message.data.id);
                            $("input[name*='name']").val(message.data.name);
                            $("input[name*='color']").val(message.data.color);
                            $("input[name*='size']").val(message.data.size);
                            $("input[name*='category']").val(message.data.category);
                            $("input[name*='stock']").val(message.data.stock);
                        }
                    });
                    break;

                case "tattooCell":
                    $.ajax({
                        type: 'GET',
                        url: '/admin/product/tattoo/' + this.id,
                        dataType: 'JSON',
                        success: function(message) {
                            $("#form-update-tattoo").attr('action', "/admin/product/tattoo/update/" + message.data.id);
                            $("input[name*='name']").val(message.data.name);
                            $("input[name*='color']").val(message.data.color);
                            $("input[name*='category']").val(message.data.category);
                            $("input[name*='stock']").val(message.data.stock);
                        }
                    });
                    break;
            }
        })
    })
</script>