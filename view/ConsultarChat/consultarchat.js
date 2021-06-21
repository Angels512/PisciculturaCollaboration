
function init()
{

}


$(document).ready(function()
{
    // Capturamos el ID del usuario y del rol (Los encontramos en el header)
    var id_usu = $('#id_usu_x').val();
    var id_rol = $('#id_rol_x').val();

    if (id_rol == 2 || id_rol == 3)
    {
        // Va a ejecutar y rellenar el DataTable con los chats actuales del mismo USUARIO
        tabla=$('#chatData').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons:[],
            "ajax":
            {
                url: 'controller/chat.php?op=listarChatUsu',
                type: "post",
                dataType: "json",
                data:{ id_usu : id_usu},
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo": true,
            "iDisplayLength": 10,
            "autoWidth": false,
            "language":
            {
                "sProcessing":          "Procesando...",
                "sLengthMenu":          "Mostrar _MENU_ registros",
                "sZeroRecords":         "No se encontraron resultados",
                "sEmptyTable":          "Ningun dato disponible en esta tabla",
                "sInfo":                "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":           "Mostrando un total de 0 registros",
                "sInfoFiltered":        "(Filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":         "",
                "sSearch":              "Buscar:",
                "sUrl":                 "",
                "sInfoThousand":        ",",
                "sLoadingRecords":      "Cargando...",
                "oPaginate":
                {
                    "sFirst":           "Primero",
                    "sLast":            "Ultimo",
                    "sNext":            "Siguiente",
                    "sPrevious":        "Anterior"
                },
                "oAria":
                {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        }).DataTable();
    }else {
        // Va a ejecutar y rellenar el DataTable con los TODOS chats actuales
        tabla=$('#chatData').dataTable(
        {
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons:[],
            "ajax":
            {
                url: 'controller/chat.php?op=listarChatTotal',
                type: "post",
                dataType: "json",
                error: function(e){
                    console.log(e.responseText);
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo": true,
            "iDisplayLength": 10,
            "autoWidth": false,
            "language":
            {
                "sProcessing":          "Procesando...",
                "sLengthMenu":          "Mostrar _MENU_ registros",
                "sZeroRecords":         "No se encontraron resultados",
                "sEmptyTable":          "Ningun dato disponible en esta tabla",
                "sInfo":                "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":           "Mostrando un total de 0 registros",
                "sInfoFiltered":        "(Filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":         "",
                "sSearch":              "Buscar:",
                "sUrl":                 "",
                "sInfoThousand":        ",",
                "sLoadingRecords":      "Cargando...",
                "oPaginate":
                {
                    "sFirst":           "Primero",
                    "sLast":            "Ultimo",
                    "sNext":            "Siguiente",
                    "sPrevious":        "Anterior"
                },
                "oAria":
                {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
        }).DataTable();
    }
});


function ver(id_chat)
{
    window.location.href = "detalle-chat?ID="+ id_chat +"";
}


init();