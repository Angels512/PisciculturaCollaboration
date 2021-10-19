const inputs = document.querySelectorAll('#responsable_form input');
const icons = document.querySelectorAll('#responsable_form i');

const expresiones = {
	nombre_respon: /^[a-zA-Z\s]{3,25}$/, // Letras y espacios
	apellido_respon: /^[a-zA-Z\s]{3,25}$/, // Letras y espacios
}

// Por cada input del formulario se realiza la validacion
inputs.forEach((input) =>
{
    //keyup para que se realice siempre que se presione una tecla
    input.addEventListener('keyup', validateForm);
    //blur para que se realice siempre que se presione fuera del input
    input.addEventListener('blur', validateForm);
});

function init(){
    // Nos dirige a la funcion guardaryeditar una vez se le de clic al boton guardar del formulario del responsable
    $("#responsable_form").on("submit",function(e){
        validarDatos(e);
    });
}


$(document).ready(function()
{
    listarResponsables();
});

function validateForm(e)
{
    switch (e.target.name) {
        case 'nombre_respon':
            validateData(expresiones.nombre_respon, e.target, 'nombre');
        break;

        case 'apellido_respon':
            validateData(expresiones.apellido_respon, e.target, 'apellido');
        break;
    }
}

function validateData(expresion, input, campo)
{
    if (expresion.test(input.value))
    {
        $('#'+campo+'_respon').removeClass('form-control-danger');
        $('#'+campo+'_icon').removeClass('text-danger');
        $('#'+campo+'_respon').addClass('form-control-success');
        $('#'+campo+'_icon').addClass('text-success');
        $('#'+campo+'_alert').prop('hidden', true);

    }else {
        $('#'+campo+'_respon').addClass('form-control-danger');
        $('#'+campo+'_icon').addClass('text-danger');
        $('#'+campo+'_alert').prop('hidden', false);
    }
}

function validarDatos(e){
    e.preventDefault();

    let valite_nombre_respon = $('#nombre_respon').hasClass('form-control-danger');
    let valite_apellido_respon = $('#apellido_respon').hasClass('form-control-danger');

    if($('#nombre_respon').val()=='' ||$('#apellido_respon').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_nombre_respon || valite_apellido_respon) {
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "OK"
        });
    }else{
        guardaryeditar();
    }
}

// creamos la funcion guardaryeditar para insertar y actualizar un responsable y vaciar los campos del formulario
function guardaryeditar(){

    var formData = new FormData($('#responsable_form')[0]);

    var idrespon = $('#id_respon').val();
    console.log(idrespon);

    $.ajax({
        url: "controller/responsable.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $("#modalresponsable").modal('hide');

            listarResponsables();
            swal("Correcto!","Registrado Correctamente","success");
        }
    });
}


$(document).on("click","#newrespon",function(){
    $('#responsable_form')[0].reset();
    $('#titulores').html('Nuevo Responsable');
    /* Para mostrar el modal del responsable una vez se de click al boton newresponsable*/
    $('#modalresponsable').modal('show');
});


// LLevar toda la lista de responsables a la vista
function listarResponsables()
{
    $.post("controller/responsable.php?op=listarespon", {}, function(data)
    {
        // Esta es la sección donde se visualizan los responsables
        $('#listaresponsables').html(data);
    });
}


function modalRespon(id_respon)
{
    $('#titulores').html('Modificar Responsable');
    MostrarDatos(id_respon);

}


//para llenar el modal con datos del responsable
function MostrarDatos(id_respon)
{

    $.post('controller/responsable.php?op=listarDatosRespon', {id_respon:id_respon}, function(data)
    {
        data = JSON.parse(data);

        $('#id_respon').val(data.id_respon);
        $('#nombre_respon').val(data.nombre_respon);
        $('#apellido_respon').val(data.apellido_respon);

    });

    //para mostrar el modal donde se muestra la información del responsable
    $('#modalresponsable').modal('show');
}

// Eliminar cultivo
function deleteRespon(id_respon)
{
    swal({
        title: "Advertencia!",
        text: "Esta seguro de Eliminar el Responsable?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {

            $.post("controller/responsable.php?op=eliminar", { id_respon:id_respon }, function (data) {});

            listarResponsables();
            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
};

init();