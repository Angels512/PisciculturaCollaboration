
$(document).ready(function(){
    let tables = document.querySelectorAll('table');

    tables.forEach((table) =>
    {
        listarDatatables(table.id)
    });
});



function listarDatatables(controller)
{
    let id_cultivo =  getUrlParameter('ID');

    //para llenar el datatable de la tabla de alimentación
    $(`#${controller}`).dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: `controller/${controller}.php?op=listar_x_cult`,
            type: "post",
            dataType : "json",
            data:{ id_cultivo : id_cultivo },
            error: function(e){
                console.log(e.responseText);
            }
        },
        "bDestroy": true,
        "responsive": true,
        "bInfo":true,
        "iDisplayLength": 5,
        "autoWidth": false,
        "language": {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst":    "Primero",
                "sLast":     "Último",
                "sNext":     "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    }).DataTable();
}

$('#list').on('click', (e) => { setTimeout(() => { $('#tblalimentacion').DataTable().responsive.recalc(); }, 200); });



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

//para ir al formato de biocrecimiento pasando el ID por url segun el boton presionado
function consultar(id_biocre){
    window.location.href = "biocrecimiento?ID="+ id_biocre +"";
}

function editar(id_biocre){
    window.location.href = "biocrecimiento?ID="+ id_biocre +"&EDIT=yes";
}

//para eliminar un formato de biocrecimiento
function eliminar(id_biocre){

    swal({
        title: "Advertencia",
        text: "Esta seguro de Eliminar el Formato?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {

            $.post("controller/biocrecimiento.php?op=eliminar", { id_biocre:id_biocre }, function (data) {
            });

            $('#dt_biometrias').DataTable().ajax.reload();

            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

//para ir al formato de tabla de alimentacion pasando el ID por url segun el boton presionado
function consultartbal(id_tbl_alim){
    window.location.href = "tbl-alimentacion?ID="+ id_tbl_alim +"";
}

function editartbal(id_tbl_alim){
    window.location.href = "tbl-alimentacion?ID="+ id_tbl_alim +"&EDIT=yes";
}

//para eliminar un formato de tbl alimentacion
function eliminartbal(id_tbl_alim){

    swal({
        title: "Advertencia",
        text: "Esta seguro de Eliminar el Formato?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {

            $.post("controller/tblalimentacion.php?op=eliminar", { id_tbl_alim:id_tbl_alim }, function (data) {
            });

            $('#dt_tbl_alim').DataTable().ajax.reload();

            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

//para ir al formato de estado acuicultura pasando el ID por url segun el boton presionado
function consultarea(id_est_acui){
    window.location.href = "estacuicultura?ID="+ id_est_acui +"";
}

function editarea(id_est_acui){
    window.location.href = "estacuicultura?ID="+ id_est_acui +"&EDIT=yes";
}

//para eliminar un formato de biocrecimiento
function eliminarea(id_est_acui){

    swal({
        title: "Advertencia",
        text: "Esta seguro de Eliminar el Formato?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {

            $.post("controller/estadoacuicultura.php?op=eliminar", { id_est_acui:id_est_acui }, function (data) {
            });

            $('#dt_estacuicultura').DataTable().ajax.reload();

            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}