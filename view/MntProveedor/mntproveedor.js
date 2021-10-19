
const inputs = document.querySelectorAll('#proveedor_form input');
const icons = document.querySelectorAll('#proveedor_form i');

const inputsedit = document.querySelectorAll('#proveedor_edit input');
const iconsedit = document.querySelectorAll('#proveedor_edit i');

const expresiones = {
	nombre_emp: /^[a-zA-Z0-9\s]{4,50}$/, // Letras, números, y espacios
	direccion_emp: /^[a-zA-Z0-9\#\-\s]{10,70}$/, // Letras,espacios,otros símbolos y números.
	correo_emp: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	telefono_emp: /^\d{7,10}$/, // 7 a 10 numeros.
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
inputsedit.forEach((input) =>
{
    //keyup para que se realice siempre que se presione una tecla
    input.addEventListener('keyup', validateForm);
    //blur para que se realice siempre que se presione fuera del input
    input.addEventListener('blur', validateForm);
});


function init(){

    //nos lleva a la funcion guardar una vez se presione guardar en el formulario de nuevo proveedor
    $("#proveedor_form").on("submit",function(e){
        validarDatosReg(e);
   });

   //nos lleva a la funcion editar una vez se presione guardar en el modal del proveedor
    $("#proveedor_edit").on("submit",function(e){
        validarDatosMod(e);
    });

}


//nos lleva a la funcion listarDatos una vez se de clic en el boton consultar
$(document).on("click","#consul_prove",function(e){

    listarDatos();

});

//nos lleva a la funcion MostrarDatos una vez se de clic en el boton modificar
$(document).on("click","#modi_prove",function(e){

    MostrarDatos();

});

//nos lleva a la funcion MostrarDatos una vez se de clic en el boton modificar
$(document).on("click","#elim_prove",function(e){

    var id_prove = $('#id_prove').val();
    eliminar(id_prove);

});

$(document).ready(function() {

    listarSelectProve();

    //para ocultar la sección donde se muestra la información del proveedor
   $("#infoproveedor").hide();

});

function validateForm(e)
{
    switch (e.target.name) {
        case 'nombre_emp':
            validateData(expresiones.nombre_emp, e.target, 'nombre');
        break;

        case 'direccion_emp':
            validateData(expresiones.direccion_emp, e.target, 'direccion');
        break;

        case 'correo_emp':
            validateData(expresiones.correo_emp, e.target, 'correo');
        break;

        case 'telefono_emp':
            validateData(expresiones.telefono_emp, e.target, 'telefono');
        break;
    }
}

function validateData(expresion, input, campo)
{
    if (expresion.test(input.value))
    {
        $('#'+campo+'_emp').removeClass('form-control-danger');
        $('#'+campo+'_icon').removeClass('text-danger');
        $('#'+campo+'_emp').addClass('form-control-success');
        $('#'+campo+'_icon').addClass('text-success');
        $('#'+campo+'_alert').prop('hidden', true);

        $('#'+campo+'_emp1').removeClass('form-control-danger');
        $('#'+campo+'_icon1').removeClass('text-danger');
        $('#'+campo+'_emp1').addClass('form-control-success');
        $('#'+campo+'_icon1').addClass('text-success');
        $('#'+campo+'_alert1').prop('hidden', true);
    }else {
        $('#'+campo+'_emp').addClass('form-control-danger');
        $('#'+campo+'_icon').addClass('text-danger');
        $('#'+campo+'_alert').prop('hidden', false);

        $('#'+campo+'_emp1').addClass('form-control-danger');
        $('#'+campo+'_icon1').addClass('text-danger');
        $('#'+campo+'_alert1').prop('hidden', false);
    }
}


//para validacion de datos vacios
function validarDatosReg(e){
    e.preventDefault();

    let valite_nombre_emp = $('#nombre_emp').hasClass('form-control-danger');
    let valite_direccion_emp = $('#direccion_emp').hasClass('form-control-danger');
    let valite_telefono_emp = $('#telefono_emp').hasClass('form-control-danger');
    let valite_correo_emp = $('#correo_emp').hasClass('form-control-danger');

    if ($('#nombre_emp').val()=='' || $('#direccion_emp').val()=='' || $('#telefono_emp').val()=='' || $('#correo_emp').val()=='')
    {
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_nombre_emp || valite_direccion_emp || valite_telefono_emp || valite_correo_emp) {
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "OK"
        });
    }else{
        guardar();

        $('#proveedor_form')[0].reset();
        //función que al pasar dos segundos luego de guardar el nuevo registro, hace que se recargue la pagina
        setTimeout(function(){
            window.location.reload();
        }, 2000);
    }
}

