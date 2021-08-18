function init(){

    $("#tempamb_form").on("submit",function(e){
         guardaryeditar(e); 
    })

}

$(document).ready(function(){

    /* Esto es para llenar el select del Cultivo */
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('#id_cultivo').html(data);
    });

    $("#grados1").ionRangeSlider({
        min: 0.1,
        max: 100,
        grid: true,
        hide_min_max: true
    });

    $("#grados2").ionRangeSlider({
        min: 0.1,
        max: 100,
        grid: true,
        hide_min_max: true
    });

    $("#grados3").ionRangeSlider({
        min: 0.1,
        max: 100,
        grid: true,
        hide_min_max: true
    });

});



// creamos la funcion guardaryeditar para insertar y vaciar los campos del formulario

function guardaryeditar(e){
    e.preventDefault();
 
    /* var variable = $('#obser_adic').val();
    console.log(variable); */
    var formData = new FormData($('#tempamb_form')[0]);
    
    $.ajax({
        url: "controller/temperaturaambiente.php?op=insertTempamb",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#obser_adic').val('');
           
            swal("correcto!","Registrado Correctamente","success");
        }
    }); 
 }
   
init(); 