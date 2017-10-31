$(document).ready(function(){

    $('#facts').DataTable();


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

    $("#search_facts_sent").click(function(){
        if ($("#cellphone").val()=='') {
            $("#cellphone").css("border-color", "#FF0000");
            $("#cellphone").focus();
            $("#error_cell_phone").text("* Phone number is required");
        }else{
            var code = $('input[name=input_phone_code]').val();
            var phone_number = $('input[name=cellphone]').val();
            var complete_phone_number = code+phone_number;
            $("#cellphone").css("border-color", "#2eb82e");
            $("#error_cell_phone").text("");
            $.ajax({
                url: 'search/facts/',
                type: 'GET',
                data: 'number='+complete_phone_number,
                beforeSend: function () {
                    $('#gif').show();
                },
                success : function( data ) {
                    $('#gif').hide();
                    console.log(data);
                    data = JSON.parse(data);
                    var html = "";
                    if(data.length>0){
                        for (var i = 0; i < data.length; i++) {
                            var j=i+1;
                            html = html + "<div class='row'><div class='col-md-12 text-left'><span><b>Fact sent #"+j+"</b></span></div> </div> <div class='row'><div class='col-md-12'><hr style='border: 1px solid grey'></div></div><div class='row'><div class='col-md-12 text-left'><b>Sent at: </b><span>" + data[i].created_at + "</span></div></div><br><div class='row'><div class='col-md-12 text-left'><b>Fact: </b><span>"+ data[i].text + "</span></div></div><div class='row'><div class='col-md-12'><hr style='border: 2px solid gold'></div></div>";
                        };
                        //var header = "<div class='row'><div class='col-md-10 col-md-offset-1'>"+data[i].phone_number+"</div></div><div class='row'><div class='col-md-10 col-md-offset-1'><hr style='border: 2px solid gold'></div></div>";
                        $("#resultado").empty();
                        $("#resultado").html(html);
                    }else{
                        $("#resultado").html('<span style=""color: red !important; font-size: 18px; font-weight: bold;">There are not results to show</span>');
                    }
                },
                error   : function( xhr, err ) {
                    console.log(err);
                }
            });
            return false;
        }
    });

    $("#open-pay-form").click(function(){
        if ($("#cellphone").val()=='') {
            $("#cellphone").css("border-color", "#FF0000");
            $("#cellphone").focus();
            $("#error_cell_phone").text("* Phone number is required");
        }else if(!$("input:radio[name=frecuency]").is(":checked")){
            $("#error_frecuency").text("* Frecuency is required");
        }else if(!$("input:radio[name=amount]").is(":checked")){
            $("#error_amount").text("* Quantity is required");
        }else{
            var code = $('input[name=input_phone_code]').val();
            var phone_number = $('input[name=cellphone]').val();
            var frecuency = $('input[name=frecuency]:checked').val();
            var amount = $('input[name=amount]:checked').val();
            $(".modal-body #phone_number").val(code+phone_number);
            $(".modal-body #id_frecuency").val(frecuency);
            $(".modal-body #amount").val(amount);
            $(".modal-body .amountSpan").html(amount);
            $("#expire_date").mask("dd/dd");
            $("#paymentModal").modal();
            $("#cellphone").css("border-color", "#2eb82e");
            $("#error_cell_phone").text("");
            $("#error_frecuency").text("");
            $("#error_amount").text("");
        }
    });

    $("#open-pay-form-modal").click(function(){
        if ($("#cellphone").val()=='') {
            $("#cellphone").css("border-color", "#FF0000");
            $("#cellphone").focus();
            $("#error_cell_phone").text("* Phone number is required");
        }else if(!$("input:radio[name=frecuency]").is(":checked")){
            $("#error_frecuency").text("* Frecuency is required");
        }else if(!$("input:radio[name=amount]").is(":checked")){
            $("#error_amount").text("* Quantity is required");
        }else{
            var code = $('input[name=input_phone_code]').val();
            var phone_number = $('input[name=cellphone]').val();
            var frecuency = $('input[name=frecuency]:checked').val();
            var amount = $('input[name=amount]:checked').val();
            $(".modal-body #phone_number").val(code+phone_number);
            $(".modal-body #id_frecuency").val(frecuency);
            $(".modal-body #amount").val(amount);
            $(".modal-body .amountSpan").html(amount);
            $("#expire_date").mask("dd/dd");
            $("#paymentModal").modal();
            $("#cellphone").css("border-color", "#2eb82e");
            $("#error_cell_phone").text("");
            $("#error_frecuency").text("");
            $("#error_amount").text("");
        }
    });

    $("#open-paypal-form").click(function(){
        if ($("#cellphone").val()=='') {
            $("#cellphone").css("border-color", "#FF0000");
            $("#cellphone").focus();
            $("#error_cell_phone").text("* Phone number is required");
        }else if(!$("input:radio[name=frecuency]").is(":checked")){
            $("#error_frecuency").text("* Frecuency is required");
        }else if(!$("input:radio[name=amount]").is(":checked")){
            $("#error_amount").text("* Quantity is required");
        }else {
            var code = $('input[name=input_phone_code]').val();
            var phone_number = $('input[name=cellphone]').val();
            var frecuency = $('input[name=frecuency]:checked').val();
            var amount = $('input[name=amount]:checked').val();
            $(".modal-body #phone_number").val(code + phone_number);
            $(".modal-body #id_frecuency").val(frecuency);
            $(".modal-body #amount").val(amount);
            $(".modal-body #amountSpan").html(amount);
            $("#expire_date").mask("dd/dd");
            $("#paymentPaypalModal").modal();
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

    $("#paymentForm").submit(function(event) {
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
            beforeSend: function ( ) {
                $('#gif').show();
            },
            success : function( data ) {
                $("#paymentForm")[0].reset();
                $("#params-form")[0].reset();
                $("#resultado").html(data);
                $(".modal").modal('hide');
                $('#gif').hide();
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
    $("#phone_code").html("+"+$code_phone);
    $("#input_phone_code").val($code_phone);
    $("#cellphone").focus();
}

function showFact() {
    $.ajax({
        url: 'show/facts',
        type: 'GET',
        success : function( data ) {
            $("#resultado").empty();
            $("#resultado").append(data);
        },
        error   : function( xhr, err ) {
            console.log(err);
        }
    });
    return false;
}

function searchFactsSend(number) {
    $.ajax({
        url: 'show/facts',
        type: 'GET',
        data: number,
        success : function( data ) {
            $("#resultado").empty();
            $("#resultado").append(data);
        },
        error   : function( xhr, err ) {
            console.log(err);
        }
    });
    return false;
}