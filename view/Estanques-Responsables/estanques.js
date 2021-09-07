function init(){
    // Nos dirige a la funcion guardaryeditar una vez se le de clic al boton guardar del formulario del estanque
    $("#estanque_form").on("submit",function(e){
        validarDatos(e);
    });
    }
    
    
    $(document).ready(function()
    {
    listarEstanques();
    });
    
    function validarDatos(e){
    e.preventDefault();
    
    if($('#num_tanque').val()=='' ||$('#capacidad_tanque').val()=='' ||$('#desc_tanque').val()==''){
        swal({
            title: "Advertencia!",
            text: "Campos vacios",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "OK"
        });
    }else{
        guardaryeditar();
    }
    }
    
    // creamos la funcion guardaryeditar para insertar y actualizar un estanque y vaciar los campos del formulario
    function guardaryeditar(){
    
    var formData = new FormData($('#estanque_form')[0]);
    
    $.ajax({
        url: "controller/estanque.php?op=guardaryeditar",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(datos){
            $("#modalestanque").modal('hide');
    
            listarEstanques();
            swal("Correcto!","Registrado Correctamente","success");
        }
    });
    }
    
    
    $(document).on("click","#newestanque",function(){
    $('#estanque_form')[0].reset();
    $('#titulores').html('Nuevo Estanque');
    /* Para mostrar el modal del estanque una vez se de click al boton newestanque*/
    $('#modalestanque').modal('show');
    });
    
    
    // LLevar toda la lista de estanque a la vista
    function listarEstanques()
    {
    $.post("controller/estanque.php?op=listarEstanques", {}, function(data)
    {
        // Esta es la sección donde se visualizan los estanques
        $('#listarestanques').html(data);
    });
    }
    
    
    function modalEstanque(id_tanque)
    {
    $('#titulores').html('Modificar Estanque');
    MostrarDatos(id_tanque);
    
    }
    
    
    //para llenar el modal con datos del estanque
    function MostrarDatos(id_tanque)
    {
    
    $.post('controller/estanque.php?op=listarDatosEstanque', {id_tanque:id_tanque}, function(data)
    {
        data = JSON.parse(data);
    
        $('#id_tanque').val(data.id_tanque);
        $('#num_tanque').val(data.num_tanque);
        $('#capacidad_tanque').val(data.capacidad_tanque);
        $('#desc_tanque').val(data.desc_tanque);
    
    });
    
    //para mostrar el modal donde se muestra la información del estanque
    $('#modalestanque').modal('show');
    }
    
    // Eliminar cultivo
    function deleteEstanque(id_tanque)
    {
    swal({
        title: "Advertencia!",
        text: "Esta seguro de Eliminar el Estanque?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
    
            $.post("controller/estanque.php?op=eliminar", { id_tanque:id_tanque }, function (data) {});
    
            listarEstanques();
            swal({
                title: "Correcto!",
                text: " Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
    };
    