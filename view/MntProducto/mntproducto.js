$(document).on("click","#inser_produ",function(e){

     guardaryeditarprodu(e);  
});


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

     /* Esto es para llenar el select del Producto a Consultar */
     $.post("controller/producto.php?op=productos",function(data, status){
        $('#id_produ').html(data);
    });
});


// creamos la funcion guardaryeditar para insertar un proveedor y vaciar los campos del formulario
function guardaryeditarprodu(e){
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
            swal("correcto!","Registrado Correctamente","success");
        }
    }); 
}


$(document).on("click","#newproveedor",function(){

    /* Para mostrar el modal del proveedor una vez se de click al boton newproveedor*/
    $('#modalproveedor').modal('show');
});

init();