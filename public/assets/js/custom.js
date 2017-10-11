$(document).ready(function(){

    $("a[href^='#']").on('click', function(e) {
        // prevent default anchor click behavior
        e.preventDefault();

        // store hash
        var hash = this.hash;

        // animate
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top
        }, 500, function(){
            
        });
    });

    $("#open-pay-form").click(function(){
        if ($("#cellphone").val()=='') {
            $("#cellphone").css("border-color", "#FF0000");
            $("#cellphone").focus();
            $("#error_cell_phone").text("* Phone number is required");
        }else if(!$("input:radio[name=frecuency]").is(":checked")){
            $("#error_frecuency").text("* Frecuency is required");
        }else if(!$("input:radio[name=amount]").is(":checked")){
            $("#error_amount").text("* Amount is required");
        }else{
            var frecuency = $('input[name=frecuency]:checked').val();
            var amount = $('input[name=amount]:checked').val();
            $(".modal-body #amount").html(amount);
            $("#expire_date").mask("dd/dd");
            $("#paymentModal").modal();
            $("#cellphone").css("border-color", "#2eb82e");
            $("#error_cell_phone").text("");
            $("#error_frecuency").text("");
            $("#error_amount").text("");
        }
    });

    $("#cellphone").focusout(function(){
        $pho =$("#cellphone").val();
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_cell_phone").text("* Phone number is required");
        }
        else if(!$.isNumeric($pho))
        {
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_phone").text("* Phone number must be numeric");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_cell_phone").text("");

        }
    });

    $("#email").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_email").text("* Email is required");
        }
        else
        {
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_email").text("");

        }
    });

    $("#cardNumber").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_card_number").text("* Card Number is required");
        }
        else
        {
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_card_number").text("");

        }
    });

    $("#cvv").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_cvv").text("* Code cvv is required");
        }
        else
        {
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_cvv").text("");

        }
    });

    $("#expire_date").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_expire_date").text("* Expire date is required");
        }
        else
        {
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_expire_date").text("");

        }
    });

    $("#registroForm").submit(function(event) {
        event.preventDefault();
        if($("#cardNumber" ).val()=='')
        {
            $("#cardNumber").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_cvv").text("* Card number is required");
        }
        if($("#expire_date" ).val()=='')
        {
            $("#expire_date").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_exp_date").text("* Expire date is required");
        }
        if($("#cvv" ).val()=='')
        {
            $("#cvv").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_cvv").text("* CVV numbers are required");
        }
        if($("#email" ).val()=='')
        {
            $("#email").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_email").text("* Email is required");
        }
        $.ajax({
            url: $(this).attr("action"),
            type: $(this).attr("method"),
            data: $(this).serialize(),
            success : function( data ) {
                $('#registroForm')[0].reset();
                $("#resultado").html(data);
            },
            error   : function( xhr, err ) {
                console.log(err);
            }
        });
        return false;
    });

});

function fillInput($code_phone){
    $.mask.definitions['9'] = '';
    $.mask.definitions['d'] = '[0-9]';
    $("#cellphone").mask("+"+$code_phone+" (ddd)-ddddddd");
    $("#cellphone").focus();
}