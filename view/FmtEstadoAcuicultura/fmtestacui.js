function init(){

    $("#estacui_form").on("submit",function(e){
         guardaryeditar(e); 
    })

}

// creamos la funcion guardaryeditar para insertar y vaciar los campos del formulario

function guardaryeditar(e){
    e.preventDefault();
 
    /* var variable = $('#obser_adic').val();
    console.log(variable); */
    var formData = new FormData($('#estacui_form')[0]);
    
    $.ajax({
        url: "controller/estadoacuicultura.php?op=insertEstacui",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#obser_gene').val('');
           
            swal("correcto!","Registrado Correctamente","success");
        }
    }); 
 }
   
init(); 