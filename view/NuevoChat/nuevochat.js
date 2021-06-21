
function init()
{
    // En el momento que se presione SUBMIT del formulario #chatForm se ejecutara la function createChat
    $('#chatForm').on('submit', function(e)
    {
        createChat(e);
    });
}


$(document).ready(function()
{
    // Ejecutamos el SummerNote (Textarea)
    $('#desc_chat').summernote({
        height: 250, // Tiene un alto de 250px
        lang: "es-ES", // Esta en Español
        placeholder: "Escriba una breve descripcion para este chat...",
        popover: // Eliminamos unas opciones que trae por defecto
        {
            image: [],
            link: [],
            air: []
        }
    });


    // Se consultaron los datos en el modelo, los recogio el controlador y aqui los pasamos al select de la vista
    $.post("controller/categoria.php?op=select", function(data, status)
    {
        // #id_cat es el ID del select
        $('#id_cat').html(data);
    });
});


// Funcion para crear el Chat
function createChat(e)
{
    // Solo se ejecutara 1 vez esta accion
    e.preventDefault();

    var titulo = $('#titulo_chat').val();
    var descripcion = $('#desc_chat');
    var formData = new FormData($('#chatForm')[0]); // Creamos un FormData con el ID del formulario

    if (titulo == '' || descripcion.summernote('isEmpty'))
    {
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        // Creamos un AJAX para insertar los datos en la BD
        $.ajax(
        {
            url: "controller/chat.php?op=create", // La ubicacion exacta del controlador con su op
            type: "POST", // Es de tipo POST el envio
            data: formData, // Los datos los extrae de la variable que creamos arriba, esta contiene lo ingresado en el Formulario
            contentType: false,
            processData: false,
            success: function(datos) // Cuando haya finalizado el proceso de creacion del chat
            {
                // Vaciamos los campos del formulario
                $('#chatForm')[0].reset();
                descripcion.summernote('reset'); // Esta es la forma para vaciar el contenido del SummerNote

                // Muestra alerta de SweetAlert
                swal({
                    title: "Correcto!",
                    text: "Chat creado correctamente",
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "OK"
                });
            }
        });
    }
}


init();