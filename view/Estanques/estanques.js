const inputs = document.querySelectorAll('#estanque_form input');
const icons = document.querySelectorAll('#estanque_form i');


// Por cada input del formulario se realiza la validacion
inputs.forEach((input) =>
{
    //keyup para que se realice siempre que se presione una tecla
    input.addEventListener('keyup', validateForm);
    //blur para que se realice siempre que se presione fuera del input
    input.addEventListener('blur', validateForm);
});

function init(){
    // Nos dirige a la funcion guardaryeditar una vez se le de clic al boton guardar del formulario del estanque
    $("#estanque_form").on("submit",function(e){
        validarDatos(e);
    });
}


$(document).ready(function()
{
    listarEstanques();
});

function validateForm(e)
{
    switch (e.target.name) {
        case 'num_tanque':
            validateData(expresiones.num_tanque, e.target, 'num_tanque');
        break;

        case 'capacidad_tanque':
            validateData(expresiones.capacidad_tanque, e.target, 'capacidad_tanque');
        break;
    }
}

function validateData(expresion, input, campo)
{
    if (expresion.test(input.value))
    {
        $('#'+campo+'_tanque').removeClass('form-control-danger');
        $('#'+campo+'_icon').removeClass('text-danger');
        $('#'+campo+'_tanque').addClass('form-control-success');
        $('#'+campo+'_icon').addClass('text-success');
        $('#'+campo+'_alert').prop('hidden', true);

    }else {
        $('#'+campo+'_tanque').addClass('form-control-danger');
        $('#'+campo+'_icon').addClass('text-danger');
        $('#'+campo+'_alert').prop('hidden', false);
    }
}

function validarDatos(e){
    e.preventDefault();

    let valite_num_tanque = $('#num_tanque').hasClass('form-control-danger');
    let valite_capacidad_tanque = $('#capacidad_tanque').hasClass('form-control-danger');

    if($('#num_tanque').val()=='' ||$('#capacidad_tanque').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_num_tanque || valite_capacidad_tanque) {
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

// creamos la funcion guardaryeditar para insertar y actualizar un estanque y vaciar los campos del formulario
function guardaryeditar(){

    var formData = new FormData($('#estanque_form')[0]);

    var idtanque = $('#id_tanque').val();
    console.log(idtanque);

    $.ajax({
        url: "controller/estanque.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $("#modalestanque").modal('hide');

            listarEstanques();
            swal("Correcto!","Registrado Correctamente","success");
        }
    });
}


$(document).on("click","#newtanque",function(){
    $('#estanque_form')[0].reset();
    $('#titulores').html('Nuevo Estanque');
    /* Para mostrar el modal del estanque una vez se de click al boton newestanque*/
    $('#modalestanque').modal('show');
});


// LLevar toda la lista de estanques a la vista
function listarEstanques()
{
    $.post("controller/estanque.php?op=listartanque", {}, function(data)
    {
        // Esta es la sección donde se visualizan los estanques
        $('#listarestanques').html(data);
    });
}


function modalTanque(id_tanque)
{
    $('#titulores').html('Modificar Estanque');
    MostrarDatos(id_tanque);

}


//para llenar el modal con datos del estanque
function MostrarDatos(id_tanque)
{

    $.post('controller/estanque.php?op=listarDatosTanque', {id_tanque:id_tanque}, function(data)
    {
        data = JSON.parse(data);

        $('#id_tanque').val(data.id_tanque);
        $('#num_tanque').val(data.num_tanque);
        $('#capacidad_tanque').val(data.capacidad_tanque);
        $('#desc_tanque').val(data.desc_tanque);

    });

    //para mostrar el modal donde se muestra la información del estanque
    $('#modalestanque').modal('show');
}

// Eliminar cultivo
function deleteTanque(id_tanque)
{
    swal({
        title: "Advertencia!",
        text: "Esta seguro de Eliminar el Estanque?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {

            $.post("controller/estanque.php?op=eliminar", { id_tanque:id_tanque }, function (data) {});

            listarEstanques()

            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });

            ajax.reload();
        }
    });
};

init();