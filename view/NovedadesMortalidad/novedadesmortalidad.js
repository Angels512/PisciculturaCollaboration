const inputsm = document.querySelectorAll('#mortalidad_form input');
const iconsm = document.querySelectorAll('#mortalidad_form i');
const txan = document.querySelectorAll('#novedad_form textarea');

const expresion = {
	reg_mortandad: /^\d{1,4}$/, // números
	medidad_prev: /^.{20,250}$/ // Letras,espacios,otros símbolos y números.
}

function init(){

    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del modal de mortalidad
    $("#mortalidad_form").on("submit",function(e){
        validarDatosMort(e);
    });

    // Nos dirige a la funcion guardar una vez se le de clic al boton guardar del modal de novedad
    $("#novedad_form").on("submit",function(e){
        validarDatosNov(e);
    });

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

// Por cada input del formulario se realiza la validacion
inputsm.forEach((input) =>
{
    //keyup para que se realice siempre que se presione una tecla
    input.addEventListener('keyup', validateForm);
    //blur para que se realice siempre que se presione fuera del input
    input.addEventListener('blur', validateForm);
});

// Por cada input del formulario se realiza la validacion
txan.forEach((textarea) =>
{
    //keyup para que se realice siempre que se presione una tecla
    textarea.addEventListener('keyup', validateForm);
    //blur para que se realice siempre que se presione fuera del input
    textarea.addEventListener('blur', validateForm);
});

function validateForm(e)
{
    switch (e.target.name) {
        case 'reg_mortandad':
            validateData(expresion.reg_mortandad, e.target, 'reg_mortandad');
        break;

        case 'medidad_prev':
            validateData(expresion.medidad_prev, e.target, 'medidad_prev');
        break;
    }
}

function validateData(expresion, input, campo)
{
    if (expresion.test(input.value))
    {
        $('#'+campo).removeClass('form-control-danger');
        $('#'+campo).addClass('form-control-success');
        $('#'+campo+'_alert').prop('hidden', true);
    }else {
        $('#'+campo).addClass('form-control-danger');
        $('#'+campo+'_alert').prop('hidden', false);
    }
}

//validar campos vacios
function validarDatosMort(e){
    e.preventDefault();

    let valite_reg_mortandad = $('#reg_mortandad').hasClass('form-control-danger');

    if($('#reg_mortandad').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_reg_mortandad) {
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "OK"
        });
    }else{
        guardarMort();
    }
}

//validar campos vacios
function validarDatosNov(e){
    e.preventDefault();

    let valite_medidad_prev = $('#medidad_prev').hasClass('form-control-danger');

    if($('#medidad_prev').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else if (valite_medidad_prev) {
        swal({
            title: "Advertencia!",
            text: "Los campos son invalidos...",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "OK"
        });
    }else{
        guardarNov();
    }
}

// creamos la funcion guardar para insertar la mortalidad y vaciar los campos del formulario
function guardarMort(){
    var formData = new FormData($('#mortalidad_form')[0]);

    $.ajax({
        url: "controller/mortalidad.php?op=insertMortalidad",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#modalmortalidad').modal('hide');
            $('#reg_mortandad').val('');
            swal("correcto!","Registrado Correctamente","success");
        }
    });
}

// creamos la funcion guardar para insertar una novedad y vaciar los campos del formulario
function guardarNov(){
    var formData = new FormData($('#novedad_form')[0]);

    $.ajax({
        url: "controller/novedad.php?op=insertNovedad",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $('#modalnovedad').modal('hide');
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
