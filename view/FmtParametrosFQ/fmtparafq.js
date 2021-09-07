function init(){
    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del formato de Parametros Fisico Quimicos
    $("#parafq_form").on("submit",function(e)
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
        $("#rango_amonio").ionRangeSlider({
            min: 0.1,
            max: 100,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#rango_nitrito").ionRangeSlider({
            min: 0.1,
            max: 100,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#rango_nitrato").ionRangeSlider({
            min: 0.1,
            max: 100,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#rango_ph").ionRangeSlider({
            min: 0.1,
            max: 100,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#cant_melaza").ionRangeSlider({
            min: 0.1,
            max: 100,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#porc_agua").ionRangeSlider({
            min: 0.1,
            max: 100,
            from: 0,
            grid: true,
            hide_min_max: true
        });
    }
});

function validarDatos(e){
    e.preventDefault();

    if($('#observaciones').val()==''){
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

//listar datos de parametrosfq para consultar o actualizar
function listarDatos()
{
    let id_par_fq = getUrlParameter('ID');

    $.post('controller/parametrosfq.php?op=listarDatosParafq', {id_par_fq:id_par_fq}, function(data)
    {
        data = JSON.parse(data);

        $('#id_par_fq').val(data.id_par_fq);
        $('#id_usu').val(data.id_usu);
        $('#fecha').val(data.fecha);
        $("#id_cultivo").val(data.id_cultivo);
        $("#rango_amonio").val(data.rango_amonio);
        $("#rango_nitrito").val(data.rango_nitrito);
        $("#rango_nitrato").val(data.rango_nitrato);
        $("#rango_ph").val(data.rango_ph);
        $("#cant_melaza").val(data.cant_melaza);
        $("#porc_agua").val(data.porc_agua);
        $("#observaciones").val(data.observaciones);
    });
}

// creamos la funcion guardar para insertar un nuevo registro y vaciar los campos del formulario
function guardar(){
    var formData = new FormData($('#parafq_form')[0]);

    $.ajax({
        url: "controller/parametrosfq.php?op=insertparafq",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: (datos) =>
        {
            $("#parafq_form")[0].reset();

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
    var formData = new FormData($("#parafq_form")[0]);

    $.ajax({
        url: "controller/parametrosfq.php?op=editar",
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
