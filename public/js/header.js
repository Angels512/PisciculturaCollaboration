function init()
{
    // En el momento que se presione SUBMIT del formulario #chatForm se ejecutara la function createChat
    $('#chatFormHeader').on('submit', function(e)
    {
        alert('hola');
    });
}


$(document).ready(function()
{
    // Se consultaron los datos en el modelo, los recogio el controlador y aqui los pasamos al select de la vista
    $.post("controller/categoria.php?op=select", function(data, status)
    {
        // #id_cat es el ID del select
        $('#id_catHeader').html(data);
    });
});



// Funcion para crear el Chat
$('#btnChatHeader').on('click', function()
{
    var id_usu = $('#id_usuHeader').val();
    var id_cat = $('#id_catHeader').val();
    var titulo_chat = $('#titulo_chatHeader').val();
    var desc_chat = $('#desc_chatHeader').val();

    if (titulo_chat == '' || desc_chat == '')
    {
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else {
        $.post('controller/chat.php?op=create', {id_usu:id_usu, id_cat:id_cat, titulo_chat:titulo_chat, desc_chat:desc_chat}, function(data)
        {
            $('#chatFormHeader')[0].reset();

            swal({
                title: "Correcto!",
                text: "Chat creado correctamente",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "OK"
            });
        });

    }
});