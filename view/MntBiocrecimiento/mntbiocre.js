function init(){

    // Nos dirige a la funcion guardaryeditar una vez se le de clic al boton guardar del formato de Biometrias de Crecimiento
    $("#biocre_form").on("submit",function(e){
         guardaryeditar(e); 
    })

}

$(document).ready(function(){

    /* Esto es para llenar el select de las etapas */
    $.post("controller/etapa.php?op=etapas",function(data, status){
        $('#id_etapa').html(data);
    });

    /* Esto es para llenar el select del Cultivo */
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('#id_cultivo').html(data);
    });

    /*Sliders Rangos*/
    $("#peso_organ").ionRangeSlider({
        min: 1,
        max: 500,
        grid: true,
        hide_min_max: true
    });

    $("#peso_biomasa").ionRangeSlider({
        min: 1,
        max: 500,
        grid: true,
        hide_min_max: true
    });

    $("#edad_organ").ionRangeSlider({
        min: 1,
        max: 24,
        grid: true,
        hide_min_max: true
    });

    $("#crecimiento_organ").ionRangeSlider({
        min: 1,
        max: 35,
        grid: true,
        hide_min_max: true
    });
});

// creamos la funcion guardaryeditar para insertar una nueva biometria y vaciar los campos del formulario
function guardaryeditar(e){
   e.preventDefault();

    /* var variable = $('#num_organ').val();
    console.log(variable);   */
    
   var formData = new FormData($('#biocre_form')[0]);

   $.ajax({
       url: "controller/biocrecimiento.php?op=insertbiocre",
       type: "POST",
       data: formData,
       contentType: false,
       processData: false,
       success: function(datos){   
            $("#biocre_form")[0].reset();

           swal("Correcto!","Registrado Correctamente","success");
       }
   }); 
}

   
init(); 






