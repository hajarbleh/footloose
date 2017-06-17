<div class="row">
        <div class="col-sm-4 col-xs-6">
            <label>Price :</label>
            <form>
                {{csrf_field()}}
                <div class="input-group mb-1 mr-sm-1 mb-sm-0">
                    <div class="input-group-addon">Rp.</div>
                    <input name="price" type="number" class="form-control" value="50000">
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%">Update</button>
            </form>
        </div>
</div>