//para validacion de datos vacios
function validarDatosMod(e){
    e.preventDefault();

    let valite_nombre_emp = $('#nombre_emp1').hasClass('form-control-danger');
    let valite_direccion_emp = $('#direccion_emp1').hasClass('form-control-danger');
    let valite_telefono_emp = $('#telefono_emp1').hasClass('form-control-danger');
    let valite_correo_emp = $('#correo_emp1').hasClass('form-control-danger');

    if($('#nombre_emp1').val()=='' || $('#direccion_emp1').val()=='' || $('#telefono_emp1').val()=='' || $('#correo_emp1').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_nombre_emp || valite_direccion_emp || valite_telefono_emp || valite_correo_emp) {
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "OK"
        });
    }else{
        editar();
        //función que al pasar dos segundos luego de guardar el nuevo registro, hace que se recargue la pagina
        setTimeout(function(){
            window.location.reload();
        }, 2000);
    }
}

// creamos la funcion guardar para insertar un proveedor y vaciar los campos del formulario
function guardar(){

    var formData = new FormData($("#proveedor_form")[0]);

        $.ajax({
            url: "controller/proveedor.php?op=guardar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                console.log(datos);
                $('#proveedor_form')[0].reset();
                listarSelectProve();

                swal({
                    title: "Correcto!",
                    text: " Registro Guardado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            }
        });
}

// creamos la funcion editar para actualizar un proveedor
function editar(){

    var formData = new FormData($("#proveedor_edit")[0]);

        $.ajax({
            url: "controller/proveedor.php?op=editar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                console.log(datos);
                $("#modalproveedor").modal('hide');
                listarDatos();
                listarSelectProve();

                swal({
                    title: "A'ttia!",
                    text: " Registro Guardado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            }
        });
}

//para consultar y listar datos del proveedor
function listarDatos()
{

    var id_prove = $('#id_prove').val();

    $.post('controller/proveedor.php?op=listarDatosProve', {id_prove:id_prove}, function(data)
    {
        data = JSON.parse(data);

        $('#nombre').html(data.nombre_emp);
        $('#direccion').html(data.direccion_emp);
        $('#numeroTelefono').html(data.telefono_emp);
        $('#email').html(data.correo_emp);
    });

    //para mostrar la sección donde se muestra la información del proveedor
    $("#infoproveedor").show();
}

function listarSelectProve(){

    /* Esto es para llenar el select del Nombre del Proveedor */
    $.post("controller/producto.php?op=nom_proveedores",function(data, status){
        $('#id_prove').html(data);
    });

}

//para llenar el modal con datos del proveedor
function MostrarDatos()
{
    var id_prove = $('#id_prove').val();

    $.post('controller/proveedor.php?op=listarDatosProve', {id_prove:id_prove}, function(data)
    {
        data = JSON.parse(data);

        $('#id_prove1').val(data.id_prove);
        $('#nombre_emp1').val(data.nombre_emp);
        $('#direccion_emp1').val(data.direccion_emp);
        $('#telefono_emp1').val(data.telefono_emp);
        $('#correo_emp1').val(data.correo_emp);
    });

    //para mostrar la sección donde se muestra la información del proveedor
    $('#modalproveedor').modal('show');
}

//para eliminar un proveedor
function eliminar(id_prove){

    swal({
        title: "Advertencia!",
        text: "Esta seguro de Eliminar el Proveedor?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {

            $.post("controller/proveedor.php?op=eliminar", { id_prove:id_prove }, function (data) {
                listarDatos();
                listarSelectProve();
                $("#infoproveedor").hide();
            });


            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}
init();