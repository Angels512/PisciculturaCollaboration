function init(){
    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del formato de Temperatura del Agua
    $("#tempagua_form").on("submit",function(e)
    {
        validarDatos(e);
    });
}

function validarDatos(e){
    e.preventDefault();

    if($('#num_dia').val()==''){
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

//listar datos de temperatura agua para consultar o actualizar
function listarDatos()
{
    let id_temp_agua = getUrlParameter('ID');

    $.post('controller/temperaturaagua.php?op=listarDatosTempagua', {id_temp_agua:id_temp_agua}, function(data)
    {
        data = JSON.parse(data);

        $('#id_temp_agua').val(data.id_temp_agua);
        $('#id_usu').val(data.id_usu);
        $('#fecha').val(data.fecha);
        $("#id_cultivo").val(data.id_cultivo);
        $("#grados1").val(data.peso_organ);
        $("#grados2").val(data.peso_biomasa);
        $("#grados3").val(data.edad_organ);
    });
}

// creamos la funcion guardar para insertar una nueva biometria y vaciar los campos del formulario
function guardar(){
    var formData = new FormData($('#tempagua_form')[0]);

    $.ajax({
        url: "controller/temperaturaagua.php?op=insertTempagua",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: (datos) =>
        {
            $("#tempagua_form")[0].reset();

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
    var formData = new FormData($("#tempagua_form")[0]);

    $.ajax({
        url: "controller/temperaturaagua.php?op=editar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            swal({
                title: "A'ttia!",
                text: "Registro Guardado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}



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

