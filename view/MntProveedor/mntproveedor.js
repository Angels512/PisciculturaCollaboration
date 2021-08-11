function init(){

    //nos lleva a la funcion guardar una vez se presione guardar en el formulario de nuevo proveedor
    $("#proveedor_form").on("submit",function(e){
        guardar(e);  
   });

   //nos lleva a la funcion editar una vez se presione guardar en el modal del proveedor
    $("#proveedor_edit").on("submit",function(e){
         editar(e);  
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

// creamos la funcion guardar para insertar un proveedor y vaciar los campos del formulario
function guardar(e){
    e.preventDefault();

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
                    title: "HelpDesk!",
                    text: " Registro Guardado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            }
        });
}

// creamos la funcion editar para actualizar un proveedor
function editar(e){
    e.preventDefault();

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

            });

            listarDatos();
            listarSelectProve();

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