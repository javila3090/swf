$(document).ready(function(){
    $flag=1;

    $('#personas').DataTable( {
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    } );

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