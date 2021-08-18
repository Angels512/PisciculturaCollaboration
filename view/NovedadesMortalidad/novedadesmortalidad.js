function init(){

    // Nos dirige a la funcion guardaryeditar una vez se le de clic al boton guardar del modal de mortalidad
    $("#mortalidad_form").on("submit",function(e){
     
         guardaryeditarMort(e); 
    })

    // Nos dirige a la funcion guardaryeditarN una vez se le de clic al boton guardar del modal de novedad
    $("#novedad_form").on("submit",function(e){
        guardaryeditarNov(e);
    })

}

$(document).ready(function(){

    /* Esto es para llenar el select del Cultivo */
    $.post("controller/cultivo.php?op=cultivoselect",function(data, status){
        $('.cultivo').html(data); 
   }); 

    let id_cultivo =  getUrlParameter('ID'); 
 
    //para llenar el datatable de novedades
    tabla=$('#dt_novedad').dataTable({
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
                url: "controller/novedad.php?op=listar_x_cult",
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

        //para llenar el datatable de mortalidad
        tabla=$('#dt_mortalidad').dataTable({
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
                url: "controller/mortalidad.php?op=listar_x_cult",
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


    

// creamos la funcion guardaryeditar para insertar la mortalidad y vaciar los campos del formulario
function guardaryeditarMort(e){
    e.preventDefault();
    var formData = new FormData($('#mortalidad_form')[0]);
    
    $.ajax({
        url: "controller/mortalidad.php?op=insertMortalidad",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){

            $('#reg_mortandad').val('');
            swal("correcto!","Registrado Correctamente","success");
        }
    });
}

// creamos la funcion guardaryeditar para insertar una novedad y vaciar los campos del formulario
function guardaryeditarNov(e){
    e.preventDefault();
    var formData = new FormData($('#novedad_form')[0]);
    
    $.ajax({
        url: "controller/novedad.php?op=insertNovedad",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){

            $('#medidad_prev').val('');
            swal("correcto!","Registrado Correctamente","success");
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
    
init(); 
