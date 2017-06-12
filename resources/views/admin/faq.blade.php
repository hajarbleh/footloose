<form action="/admin/faq/update" method="post">
    {{csrf_field()}}
    <div class="col-sm-12">
        <textarea name="faqeditor" id="faqeditor" rows="10" cols="80">
            @if($FAQ->count())
                {{$FAQ->body}}
            @endif
        </textarea>
    </div>
    <div class="col-sm-12" style="margin-top:1rem">
        <button type="submit" class="btn btn-primary" style="width:100%">Update</button>
    </div>
</form>
