$(function() {
    $('#dt_biometrias').DataTable();
});

$(function() {
    $('#dt_tbl_alim').DataTable();
});


$(document).ready(function(){
    let id_cultivo =  getUrlParameter('ID'); 
 
    //para llenar el datatable de biocrecimiento 
    tabla=$('#dt_biometrias').dataTable({
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
                url: "controller/biocrecimiento.php?op=listar_x_cult",
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

        //para llenar el datatable de la tabla de alimentación
        tabla=$('#dt_tbl_alim').dataTable({
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
                url: "controller/tblalimentacion.php?op=listar_x_cult",
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
});


$(document).on("click","#consultarbio",function(){

    location.href ='biocrecimiento';
});


$(document).on("click","#editarbio",function(){

    location.href ='biocrecimiento';
});

$(document).on("click","#eliminarbio",function(e){
    e.preventDefault();
    swal({
                title: "¿Está seguro?",
                text: "Desea eliminar este registro?",
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: "btn-default",
                confirmButtonClass: "btn-warning",
                confirmButtonText: "Eliminar",
                closeOnConfirm: false
            },
            function(){
                swal({
                    title: "Eliminado!",
                    text: "El registro se ha eliminado exitosamente.",
                    type: "success",
                    confirmButtonClass: "btn-success"
                });
            });
});

$(document).on("click","#consultar",function(){

    location.href ='tbl-alimentacion';
});


$(document).on("click","#editar",function(){

    location.href ='tbl-alimentacion';
});


$(document).on("click","#eliminar",function(e){
    e.preventDefault();
    swal({
        title: "¿Está seguro?",
        text: "Desea eliminar este registro?",
        type: "warning",
        showCancelButton: true,
        cancelButtonClass: "btn-default",
        confirmButtonClass: "btn-warning",
        confirmButtonText: "Eliminar",
        closeOnConfirm: false
    },
    function(){
        swal({
            title: "Eliminado!",
            text: "El registro se ha eliminado exitosamente.",
            type: "success",
            confirmButtonClass: "btn-success"
        });
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