function init(){

    // Nos dirige a la funcion guardaryeditar una vez se le de clic al boton guardar del formato de Tabla de Alimentación
    $("#tabla_alim").on("submit",function(e){
        guardaryeditar(e); 
   })

}


$(document).ready(function() {

    /* Para inicializar la funcion del calendario para la hora*/
    $('.hora').datetimepicker({
        widgetPositioning: {
            horizontal: 'right'
        },
        format: 'LT',
        debug: false
    });

    /* Esto es para llenar el select del Cultivo */
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('#id_cultivo').html(data);
    });

    /* Esto es para llenar el select del Producto Suministrado */
    $.post("controller/producto.php?op=productos",function(data, status){
        $('#id_produ').html(data);
    });

});


//para mostrar el modal de mortalidad una vez se de clic al boton mortandad
$(document).on("click","#newmortalidad",function(){

    $('#modalmortalidad').modal('show');
});


//para mostrar el modal de novedad una vez se de clic al boton mortandad
$(document).on("click","#newnovedad",function(){

    $('#modalnovedad').modal('show');
});

// creamos la funcion guardaryeditar para insertar una nueva tabla de alimentación y vaciar los campos del formulario
function guardaryeditar(e){
    e.preventDefault();
 
     /* var variable = $('#obser_gen_cult').val();
    console.log(variable);   */ 
     
     var formData = new FormData($('#tabla_alim')[0]);
 
    $.ajax({
        url: "controller/tblalimentacion.php?op=inserttblalim",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){   
             $("#tabla_alim")[0].reset();
 
            swal("correcto!","Registrado Correctamente","success");
        }
    });  
 }
      
init(); 
