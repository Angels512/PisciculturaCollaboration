function init(){

    // Nos dirige a la funcion guardaryeditar una vez se le de clic al boton guardar del modal de mortalidad
    $("#mortalidad_form").on("submit",function(e){
     
         guardaryeditarMort(e); 
    })

    // Nos dirige a la funcion guardaryeditarN una vez se le de clic al boton guardar del modal de novedad
    $("#novedad_form").on("submit",function(e){
        guardaryeditarNov(e);
    })

}


$(document).ready(function() {

    /* Esto es para llenar el select del Cultivo */
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
         $('.cultivo').html(data); 
    });   

});

    

// creamos la funcion guardaryeditar para insertar la mortalidad y vaciar los campos del formulario
function guardaryeditarMort(e){
    e.preventDefault();
    var formData = new FormData($('#mortalidad_form')[0]);
    
    $.ajax({
        url: "controller/mortalidad.php?op=insertMortalidad",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){

            $('#reg_mortandad').val('');
            swal("correcto!","Registrado Correctamente","success");
        }
    });
}

// creamos la funcion guardaryeditar para insertar una novedad y vaciar los campos del formulario
function guardaryeditarNov(e){
    e.preventDefault();
    var formData = new FormData($('#novedad_form')[0]);
    
    $.ajax({
        url: "controller/novedad.php?op=insertNovedad",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){

            $('#medidad_prev').val('');
            swal("correcto!","Registrado Correctamente","success");
        }
    });
}
    
init(); 
