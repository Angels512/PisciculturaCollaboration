const inputs = $('#product_form input');
const icons = document.querySelectorAll('#product_form i');

const inputsedit = $('#product_edit input');
const iconsedit = document.querySelectorAll('#product_edit i');
const smallForm = document.querySelectorAll('#product_edit small');

const expresiones = {
	num_lote: /^[Rr]{1}[0-9]{10,15}$/, // Solo R min y mayus y números.
}

// Por cada input del formulario se realiza la validacion
for (let i=0; i < inputs.length; i++)
{
    let input_id = $(`#${inputs[i].id}`);

    inputs[i].id == 'fech_venc' ? input_id.change(validateForm) : '';
    input_id.keyup(validateForm);
}

// Por cada input del formulario se realiza la validacion
for (let f=0; f < inputsedit.length; f++)
{
    let inputs_id = $(`#${inputsedit[f].id}`);

    inputsedit[f].id == 'fech_venc1' ? inputs_id.change(validateForm) : '';
    inputs_id.keyup(validateForm);
}


function init(){

    //nos lleva a la funcion guardar una vez se presione guardar en el formulario de nuevo producto
    $("#product_form").on("submit",function(e){
        validarDatosReg(e);
   });

   //nos lleva a la funcion editar una vez se presione guardar en el modal del producto
    $("#product_edit").on("submit",function(e){
        validarDatosMod(e);
    });

}


$(document).ready(function() {

    let date = new Date();
    let fecha = (date.getDate() + 1) + '-' + (date.getMonth() + 1) + '-' + date.getFullYear();

    /* Para inicializar la funcion del calendario para la fecha*/
    $('.daterange').daterangepicker({
        singleDatePicker: true,
        "locale": {
            "format": "DD-MM-YYYY",
            "separator": " - ",
            "daysOfWeek": [
                "Do",
                "Lu",
                "Ma",
                "Mi",
                "Ju",
                "Vi",
                "Sa"
            ],
            "monthNames": [
                "Enero",
                "Febrero",
                "Marzo",
                "Abril",
                "Mayo",
                "Junio",
                "Julio",
                "Agosto",
                "Setiembre",
                "Octubre",
                "Noviembre",
                "Diciembre"
            ],
            "firstDay": 1
        },
        /* "startDate": fecha */
    });

    /* Esto es para llenar el select del Nombre del Producto */
    $.post("controller/claseProducto.php?op=clases",function(data, status){
        $('#id_clase').html(data);
    });

    /* Esto es para llenar el select del Nombre del Proveedor */
    $.post("controller/producto.php?op=nom_proveedores",function(data, status){
        $('#id_prove').html(data);
    });

    /* Esto es para llenar el select del Nombre del Producto del modal modificar*/
    $.post("controller/claseProducto.php?op=clases",function(data, status){
        $('#id_clase1').html(data);
    });

    /* Esto es para llenar el select del Nombre del Proveedor del modal modificar*/
    $.post("controller/producto.php?op=nom_proveedores",function(data, status){
        $('#id_prove1').html(data);
    });

     /* Esto es para llenar el select del Producto a Consultar */
    listarSelectProduct();

    //para ocultar la sección donde se muestra la información del producto
    $("#infoproducto").hide();

    //Para quitar la validación apenas se ingrese al form
    $('#fech_venc').removeClass('form-control-success');
});

//nos lleva a la funcion MostrarDatos una vez se de clic en el boton modificar
$(document).on("click","#modi_produ",function(e){

    MostrarDatos();

});

//nos lleva a la funcion MostrarDatos una vez se de clic en el boton modificar
$(document).on("click","#elim_produ",function(e){

    var id_produ = $('#id_produ').val();
    eliminar(id_produ);

});

function validateForm(e)
{

    switch (e.target.name) {
        case 'num_lote':
            validateData(expresiones.num_lote, e.target, 'num_lote');
        break;

        case 'fech_venc':
            let date = new Date();
            var fech_venc = $('#fech_venc').val().split("-");
            let fecha_select = new Date(`${fech_venc[2]}-${fech_venc[1]}-${fech_venc[0]}`);

            date.setHours(0,0,0,0);
            fecha_select.setHours(0,0,0,0);

            if(date<=fecha_select){
                $('#fech_venc').removeClass('form-control-danger');
                $('#fech_venc').addClass('form-control-success');
                $('#fech_venc_alert').prop('hidden', true);
            }else {
                $('#fech_venc').addClass('form-control-danger');
                $('#fech_venc_alert').prop('hidden', false);
            }

            var fech_venc1 = $('#fech_venc1').val().split("-");
            let fecha_select1 = new Date(`${fech_venc1[2]}-${fech_venc1[1]}-${fech_venc1[0]}`);

            date.setHours(0,0,0,0);
            fecha_select1.setHours(0,0,0,0);

            if(date<=fecha_select1){
                $('#fech_venc1').removeClass('form-control-danger');
                $('#fech_venc1').addClass('form-control-success');
                $('#fech_venc_alert1').prop('hidden', true);
            }else {
                $('#fech_venc1').addClass('form-control-danger');
                $('#fech_venc_alert1').prop('hidden', false);
            }
        break;
    }
}

