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
        var amount = $('input[name=amount]:checked').val();
        $(".modal-body #amount").val( amount );
        $("#paymentModal").modal();
    });

    $("#nombres").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_name").text("* Debes ingresar tu nombre");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_name").text("");

        }
    });
    $("#apellidos").focusout(function(){
        if($(this).val()==''){
            $(this).css("border-color", "#FF0000");
            $('#submit').attr('disabled',true);
            $("#error_lastname").text("* Debes ingresar tu apellido");
        }
        else
        {
            $(this).css("border-color", "#2eb82e");
            $('#submit').attr('disabled',false);
            $("#error_lastname").text("");
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