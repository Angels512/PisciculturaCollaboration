function init(){

    /* Esto es para llenar el select del Cultivo del formato consultar y actualizar*/
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('#id_cultivo1').html(data);
    });

    /* Esto es para llenar el select del Producto Suministrado del formato consultar y actualizar*/
    $.post("controller/producto.php?op=productos",function(data, status){
        $('#id_produ1').html(data);
    });

    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del formato de Tabla de Alimentación
    $("#tabla_alim").on("submit",function(e){
        guardar(e);
   });

   //nos lleva a la funcion editar una vez se presione guardar en el formulario de actualizar Tabla de Alimentación
    $("#tabla_alim_edit").on("submit",function(e){
        editar(e);
    });

   //condición para saber si se va a consultar o modificar segun informacion que llegue de la url
    if(getUrlParameter('ID')){

        var id_tbl_alim =  getUrlParameter('ID');
        listarDatos(id_tbl_alim);

        //para ocultar los botones de modales novedad y mortalidad
        $("#newmortalidad").hide();
        $("#newnovedad").hide();

        //para ocultar el boton de guardar
        $("#guardar").hide();

    }else if(getUrlParameter('EDIT')){

        var id_tbl_alim =  getUrlParameter('EDIT');
        listarDatos(id_tbl_alim);

        //para ocultar los botones de modales novedad y mortalidad
        $("#newmortalidad").hide();
        $("#newnovedad").hide();

        //para cambiar el titulo del formulario
        $("#titulotbla").html('Actualizar Tabla de Alimentación');

        //para mostrar el boton de guardar
        $("#guardar").show();

    }
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

//funcion con la que capturamos el id que llega por la url
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

//para mostrar el modal de mortalidad una vez se de clic al boton mortandad
$(document).on("click","#newmortalidad",function(){

    $('#modalmortalidad').modal('show');
});


//para mostrar el modal de novedad una vez se de clic al boton mortandad
$(document).on("click","#newnovedad",function(){

    $('#modalnovedad').modal('show');
});

// creamos la funcion guardar para insertar una nueva tabla de alimentación y vaciar los campos del formulario
function guardar(e){
    e.preventDefault();

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

 //listar datos de tbl alimentacion para consultar o actualizar
function listarDatos(id_tbl_alim)
{

    $.post('controller/tblalimentacion.php?op=listarDatosTblAlim', {id_tbl_alim:id_tbl_alim}, function(data)
    {
        data = JSON.parse(data);

        $('#id_tbl_alim1').val(data.id_tbl_alim);
        $('#cant_siembra1').val(data.cant_siembra);
        $("#porc_proteina1").val(data.porc_proteina).trigger('change');
        $("#hora_sum_alim1p").val(data.hora_sum_alim1);
        $("#hora_sum_alim2p").val(data.hora_sum_alim2);
        $("#hora_sum_alim3p").val(data.hora_sum_alim3);
        $("#obser_atmo1").val(data.obser_atmo);
        $("#obser_gen_cult1").val(data.obser_gen_cult);
        $("#fecha1").val(data.fecha);
        $("#id_cultivo1").val(data.id_cultivo).trigger('change');
        $("#id_produ1").val(data.id_produ).trigger('change');
        $('#id_usu1').val(data.id_usu);

    });

}

// creamos la funcion editar para actualizar el formato
function editar(e){
    e.preventDefault();

    var formData = new FormData($("#tabla_alim_edit")[0]);

        $.ajax({
            url: "controller/tblalimentacion.php?op=editar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){
                console.log(datos);
                swal({
                    title: "A'ttia!",
                    text: " Registro Guardado.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            }
        });
}




init();
