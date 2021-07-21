function init(){

    // Nos dirige a la funcion guardaryeditar una vez se le de clic al boton guardar del formulario del responsable
    $("#responsable_form").on("submit",function(e){
        guardaryeditar(e);
    });
}


// creamos la funcion guardaryeditar para insertar un responsable y vaciar los campos del formulario
function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($('#responsable_form')[0]);

    $.ajax({
        url: "controller/responsable.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#nombre_respon').val('');
            $('#apellido_respon').val('');
            swal("correcto!","Registrado Correctamente","success");
        }
    });
}




init();