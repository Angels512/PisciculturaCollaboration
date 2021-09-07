function init(){
    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del formato de Estado General de Acuicultura
    $("#estacui_form").on("submit",function(e)
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

});

function validarDatos(e){
    e.preventDefault();

    if($('#obser_gene').val()==''){
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

//listar datos de Estado de Acucultura para consultar o actualizar
function listarDatos()
{
    let id_est_acui = getUrlParameter('ID');

    $.post('controller/estadoacuicultura.php?op=listarDatosEstacui', {id_est_acui:id_est_acui}, function(data)
    {
        data = JSON.parse(data);

        $('#id_est_acui').val(data.id_est_acui);
        $('#id_usu').val(data.id_usu);
        $('#fecha').val(data.fecha);
        $("#id_cultivo").val(data.id_cultivo);
        $("#obser_gene").val(data.obser_gene);
    });
}

// creamos la funcion guardar para insertar un nuevo registro y vaciar los campos del formulario
function guardar(){
    var formData = new FormData($('#estacui_form')[0]);

    $.ajax({
        url: "controller/estadoacuicultura.php?op=insertEstacui",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: (datos) =>
        {
            $("#estacui_form")[0].reset();

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
    var formData = new FormData($("#estacui_form")[0]);

    $.ajax({
        url: "controller/estadoacuicultura.php?op=editar",
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
