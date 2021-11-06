
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

//para ir al formato de biocrecimiento pasando el ID por url segun el boton presionado
function consultar(id_biocre){
    window.location.href = `biocrecimiento?ID=${id_biocre}&cultivo=${getUrlParameter('ID')}`;
}

function editar(id_biocre){
    window.location.href = `biocrecimiento?ID=${id_biocre}&cultivo=${getUrlParameter('ID')}&EDIT=yes`;
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

            $.post("controller/biocrecimiento.php?op=eliminar", { id_biocre:id_biocre }, function (data) {});

            $('#biocrecimiento').DataTable().ajax.reload();

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

            $('#tblalimentacion').DataTable().ajax.reload();

            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

//para ir al formato de parametros fq pasando el ID por url segun el boton presionado
function consultarparafq(id_par_fq){
    window.location.href = "parafq?ID="+ id_par_fq +"";
}

function editarparafq(id_par_fq){
    window.location.href = "parafq?ID="+ id_par_fq +"&EDIT=yes";
}

//para eliminar un formato de parametros fq
function eliminarparafq(id_par_fq){

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

            $.post("controller/parametrosfq.php?op=eliminar", { id_par_fq:id_par_fq }, function (data) {
            });

            $('#parametrosfq').DataTable().ajax.reload();

            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

//para ir al formato de temperatura agua pasando el ID por url segun el boton presionado
function consultartempagua(id_temp_agua){
    window.location.href = "tempagua?ID="+ id_temp_agua +"";
}

function editartempagua(id_temp_agua){
    window.location.href = "tempagua?ID="+ id_temp_agua +"&EDIT=yes";
}

//para eliminar un formato de temperatura agua
function eliminartempagua(id_temp_agua){

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

            $.post("controller/temperaturaagua.php?op=eliminar", { id_temp_agua:id_temp_agua }, function (data) {
            });

            $('#temperaturaagua').DataTable().ajax.reload();

            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

//para ir al formato de temperatura ambiente pasando el ID por url segun el boton presionado
function consultartempamb(id_temp_amb){
    window.location.href = "tempamb?ID="+ id_temp_amb +"";
}

function editartempamb(id_temp_amb){
    window.location.href = "tempamb?ID="+ id_temp_amb +"&EDIT=yes";
}

//para eliminar un formato de temperatura ambiente
function eliminartempamb(id_temp_amb){

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

            $.post("controller/temperaturaambiente.php?op=eliminar", { id_temp_amb:id_temp_amb }, function (data) {
            });

            $('#temperaturaambiente').DataTable().ajax.reload();

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
function consultarestacui(id_est_acui){
    window.location.href = "estacui?ID="+ id_est_acui +"";
}

function editarestacui(id_est_acui){
    window.location.href = "estacui?ID="+ id_est_acui +"&EDIT=yes";
}

//para eliminar un formato de estado acuicultura
function eliminarestacui(id_est_acui){

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

            $('#estadoacuicultura').DataTable().ajax.reload();

            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}



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