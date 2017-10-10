$(document).ready(function(){
    $flag=1;

    $("a[href^='#']").on('click', function(e) {
        // prevent default anchor click behavior
        e.preventDefault();

        // store hash
        var hash = this.hash;

        // animate
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top
        }, 500, function(){

            // when done, add hash to url
            // (default click behaviour)
            //window.location.hash = hash;
        });

    });



    $("#open-pay-form").click(function(){
        if ($("#cellphone").val()=='') {
            $("#cellphone").css("border-color", "#FF0000");
            $("#cellphone").focus();
            $("#error_cell_phone").text("* Debe ingresar un número de teléfono válido");
        }else if(!$("input:radio[name=frecuency]").is(":checked")){
            $("#error_frecuency").text("* Debe seleccionar una frecuencia");
        }else if(!$("input:radio[name=amount]").is(":checked")){
            $("#error_amount").text("* Debe seleccionar una frecuencia");
        }else{
            var frecuency = $('input[name=frecuency]:checked').val();
            var amount = $('input[name=amount]:checked').val();
            $(".modal-body #amount").html(amount);
            $("#paymentModal").modal();
            $("#cellphone").css("border-color", "#2eb82e");
            $("#error_cell_phone").text("");
            $("#error_frecuency").text("");
            $("#error_amount").text("");
        }
    });

    $("#cellphone").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_cell_phone").text("* Debe ingresar un número de teléfono válido");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_cell_phone").text("");

        }
    });
    $("#frecuency").focusout(function(){
        if(!$(this).is(":checked")){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_frecuency").text("* Debe seleccionar una frecuencia");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_frecuency").text("");
        }
    });
    $("#fecha_nac").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_dob").text("* Debes ingresar tu fecha de nacimiento");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_dob").text("");
            $.ajax({
                url: "/calcular/{fecha}",
                type: "GET",
                data: { fecha: $(this).val() },
                success : function( data ) {
                    $("#edad").val(data);
                },
                error   : function( xhr, err ) {
                    console.log(err);
                }
            });
        }
    });
    $("#genero").focusout(function(){
        $(this).css("border-color", "#2eb82e");

    });

    $("#telefono").focusout(function(){
        $pho =$("#telefono").val();
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_phone").text("* Debes ingresar un número de teléfono");
        }
        else if(!$.isNumeric($pho))
        {
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_phone").text("* El número de teléfono debe ser numérico");
        }
        else{
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_phone").text("");
        }

    });

    $("#email").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_email").text("* Debes ingresar un email válido");
        }
        else
        {
            $(this).css({"border-color":"#2eb82e"});
            $('#submit').attr('disabled',false);
            $("#error_email").text("");

        }
    });

    $("#registroForm").submit(function(event) {
        event.preventDefault();
        if($("#nombres" ).val()=='')
        {
            $("#nombres").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_name").text("* Debe ingresar su nombre");
        }
        if($("#apellidos" ).val()=='')
        {
            $("#apellidos").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_lastname").text("* Debe ingresar su apellido");
        }
        if($("#fecha_nac" ).val()=='')
        {
            $("#fecha_nac").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_dob").text("* Debe ingresar su fecha de nacimiento");
        }
        if($("#edad" ).val()=='')
        {
            $("#edad").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_age").text("* Debe ingresar su edad");
        }
        if($("#email" ).val()=='')
        {
            $("#email").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_email").text("* Debe ingresar un email válido");
        }
        if($("#telefono" ).val()=='')
        {
            $("#telefono").css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_phone").text("* Debe ingresar un número de teléfono");
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
    var mask=$("#cellphone").mask("+ "+$code_phone+" (ddd)-ddddddd");
    $("#cellphone").focus();
}