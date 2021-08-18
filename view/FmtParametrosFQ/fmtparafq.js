function init(){

    $("#parafq_form").on("submit",function(e){
         guardaryeditar(e); 
    })

}

$(document).ready(function(){

    /* Esto es para llenar el select del Cultivo */
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('#id_cultivo').html(data);
    });

    /*Sliders Rangos*/
    $("#rango_amonio").ionRangeSlider({
        min: 0.1,
        max: 100,
        grid: true,
        hide_min_max: true
    });

    $("#rango_nitrito").ionRangeSlider({
        min: 0.1,
        max: 100,
        grid: true,
        hide_min_max: true
    });

    $("#rango_nitrato").ionRangeSlider({
        min: 0.1,
        max: 100,
        grid: true,
        hide_min_max: true
    });

    $("#rango_ph").ionRangeSlider({
        min: 0.1,
        max: 100,
        grid: true,
        hide_min_max: true
    });

    
    $("#cant_melaza").ionRangeSlider({
        min: 0,
        max: 100,
        grid: true,
        hide_min_max: true
    })

    $("#porc_agua").ionRangeSlider({
        min: 0,
        max: 100,
        grid: true,
        hide_min_max: true
    })

});

// creamos la funcion guardaryeditar para insertar y vaciar los campos del formulario
function guardaryeditar(e){
    e.preventDefault();
 
    /* var variable = $('#obser_adic').val();
    console.log(variable); */
    var formData = new FormData($('#parafq_form')[0]);
    
    $.ajax({
        url: "controller/parametrosfq.php?op=insertParafq",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#observ_parafq').val('');
           
            swal("correcto!","Registrado Correctamente","success");
        }
    }); 
 }
   
init(); 