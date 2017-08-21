function updqty(x){
    quantity = document.getElementById("qty");
    var baseStock = $("input[name='basecol']:checked").data('stock');
    var strapStock = $("input[name='strapcol']:checked").data('stock');
    if (x == "+" && quantity.value < Math.min(baseStock, strapStock)) {
        quantity.value ++;
        document.getElementById("quantityPreview").innerHTML = "Quantity: " + quantity.value;
    }
    else if (x == "-" && quantity.value > 1) {
        quantity.value --;
        document.getElementById("quantityPreview").innerHTML = "Quantity: " + quantity.value;
    }
}

function selectCategory(category) {
    $('#listSize').removeAttr('disabled');
    $("#listSize").empty();
    var categoryID = $('#listCategory').val();
    $("#defaultPicture").empty();
    $("#basePreview").attr('src', '');
    $("#strapPreview").attr('src', '');
    if($("#defaultPicture").is(':empty')){
        if (categoryID == 1){
            var pic="<img src='default/men.png' style='width:120%; position:absolute'>";
        }
        else if (categoryID == 2){
            var pic="<img src='default/women.png' style='width:120%; position:absolute'>";
        }
        else if (categoryID == 3){
            var pic="<img src='default/kids.png' style='width:120%; position:absolute'>";
        }
    }
    
    
    $("#defaultPicture").append(pic);

    var appendOption = "<option selected disabled>Select size</option>";
    for(var i = 36; i < 41; i++) {
        appendOption += "<option value=" + i + ">" + i + "</option>";
    }
    $('#listSize').append(appendOption);

    var nextCat = document.getElementById("nextCategory");
    nextCat.href="#carousel-example-generic";
    var nextSize = document.getElementById("nextSize");
    nextSize.removeAttribute('href');
}

function selectSize(size) {
    var categoryID = $('#listCategory').val();
    $.ajax({
        type: 'GET',
        url: '/base/category/' + categoryID + '/size/' + size.value,
        dataType: 'JSON',
        success: function(message) {
            $('#baseColor').empty();
            var appendOption =  "";
            if(message.data.length) {
                for(var i = 0; i < message.data.length; i++) {
                    appendOption += "<span><input type='radio' data-stock='" + message.data[i].stock + "' data-picture='" + message.data[i].picture + "' data-name='" + message.data[i].name + "' value='" + message.data[i].id + "' id='base" + message.data[i].id + "' name='basecol' onclick='selectBase(this)'/><label for='base" + message.data[i].id + "'><span style='background-color:" + message.data[i].color + "'></span></label></span>"
                }
            }
            else {
                appendOption += "<i>Mohon maaf, stok base untuk ukuran ini sedang habis</i>"
            }
            $('#baseColor').append(appendOption);
        }
    });

    var nextSize = document.getElementById("nextSize");
    nextSize.href="#carousel-example-generic";
    var nextBase = document.getElementById("nextBase");
    nextBase.removeAttribute('href');
}

function selectBase(base) {
    var categoryID = $('#listCategory').val();
    var size = $('#listSize').val();
    var basePreview = document.getElementById("basePreview");
    basePreview.src= base.getAttribute('data-picture');
    var selectedName = base.getAttribute('data-name');
    var selectedID = base.id;
    $.ajax({
        type: 'GET',
        url: '/strap/category/' + categoryID + '/size/' + size,
        dataType: 'JSON',
        success: function(message) {
            $('#defaultPicture').empty();
            $('#strapColor').removeAttr('disabled');
            $('#strapColor').empty();
            var appendOption =  "";
            if(message.data.length) {
                for(var i = 0; i < message.data.length; i++) {
                    appendOption += "<span><input type='radio' data-stock='" + message.data[i].stock + "' data-picture='" + message.data[i].picture + "' data-name='" + message.data[i].name + "' value='" + message.data[i].id + "' id='strap" + message.data[i].id + "' name='strapcol' onclick='selectStrap(this)'/><label for='strap" + message.data[i].id + "'><span style='background-color:" + message.data[i].color + "'></span></label></span>"
                }
            }
            else {
                appendOption += "<i>Mohon maaf, stok strap untuk ukuran ini sedang habis</i>"
            }

            $('#strapColor').append(appendOption);
        }
    });

    var nextBase = document.getElementById("nextBase");
    nextBase.href="#carousel-example-generic";
    var nextStrap = document.getElementById("nextStrap");
    nextStrap.removeAttribute('href');
}

function selectStrap(strap) {
    var strapPreview = document.getElementById("strapPreview");
    strapPreview.src= strap.getAttribute('data-picture');
    var selectedName = strap.getAttribute('data-name');
    var nextStrap = document.getElementById("nextStrap");
    nextStrap.href="#carousel-example-generic";
}

$(document).ready(function() {
    $('#addtocart').on('submit', function(e) {
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        })
        e.preventDefault(e);

        var size = $('#listSize').val();
        var categoryID = document.getElementById('listCategory').value;
        var baseID = $("input[name='basecol']:checked").val();
        var strapID = $("input[name='strapcol']:checked").val();
        var quantity = document.getElementById('qty').value;
        $.ajax({
            type: 'POST',
            url: '/addtocart',
            data : {size: size, categoryID: categoryID, baseID: baseID, strapID: strapID, quantity: quantity},
            dataType: 'json',
            success: function(message) {
                document.getElementById("flopname").innerHTML = $("input[name='basecol']:checked").data('name') + " with " + $("input[name='strapcol']:checked").data('name');
                document.getElementById("sizeModal").innerHTML = "Size : " + $('#listSize').val();
                document.getElementById("baseModal").innerHTML = "Base : " + $("input[name='basecol']:checked").data('name');
                document.getElementById("strapModal").innerHTML = "Strap : " + $("input[name='strapcol']:checked").data('name');
                document.getElementById("tattooModal").innerHTML = "Tattoo : -";
                document.getElementById("quantityModal").innerHTML = "Quantity : " + document.getElementById('qty').value;
                $("#basepic").attr("src",document.getElementById('basePreview').src);
                $("#strappic").attr("src",document.getElementById('strapPreview').src);
                jQuery.noConflict();
                $('#modal').modal('show');
            }
        });
    });
    $('nav').css('background','#94d6de');

});