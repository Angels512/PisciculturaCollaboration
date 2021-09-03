function init(){
    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del formato de Biometrias de Crecimiento
    $("#biocre_form").on("submit",function(e)
    {
        validarDatos(e);
    });
}

$(document).ready(function(){
    /* Esto es para llenar el select del Cultivo */
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('#id_cultivo').html(data);
    });

    /* Esto es para llenar el select de las etapas */
    $.post("controller/etapa.php?op=etapas",function(data, status){
        $('#id_etapa').html(data);
    });

    // Condición para saber si se va a consultar o modificar segun informacion que llegue de la url
    getUrlParameter('ID') || getUrlParameter('EDIT') ? listarDatos() : console.log('Ok');

    /*Sliders Rangos*/
    if (!getUrlParameter('ID') && !getUrlParameter('EDIT'))
    {
        $("#peso_organ").ionRangeSlider({
            min: 1,
            max: 500,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#peso_biomasa").ionRangeSlider({
            min: 1,
            max: 500,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#edad_organ").ionRangeSlider({
            min: 1,
            max: 24,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#crecimiento_organ").ionRangeSlider({
            min: 1,
            max: 35,
            from: 0,
            grid: true,
            hide_min_max: true
        });
    }
});

function validarDatos(e){
    e.preventDefault();

    if($('#obser_adic').val()==''){
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

//listar datos de biocrecimiento para consultar o actualizar
function listarDatos()
{
    let id_biocre = getUrlParameter('ID');

    $.post('controller/biocrecimiento.php?op=listarDatosBiocre', {id_biocre:id_biocre}, function(data)
    {
        data = JSON.parse(data);

        $('#id_biocre').val(data.id_biocre);
        $('#id_usu').val(data.id_usu);
        $('#num_organ').val(data.num_organ);
        $('#fecha').val(data.fecha);
        $("#id_cultivo").val(data.id_cultivo);
        $("#id_etapa").val(data.id_etapa);
        $("#peso_organ").val(data.peso_organ);
        $("#peso_biomasa").val(data.peso_biomasa);
        $("#edad_organ").val(data.edad_organ);
        $("#color_organ").val(data.color_organ);
        $("#escamas_organ").val(data.escamas_organ);
        $("#ojos_organ").val(data.ojos_organ);
        $("#compor_organ").val(data.compor_organ);
        $("#crecimiento_organ").val(data.crecimiento_organ);
        $("#obser_adic").val(data.obser_adic);
    });
}

// creamos la funcion guardar para insertar una nueva biometria y vaciar los campos del formulario
function guardar(){
    var formData = new FormData($('#biocre_form')[0]);

    $.ajax({
        url: "controller/biocrecimiento.php?op=insertbiocre",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: (datos) =>
        {
            $("#biocre_form")[0].reset();

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
    var formData = new FormData($("#biocre_form")[0]);

    $.ajax({
        url: "controller/biocrecimiento.php?op=editar",
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
