$(function() {
    $('#dt_biometrias').DataTable();
});

$(function() {
    $('#dt_tbl_alim').DataTable();
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
