$(document).ready(function(){
    $(".btn-primary").on("click",function(){
        switch(this.id) {
            case "addBase":
                $("input[name*='name']").val("");
                $("input[name*='color']").val("#000000");
                $("input[name*='size']").val(0);
                $("input[name*='stock']").val(0);
                break;

            case "addStrap":
                $("input[name*='name']").val("");
                $("input[name*='color']").val("#000000");
                $("input[name*='size']").val(0);
                $("input[name*='stock']").val(0);
                break;

            case "addTattoo":
                $("input[name*='name']").val("");
                $("input[name*='color']").val("#000000");
                $("input[name*='stock']").val(0);
                break;

            case "addCoupon":
                $("input[name*='name']").val("");
                $("input[name*='code']").val("");
                $("input[name*='discount']").val(0);
                $("input[name*='start_date']").val("");
                $("input[name*='expired_date']").val("");
                break;

        }
    });
});