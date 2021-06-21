
function init()
{

}


$(document).ready(function()
{
    // Ejecutamos el SummerNote #1 (Textarea con la descripcion)
    $('#desc_chat').summernote({
        height: 445, // Tiene un alto de 250px
        lang: "es-ES", // Esta en Español
        popover: // Eliminamos unas opciones que trae por defecto
        {
            image: [],
            link: [],
            air: []
        }
    });

    // Desactivamos el SummerNote #1
    $('#desc_chat').summernote('disable');



    // Ejecutamos el SummerNote #2 (Textarea para responder el mensaje)
    $('#desc_chatd').summernote({
        height: 250, // Tiene un alto de 250px
        lang: "es-ES", // Esta en Español
        placeholder: 'Escribe tu mensaje...',
        popover: // Eliminamos unas opciones que trae por defecto
        {
            image: [],
            link: [],
            air: []
        }
    });



    // Vamos a ejecutar la funcion de abajo para obtener el ID del chat
    var id_chat = getUrlParameter('ID');

    // Llamamos a la funcion listarDetalle para obtener toda la lista de mensajes
    listarDetalle(id_chat);

});


// Vamos a ejecutar el boton de ENVIAR MENSAJE
$(document).on('click', '#btnenviar', function()
{
    var id_chat = getUrlParameter('ID');
    var id_usu = $('#id_usu_x').val();
    var desc_chatd = $('#desc_chatd').val();

    if ($('#desc_chatd').summernote('isEmpty'))
    {
        swal({
            title: "Advertencia!",
            text: "No ha escrito ningun mensaje...",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        // Ejecutamos el post del controlador para crear un nuevo mensaje
        $.post("controller/chatdetalle.php?op=createdetalle", { id_chat:id_chat, id_usu:id_usu, desc_chatd:desc_chatd }, function(data)
        {
            listarDetalle(id_chat);

            $('#desc_chatd').summernote('reset'); // Esta es la forma para vaciar el contenido del SummerNote

            // Muestra alerta de SweetAlert
            swal({
                title: "Correcto!",
                text: "Mensaje enviado con exito",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK"
            });
        });
    }

});

// Vamos a ejecutar el boton de CERRAR CHAT
$(document).on('click', '#btncerrar', function()
{
    swal({
        title: "Advertencia!",
        text: "Esta seguro de Terminar el Chat?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Confirmar",
        cancelButtonText: "Cancelar",
        closeOnConfirm: false,
        closeOnCancel: true
    },
    function(isConfirm)
    {
        if (isConfirm)
        {
            var id_chat = getUrlParameter('ID');
            var id_usu = $('#id_usu_x').val();

            // Ejecutamos el post del controlador para crear un nuevo mensaje
            $.post("controller/chat.php?op=cerrar", { id_chat:id_chat }, function(data)
            {
            });

            // Ejecutamos el post del controlador para crear un MENSAJE de chat cerrado
            $.post("controller/chatdetalle.php?op=createdetallecerrado", { id_chat:id_chat, id_usu:id_usu }, function(data)
            {
            });

            // Llamamos a la funcion listarDetalle para obtener toda la lista de mensajes
            listarDetalle(id_chat);

            swal({
                title: "Correcto!",
                text: "El chat se ha cerrado exitosamente.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
});


// Creamos una funcion para mostrar la linea de tiempo con todos los mensajes creados en un chat
function listarDetalle(id_chat)
{
    // Definimos un POST llamando al controlador, pasamos el parametro que pide alla y creamos una funcion
    // con data, es la informacion consultada por el modelo y recogida por el controlador.
    $.post("controller/chatdetalle.php?op=listardetalle", { id_chat : id_chat }, function(data)
    {
        // Este es el section donde se almacenan los articles del ChatDetalle
        $('#lblDetalle').html(data);
    });


    $.post("controller/chatdetalle.php?op=mostrar", { id_chat : id_chat }, function(data)
    {
        data = JSON.parse(data);

        $('#lbltitulo').html('Detalle de Chat #' + data.id_chat);

        $('#nombre_usu').html(data.nombre_usu +' '+ data.apellido_usu);
        $('#estado').html(data.estado_chat);
        $('#fecha').html(data.fecha);

        $('#id_cat').val(data.nombre_cat);
        $('#titulo_chat').val(data.titulo_chat);
        $('#desc_chat').summernote('code', data.desc_chat);

        if (data.estadoChatTexto == 'Cerrado')
        {
            $('#pnlDetalle').hide();
        }
    });
}


// Vamos a utilizar esta opcion para capturar el ID del chat, este lo estamos mostrando en la URL del detalle como parametro
var getUrlParameter = function getUrlParameter(sParam)
{
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++)
    {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam)
        {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};


init();