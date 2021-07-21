
$(document).on("click","#inser_prove",function(e){
    
     guardaryeditar(e); 
});
    
// creamos la funcion guardaryeditar para insertar un proveedor y vaciar los campos del formulario
function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($('#proveedor_form')[0]);
    
    $.ajax({
        url: "controller/proveedor.php?op=insertproveedor",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#nombre_emp').val('');
            $('#direccion_emp').val('');
            $('#telefono_emp').val('');
            $('#correo_emp').val('');
            swal("correcto!","Registrado Correctamente","success");
        }
    });
}

    
init(); 