function init(){

    //nos lleva a la funcion guardar una vez se presione guardar en el formulario de nuevo producto
    $("#product_form").on("submit",function(e){
        guardar(e);
   });

   //nos lleva a la funcion editar una vez se presione guardar en el modal del producto
    $("#product_edit").on("submit",function(e){
         editar(e);
    });

}


$(document).ready(function() {

    /* Para inicializar la funcion del calendario para la fecha*/
      $('.daterange3').daterangepicker({
        singleDatePicker: true,
         "locale": {
            "format": "YYYY-MM-DD",
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
        }
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

});

//nos lleva a la funcion listarDatos una vez se de clic en el boton consultar
$(document).on("click","#consul_produ",function(e){

   listarDatos();

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

// creamos la funcion guardaryeditar para insertar un proveedor y vaciar los campos del formulario
function guardar(e){
    e.preventDefault();

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
            swal("correcto!","Registrado Correctamente","success");
        }
    });
}

// creamos la funcion editar para actualizar un producto
function editar(e){
    e.preventDefault();

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