function validateData(expresion, input, campo)
{
    if (expresion.test(input.value))
    {
        $('#'+campo).removeClass('form-control-danger');
        $('#'+campo+'_icon').removeClass('text-danger');
        $('#'+campo).addClass('form-control-success');
        $('#'+campo+'_icon').addClass('text-success');
        $('#'+campo+'_alert').prop('hidden', true);

        $('#'+campo+'1').removeClass('form-control-danger');
        $('#'+campo+'_icon1').removeClass('text-danger');
        $('#'+campo+'1').addClass('form-control-success');
        $('#'+campo+'_icon1').addClass('text-success');
        $('#'+campo+'_alert1').prop('hidden', true);
    }else {
        $('#'+campo).addClass('form-control-danger');
        $('#'+campo+'_icon').addClass('text-danger');
        $('#'+campo+'_alert').prop('hidden', false);

        $('#'+campo+'1').addClass('form-control-danger');
        $('#'+campo+'_icon1').addClass('text-danger');
        $('#'+campo+'_alert1').prop('hidden', false);
    }
}

//para validacion de datos vacios
function validarDatosReg(e){
    e.preventDefault();

    let valite_num_lote = $('#num_lote').hasClass('form-control-danger');
    let valite_fech_venc = $('#fech_venc').hasClass('form-control-danger');

    if($('#num_lote').val()=='' || $('#fech_venc').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_num_lote || valite_fech_venc) {
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "OK"
        });
    }else{
        guardar();

        //función que al pasar dos segundos luego de guardar el nuevo registro, hace que se recargue la pagina
        /* setTimeout(function(){
            window.location.reload();
        }, 4000); */
    }
}

//para validacion de datos vacios
function validarDatosMod(e){
    e.preventDefault();

    let valite_num_lote = $('#num_lote1').hasClass('form-control-danger');
    let valite_fech_venc = $('#fech_venc1').hasClass('form-control-danger');

    if($('#num_lote1').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_num_lote || valite_fech_venc) {
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
        /* setTimeout(function(){
            window.location.reload();
        }, 4000); */
    }
}

// creamos la funcion guardaryeditar para insertar un proveedor y vaciar los campos del formulario
function guardar(){

    var formData = new FormData($('#product_form')[0]);

    $.ajax({
        url: "controller/producto.php?op=insertproducts",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#num_lote').val('');
            listarSelectProduct();
            swal("Correcto!","Registrado Correctamente","success");
        }
    });
}

// creamos la funcion editar para actualizar un producto
function editar(){

    var formData = new FormData($("#product_edit")[0]);

        $.ajax({
            url: "controller/producto.php?op=editar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                console.log(datos);
                $("#modalproduc").modal('hide');

                listarDatos();
                listarSelectProduct();
                swal({
                    title: "A'ttia!",
                    text: " Registro Guardado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            }
        });
}


//para consultar y listar datos del producto
function listarDatos()
{
    var id_produ = $('#id_produ').val();

    $.post('controller/producto.php?op=listarDatosProdu', {id_produ:id_produ}, function(data)
    {
        data = JSON.parse(data);

        $('#nombreprodu').html(data.nombre_clase);
        $('#fechavenc').html(data.fech_venc);
        $('#numeroLote').html(data.num_lote);
        $('#proveedor').html(data.nombre_emp);
    });

    //para mostrar la sección donde se muestra la información del producto
    $("#infoproducto").show();
}

function listarSelectProduct()
{
    $.post("controller/producto.php?op=productos",function(data, status){
        $('#id_produ').html(data);
    });
}

//para llenar el modal con datos del producto
function MostrarDatos()
{
    var id_produ = $('#id_produ').val();

    $.post('controller/producto.php?op=listarDatosProdu', {id_produ:id_produ}, function(data)
    {
        data = JSON.parse(data);

        $('#id_produ1').val(data.id_produ);
        $('#id_clase1').val(data.id_clase).trigger('change');
        $('#fech_venc1').val(data.fech_venc);
        $('#num_lote1').val(data.num_lote);
        $("#id_prove1").val(data.id_prove).trigger('change');
    });

    cleanValidation();
    //para mostrar la sección donde se muestra la información del producto
    $('#modalproduc').modal('show');
}

//para eliminar un producto
function eliminar(id_produ){

    console.log(id_produ);
    swal({
        title: "Advertencia",
        text: "Esta seguro de Eliminar el Producto?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {

            $.post("controller/producto.php?op=eliminar", { id_produ:id_produ }, function (data) {
                listarDatos();
                listarSelectProduct();
                $("#infoproducto").hide();
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

//funcion para remover las clases del modal
function cleanValidation(){

    let inputedit = document.querySelectorAll('#product_edit input');
    // Esconder borde de inputs
    inputedit.forEach((input)=>{
        input.classList.remove('form-control-danger');
        input.classList.remove('form-control-success');
    });

    // Esconder color de iconos
    iconsedit.forEach((icon)=>{
        icon.classList.remove('text-danger');
        icon.classList.remove('text-success');
    });

    // Esconder borde de inputs
    smallForm.forEach((small)=>{
        small.hidden=true;
    });

}

init();