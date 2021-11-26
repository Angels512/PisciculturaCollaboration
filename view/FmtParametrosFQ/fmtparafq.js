const txarea = document.querySelectorAll('#parafq_form textarea');

const expresiones = {
	observaciones: /^.{20,200}$/, // Letras,espacios,otros símbolos y números.
}

function init(){
    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del formato de Parametros FQ
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
            max: 5,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#rango_nitrito").ionRangeSlider({
            min: 0.1,
            max: 5,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#rango_nitrato").ionRangeSlider({
            min: 0.1,
            max: 5,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#rango_ph").ionRangeSlider({
            min: 0.1,
            max: 5,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#cant_melaza").ionRangeSlider({
            min: 0.1,
            max: 5,
            from: 0,
            grid: true,
            hide_min_max: true
        });

        $("#porc_agua").ionRangeSlider({
            min: 0,
            max: 100,
            from: 0,
            grid: true,
            hide_min_max: true
        });
    }

});

// Por cada input del formulario se realiza la validacion
txarea.forEach((textarea) =>
{
    //keyup para que se realice siempre que se presione una tecla
    textarea.addEventListener('keyup', validateForm);
    //blur para que se realice siempre que se presione fuera del input
    textarea.addEventListener('blur', validateForm);
});

function validateForm(e)
{
    switch (e.target.name) {
        case 'observaciones':
            validateData(expresiones.observaciones, e.target, 'observaciones');
        break;
    }
}

function validateData(expresion, input, campo)
{
    if (expresion.test(input.value))
    {
        $('#'+campo).removeClass('form-control-danger');
        $('#'+campo).addClass('form-control-success');
        $('#'+campo+'_alert').prop('hidden', true);
    }else {
        $('#'+campo).addClass('form-control-danger');
        $('#'+campo+'_alert').prop('hidden', false);
    }
}

function validarDatos(e){
    e.preventDefault();

    let valite_observaciones = $('#observaciones').hasClass('form-control-danger');

    if($('#rango_amonio').val()=='' ||$('#rango_nitrito').val()=='' || $('#rango_nitrato').val()=='' || $('#rango_ph').val()=='' || $('#cant_melaza').val()=='' || $('#porc_agua').val()=='' || $('#observaciones').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_observaciones) {
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "OK"
        });
    }else{
        getUrlParameter('ID') && getUrlParameter('EDIT') ? editar() : guardar();
    }
}

//listar datos de temperatura agua para consultar o actualizar
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

// creamos la funcion guardar para insertar un nuevo temperatura agua y vaciar los campos del formulario
function guardar(){
    var formData = new FormData($('#parafq_form')[0]);

    $.ajax({
        url: "controller/parametrosfq.php?op=insertParafq",
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
