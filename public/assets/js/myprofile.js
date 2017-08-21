$(document).ready(function() {
    $('#transaksiTable').DataTable();
    jQuery.noConflict();
    $('#profiltrigger').click(function() {
        $('#profilmodal').modal();
    });
    $('#alamattrigger').click(function() {
        $('#alamatmodal').modal();
    });
    $('#passwordtrigger').click(function() {
        $('#passwordmodal').modal();
    });
});

function seedetails(order) {
    $.ajax({
        type: 'GET',
        url: '/user/transaction/detail/' + order.id,
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
        },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}
function selectProv(opt) {
    var provinceID = $('option:selected', opt).attr('name');
    $.ajax({
        type: 'GET',
        url: '/getcity/' + provinceID,
        dataType: 'JSON',
        success: function(message) {
            $("#kota").empty();
            var optionAppend = '';
            for(var i = 0; i < message.data.length; i++){
                if(i==0) {
                    optionAppend += '<option data-id=' + message.data[i].city_id + ' value=' + message.data[i].city_name +' selected>' + message.data[i].city_name + '</option>';
                }
                else {
                    optionAppend += '<option data-id=' + message.data[i].city_id + ' value=' + message.data[i].city_name +'>' + message.data[i].city_name + '</option>';
                }
            }
            $('#kota').append(optionAppend);
            document.getElementById('cityID').value = $('#kota').find(':selected').data('id');
        }
    });
}

function selectCity(city) {
    document.getElementById('cityID').value = $('#kota').find(':selected').data('id');
}