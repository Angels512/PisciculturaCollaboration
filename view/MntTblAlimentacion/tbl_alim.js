const txarea = document.querySelectorAll('#tabla_alim textarea');

const expresiones = {
	obser_atmo: /^.{20,200}$/, // Letras,espacios,otros símbolos y números.
    obser_gen_cult: /^.{20,200}$/, // Letras,espacios,otros símbolos y números.
}

function init(){
    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del formato de Biometrias de Crecimiento
    $("#tabla_alim").on("submit",function(e)
    {
        validarDatos(e);
    });

}

$(document).ready(function() {

    /* Para inicializar la funcion del calendario para la hora*/
    $('.hora').datetimepicker({
        widgetPositioning: {
            horizontal: 'right'
        },
        format: 'LT',
        debug: false,
    });


    /* Esto es para llenar el select del Cultivo */
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('#id_cultivo').html(data);
    });

    /* Esto es para llenar el select del Producto Suministrado */
    $.post("controller/producto.php?op=productos",function(data, status){
        $('#id_produ').html(data);
    });

    // Condición para saber si se va a consultar o modificar segun informacion que llegue de la url
    getUrlParameter('ID') || getUrlParameter('EDIT') ? listarDatos() : console.log('Ok');

});

//para mostrar el modal de mortalidad una vez se de clic al boton mortandad
$(document).on("click","#newmortalidad",function(){

    $('#modalmortalidad').modal('show');
});

//para mostrar el modal de novedad una vez se de clic al boton mortandad
$(document).on("click","#newnovedad",function(){

    $('#modalnovedad').modal('show');
});

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
        case 'obser_atmo':
            validateData(expresiones.obser_atmo, e.target, 'obser_atmo');
        break;

        case 'obser_gen_cult':
            validateData(expresiones.obser_gen_cult, e.target, 'obser_gen_cult');
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

    let valite_obser_atmo = $('#obser_atmo').hasClass('form-control-danger');
    let valite_obser_gen_cult = $('#obser_gen_cult').hasClass('form-control-danger');

    if($('#hora_sum_alim1').val()=='' ||$('#hora_sum_alim2').val()=='' || $('#hora_sum_alim3').val()=='' || $('#obser_atmo').val()=='' || $('#obser_gen_cult').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_obser_atmo || valite_obser_gen_cult) {
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

 //listar datos de tbl alimentacion para consultar o actualizar
function listarDatos()
{
    $("#newmortalidad").hide();
    $("#newnovedad").hide();

    let id_tbl_alim = getUrlParameter('ID');

    $.post('controller/tblalimentacion.php?op=listarDatosTblAlim', {id_tbl_alim:id_tbl_alim}, function(data)
    {
        data = JSON.parse(data);

        $('#id_tbl_alim').val(data.id_tbl_alim);
        $('#cant_siembra').val(data.cant_siembra);
        $("#porc_proteina").val(data.porc_proteina).trigger('change');
        $("#hora_sum_alim1").val(data.hora_sum_alim1);
        $("#hora_sum_alim2").val(data.hora_sum_alim2);
        $("#hora_sum_alim3").val(data.hora_sum_alim3);
        $("#obser_atmo").val(data.obser_atmo);
        $("#obser_gen_cult").val(data.obser_gen_cult);
        $("#fecha").val(data.fecha);
        $("#id_cultivo").val(data.id_cultivo).trigger('change');
        $("#id_produ").val(data.id_produ).trigger('change');
        $('#id_usu').val(data.id_usu);

    });

}

// creamos la funcion guardar para insertar una nueva tabla de alimentación y vaciar los campos del formulario
function guardar(){

     var formData = new FormData($('#tabla_alim')[0]);

    $.ajax({
        url: "controller/tblalimentacion.php?op=inserttblalim",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $("#tabla_alim")[0].reset();
            swal("correcto!","Registrado Correctamente","success");
        }
    });
 }

// creamos la funcion editar para actualizar el formato
function editar(){

    var formData = new FormData($("#tabla_alim")[0]);

        $.ajax({
            url: "controller/tblalimentacion.php?op=editar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                console.log(datos);
                swal({
                    title: "A'ttia!",
                    text: " Registro Guardado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            }
        });
}


//funcion con la que capturamos el id que llega por la url
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
