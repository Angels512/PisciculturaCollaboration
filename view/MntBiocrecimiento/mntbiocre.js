function init(){

    /* Esto es para llenar el select de las etapas en el formulario de consultar y actualizar */
    $.post("controller/etapa.php?op=etapas",function(data, status){
        $('#id_etapa1').html(data);
    });

    /* Esto es para llenar el select del Cultivo en el formulario de consultar y actualizar*/
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('#id_cultivo1').html(data);
    });

    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del formato de Biometrias de Crecimiento
    $("#biocre_form").on("submit",function(e){
        guardar(e);
    });

    //nos lleva a la funcion editar una vez se presione guardar en el formulario de actualizar biocreciemiento
    $("#biocre_edit").on("submit",function(e){
        editar(e);
   });

    //condición para saber si se va a consultar o modificar segun informacion que llegue de la url
    if(getUrlParameter('ID')){

        var id_biocre =  getUrlParameter('ID');
        listarDatos(id_biocre);

        //para ocultar el boton de guardar
        $("#guardar").hide();

    }else if(getUrlParameter('EDIT')){

        var id_biocre =  getUrlParameter('EDIT');
        listarDatos(id_biocre);

        //para cambiar el titulo del formulario
        $("#titulobio").html('Actualizar Biocrecimiento');

        //para mostrar el boton de guardar
        $("#guardar").show();

    }
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

// creamos la funcion guardar para insertar una nueva biometria y vaciar los campos del formulario
function guardar(e){
   e.preventDefault();

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

//listar datos de biocrecimiento para consultar o actualizar
function listarDatos(id_biocre)
{

    $.post('controller/biocrecimiento.php?op=listarDatosBiocre', {id_biocre:id_biocre}, function(data)
    {
        data = JSON.parse(data);

        $('#id_biocre1').val(data.id_biocre);
        $('#num_organ1').val(data.num_organ);
        $("#peso_organ1").val(data.peso_organ);
        $("#peso_biomasa1").val(data.peso_biomasa);
        $("#edad_organ1").val(data.edad_organ);
        $("#color_organ1").val(data.color_organ).trigger('change');
        $("#escamas_organ1").val(data.escamas_organ).trigger('change');
        $("#ojos_organ1").val(data.ojos_organ).trigger('change');
        $("#compor_organ1").val(data.compor_organ).trigger('change');
        $("#crecimiento_organ1").val(data.crecimiento_organ);
        $("#obser_adic1").val(data.obser_adic);
        $('#fecha1').val(data.fecha);
        $("#id_cultivo1").val(data.id_cultivo).trigger('change');
        $("#id_etapa1").val(data.id_etapa).trigger('change');
        $('#id_usu1').val(data.id_usu);

    });

}

// creamos la funcion editar para actualizar el formato
function editar(e){
    e.preventDefault();

    var formData = new FormData($("#biocre_edit")[0]);

        $.ajax({
            url: "controller/biocrecimiento.php?op=editar",
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






