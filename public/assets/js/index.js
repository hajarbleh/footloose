$(document).ready(function() {
    $('nav').css('background','transparent');
    $(window).scroll(function() {
        var x = $(window).scrollTop();
        if (x <= 0) {
            $('nav').css('background','transparent');
        } else {
            $('nav').css('background','#fff');
        }
    });

    var jumboHeight = $('.slider-helper').outerHeight();
    function parallax(){
        var scrolled = $(window).scrollTop();
        $('.slider-bg').css('height', (jumboHeight+scrolled) + 'px');
    }
    parallax();
    $(window).scroll(function(e){
        parallax();
    });
});

function getffotmstock(selector) {
    document.getElementById("quantity").disabled =  'disabled';
    document.getElementById("quantity").removeAttribute('value');
    var baseID = document.getElementById("baseID").value;
    var strapID = document.getElementById("strapID").value;
    $.ajax({
        type: 'GET',
        url: '/base/' + baseID + '/strap/' + strapID + '/size/' + selector.value,
        dataType: 'JSON',
        success: function(message) {
            if( !($('#outofstockalert').is(':empty')) ) {
                document.getElementById("bodyalert").remove();
            }
            if(message.data == 0) {
                var tableAppend = '<div id="bodyalert" class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Mohon maaf, FreeFlop of the Month ukuran ' + selector.value + ' sedang habis</div>';
                $('#outofstockalert').append(tableAppend);
            }
            else {
                document.getElementById("quantity").removeAttribute('disabled');
                document.getElementById("quantity").setAttribute("max", message.data.stock);
                document.getElementById("quantity").setAttribute("value", 1);
            }
        }
    });
}

function selectffotm(ffotm) {
    document.getElementById("categoryID").value = ffotm.getAttribute("data-categoryid");
    document.getElementById('baseID').dataset.name = ffotm.getAttribute("data-basename");
    document.getElementById('strapID').dataset.name = ffotm.getAttribute("data-strapname");
    document.getElementById("baseID").value = ffotm.getAttribute("data-baseid");
    document.getElementById("strapID").value = ffotm.getAttribute("data-strapid");
    document.getElementById("baseID").dataset.picture = ffotm.getAttribute("data-basepic");
    document.getElementById("strapID").dataset.picture = ffotm.getAttribute("data-strappic");
}

$(document).ready(function() {
    $('#addtocart').on('submit', function(e) {
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        })
        e.preventDefault(e);

        var categoryID = document.getElementById("categoryID").value;
        var baseID = document.getElementById("baseID").value;
        var strapID = document.getElementById("strapID").value;
        var quantity = document.getElementById('quantity').value;
        var size = document.getElementById("size").value;
        $.ajax({
            type: 'POST',
            url: '/addtocart',
            data : {size: size, categoryID: categoryID, baseID: baseID, strapID: strapID, quantity: quantity},
            dataType: 'json',
            success: function(message) {
                jQuery.noConflict();
                $('.modal').modal('toggle');
                $("#basepic").attr("src",document.getElementById('baseID').getAttribute('data-picture'));
                $("#strappic").attr("src",document.getElementById('strapID').getAttribute('data-picture'));
                document.getElementById("flopname").innerHTML = document.getElementById('baseID').getAttribute('data-name') + " with " + document.getElementById('strapID').getAttribute('data-name');
                document.getElementById("sizeModal").innerHTML = "Size : " + $('#size').val();
                document.getElementById("baseModal").innerHTML = "Base : " + document.getElementById('baseID').getAttribute('data-name');
                document.getElementById("strapModal").innerHTML = "Strap : " + document.getElementById('strapID').getAttribute('data-name');
                document.getElementById("tattooModal").innerHTML = "Tattoo : -";
                document.getElementById("quantityModal").innerHTML = "Quantity : " + document.getElementById('quantity').value;
//                        $('#addtocart').modal('show');
            }
        });
    });
});