const inputs = document.querySelectorAll('#estanque_form input');
const txarea = document.querySelectorAll('#estanque_form textarea');
const icons = document.querySelectorAll('#estanque_form i');
const smallForm = document.querySelectorAll('#estanque_form small');

const expresiones = {
	num_tanque: /^[0-9]{1,2}$/, // Numeros
	capacidad_tanque: /^[0-9]{1,4}$/, // Numeros
    desc_tanque: /^.{20,200}$/, // Letras,espacios,otros símbolos y números.
}

// Por cada input del formulario se realiza la validacion
inputs.forEach((input) =>
{
    //keyup para que se realice siempre que se presione una tecla
    input.addEventListener('keyup', validateForm);
    //blur para que se realice siempre que se presione fuera del input
    input.addEventListener('blur', validateForm);
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
        case 'desc_tanque':
            validateData(expresiones.desc_tanque, e.target, 'desc_tanque');
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
    let valite_desc_tanque = $('#desc_tanque').hasClass('form-control-danger');

    if($('#num_tanque').val()=='' || $('#capacidad_tanque').val()=='' || $('#desc_tanque').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_num_tanque || valite_capacidad_tanque || valite_desc_tanque) {
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

    if ($('#capacidad_tanque').val() == '' || $('#desc_tanque').val() == '0')
    {
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        $.post('controller/estanque.php?op=tanqueExistente', {num_tanque:num_tanque}, (data) =>
        {
            
            data = JSON.parse(data);

            if (data.length > 0)
            {
                swal({
                    title: "Advertencia!",
                    text: "El número de lote ya se asigno a otro cultivo.",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "OK"
                })
            }else {
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
        });
    }

    
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