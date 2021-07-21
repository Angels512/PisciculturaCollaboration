function init(){

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
    


    
init(); 
