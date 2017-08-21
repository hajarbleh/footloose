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