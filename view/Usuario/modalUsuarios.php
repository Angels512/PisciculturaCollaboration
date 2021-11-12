<div class="modal fade" id="modalUsuarios" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdlTitulo"></h4>
            </div>

            <form action="" method="post" id="formUsuario">
                <!-- BODY -->
                <div class="modal-body">
                    <div class="form-group">
                        <!-- ID DEL USUARIO -->
                        <input type="hidden" id="id_usu" name="id_usu" value="">

                        <!-- NOMBRE -->
                        <label class="form-label semibold" for="nombre_usu">Nombre <span class="color-red">*</span></label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" placeholder="Ingrese el/los nombre(s) del empleado" id="usuNombre" name="nombre_usu">
                            <i class="fa fa-user" id="iconNombre"></i>
                            <small class="text-muted text-danger alerta" id="alertNombre" hidden>El nombre debe tener entre 3 y 20 letras y no puede llevar numeros.</small>
                        </div><br>

                        <!-- APELLIDO -->
                        <label class="form-label semibold" for="apellido_usu">Apellidos <span class="color-red">*</span></label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" placeholder="Ingrese los apellidos del empleado" id="usuApellido" name="apellido_usu">
                            <i class="fa fa-user-o" id="iconApellido"></i>
                            <small class="text-muted text-danger alerta" id="alertApellido" hidden>El apellido debe tener entre 3 y 20 letras y no puede llevar numeros.</small>
                        </div><br>

                        <!-- DOCUMENTO -->
                        <label class="form-label semibold" for="documento_usu">Número de documento <span class="color-red">*</span></label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" placeholder="Ingrese el numero de documento del empleado" id="usuDocumento" name="documento_usu">
                            <i class="fa fa-address-card" id="iconDocumento" aria-hidden="true"></i>
                            <small class="text-muted text-danger alerta" id="alertDocumento" hidden>El número de documento debe tener entre 7 y 10 numeros y no puede llevar letras.</small>
                        </div><br>

                        <!-- DIRECCION -->
                        <div id="direccion">
                            <label class="form-label semibold" for="direccion_usu">Dirección <span class="color-red">*</span></label>
                            <div class="form-control-wrapper form-control-icon-right">
                                <input type="text" class="form-control" placeholder="Ingrese la direccion del empleado" id="direccion_usu" name="direccion_usu">
                                <i class="fa fa-home"></i>
                            </div><br>
                        </div>

                        <!-- TELEFONO -->
                        <div id="telefono">
                            <label class="form-label semibold" for="telefono_usu">Teléfono <span class="color-red">*</span></label>
                            <div class="form-control-wrapper form-control-icon-right">
                                <input type="text" class="form-control" placeholder="Ingrese el telefono del empleado" id="telefono_usu" name="telefono_usu">
                                <i class="fa fa-phone"></i>
                            </div><br>
                        </div>

                        <!-- CORREO ELECTRONICO -->
                        <label class="form-label semibold" for="pass_usu">Correo electrónico <span class="color-red">*</span></label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="email" class="form-control" placeholder="example@gmail.com" id="usuCorreo" name="correo_usu">
                            <i class="fa fa-envelope" id="iconCorreo" aria-hidden="true"></i>
                            <small class="text-muted text-danger alerta" id="alertCorreo" hidden>El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</small>
                        </div><br>

                        <label class="form-label semibold" for="id_rol">Cargo:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <select class="select2 manual select2-no-search-default select2-hidden-accessible" id="id_rol" name="id_rol">
                                <option value="2">Piscicultor</option>
                                <option value="3">Acuicultor</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form> <!-- Formulario de usuario -->
        </div>
    </div>
</div><!--.modal-->