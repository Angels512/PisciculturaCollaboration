function init(){
    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del formato de Temperatura Ambiente
    $("#tempamb_form").on("submit",function(e)
    {
        validarDatos(e);
    });
}

$(document).ready(function(){
    /* Esto es para llenar el select del Cultivo */
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('#id_cultivo').html(data);
    });

    // Condición para saber si se va a consultar o modificar segun informacion que llegue de la url
    getUrlParameter('ID') || getUrlParameter('EDIT') ? listarDatos() : console.log('Ok');

    /*Sliders Rangos*/
    if (!getUrlParameter('ID') && !getUrlParameter('EDIT'))
    {
        $("#grados1").ionRangeSlider({
            min: 0,
            max: 50,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#grados2").ionRangeSlider({
            min: 0,
            max: 50,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#grados3").ionRangeSlider({
            min: 0,
            max: 50,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        
    }

});

function validarDatos(e){
    e.preventDefault();

    if($('#num_dia').val()=='' ||$('#grados1').val()=='' || $('#grados2').val()=='' || $('#grados3').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else{
        getUrlParameter('ID') && getUrlParameter('EDIT') ? editar() : guardar();
    }
}

//listar datos de temperatura ambiente para consultar o actualizar
function listarDatos()
{
    let id_temp_amb = getUrlParameter('ID');

    $.post('controller/temperaturaambiente.php?op=listarDatosTempamb', {id_temp_amb:id_temp_amb}, function(data)
    {
        data = JSON.parse(data);

        $('#id_temp_amb').val(data.id_temp_amb);
        $('#id_usu').val(data.id_usu);
        $('#fecha').val(data.fecha);
        $("#id_cultivo").val(data.id_cultivo);
        $("#num_dia").val(data.num_dia);
        $("#grados1").val(data.grados1);
        $("#grados2").val(data.grados2);
        $("#grados3").val(data.grados3);
    });
}

// creamos la funcion guardar para insertar un nuevo temperatura ambiente y vaciar los campos del formulario
function guardar(){
    var formData = new FormData($('#tempamb_form')[0]);

    $.ajax({
        url: "controller/temperaturaambiente.php?op=insertTempamb",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: (datos) =>
        {
            $("#tempamb_form")[0].reset();

            document.querySelectorAll('.slider').forEach((slider) =>
            {
                let reset = $(`#${slider.id}`).data('ionRangeSlider');
                reset.reset();
            });

            swal("Correcto!","Registrado Correctamente","success");
        }
    });
}

// creamos la funcion editar para actualizar el formato
function editar(){
    var formData = new FormData($("#tempamb_form")[0]);

    $.ajax({
        url: "controller/temperaturaambiente.php?op=editar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            swal({
                title: "A'ttia!",
                text: " Registro Guardado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$('#btnAtras').on('click', () =>
{
    window.location.href = `consultar-formatos?ID=${getUrlParameter('cultivo')}`;
})

// funcion con la que capturamos el id que llega por la url
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

init();
