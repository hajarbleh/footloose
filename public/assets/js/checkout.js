$(document).ready(function() {
    jQuery.noConflict();
    $('#finalizetrigger').click(function(e) {
        $.ajaxSetup({
            headers:{'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')}
        })
        e.preventDefault(e);
        var address = document.getElementById('address').textContent;
        var service = document.getElementById('selectService').value;
        var deliveryCost = $('#selectService').find('option:selected').attr('data-value');
        var total = {!! json_encode($total) !!};
        var $erroralert2 = $('#erroralert2');
        $.ajax({
            method: 'POST',
            url: '/finalizeorder',
            data: {address:address, service:service, deliveryCost:deliveryCost, total: +total + +deliveryCost},
            success: function(){
                success();
            },
            error: function(message) {
                cartkosong(message.responseJSON.error);
            }
        });
        function success() {
            $('#successalert').slideDown(function() {
                setTimeout(function() {
                    $('#successalert').slideUp();
                }, 3000);
            });
            e.preventDefault();
            setTimeout(function () {
                window.location.href = "/checkout";
            }, 4000); 
        }
        function cartkosong(message) {
            $('#erroralert2').innerHTML = "";
            var tableAppend = '<div id="bodyalert3" class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> ' + message + '</div>';
            $('#erroralert2').append(tableAppend);
        }
    });
    $('#alamattrigger').click(function() {
        var courier = document.getElementById('selectCourier').value;
        var service = document.getElementById('selectService').value;
        if(courier && service) {
            if( !($('#erroralert').is(':empty')) ) {
                document.getElementById("bodyalert2").remove();
            }
            $('#alamatmodal').modal('show');
        }
        else {
            if( ($('#erroralert').is(':empty')) ) {
                var tableAppend = '<div id="bodyalert2" class="alert alert-warning"><i class="fa fa-exclamation-triangle"></i> Mohon isi kurir dan layanan di atas </div>';
                $('#erroralert').append(tableAppend);
            }
        }
    });
});
function selectCour(selector) {
    var courier = document.getElementById('selectCourier').value;
    if(courier == "other") {
        document.getElementById('selectService').innerHTML = '';
        document.getElementById('selectService').removeAttribute('disabled');
        $('#selectService').append("<option selected disabled></option>");
        $('#selectService').append("<option data-value='0' value='By contact'>Contact administrator</option>");
    }
    else {
        var destination = {!! json_encode(Auth::user()->city_id) !!};
        $.ajax({
            method: 'GET',
            url: '/getservice/' + courier + '/to/' + destination + '/' + {{$itemCount}},
            dataType: 'JSON',
            success: function(message){
                document.getElementById('selectService').innerHTML = '';
                var appendOption = "<option selected disabled></option>";
                for(var i = 0 ; i < message.data.length ; i++) {
                    if(message.data[i]['cost'][0]['etd']) {
                        appendOption += "<option data-value=" + message.data[i]['cost'][0]['value'] + " value='" + message.data[i].service + "' title='Perkiraan sampai " + message.data[i]['cost'][0]['etd'] + " hari'>" + message.data[i].service + "- Rp. " + message.data[i]['cost'][0]['value'] + "</option>";
                    }
                }
                document.getElementById('selectService').removeAttribute('disabled');
                $('#selectService').append(appendOption);
            },
            error: function(message){
                alert("Pastikan anda sudah membeli barang");
            }
        });
    }
}

function selectServ() {
    var deliveryCost = Number($('#selectService').find('option:selected').attr('data-value'));
    var total = {!! json_encode($total) !!};
    document.getElementById('deliveryCost').innerHTML = "<b>Rp "+ deliveryCost +  "</b>";
    document.getElementById('total').innerHTML = "<b>Rp "+ (total+deliveryCost) +  "</b>";
}