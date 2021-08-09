<div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdlTitulo">Actualizar Perfil</h4>
            </div>

            <form action="" method="post" id="formPerfil">
                <!-- BODY -->
                <div class="modal-body">
                    <div class="form-group">
                        <!-- ID DEL USUARIO -->
                        <input type="hidden" id="id_usu" name="id_usu" value="">

                        <!-- NOMBRE -->
                        <label class="form-label semibold" for="nombre_usu">Nombre completo:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" placeholder="Ingrese el/los nombre(s) del empleado" id="nombre_usu" name="nombre_usu">
                            <i class="fa fa-user"></i>
                        </div><br>

                        <!-- APELLIDO -->
                        <input type="hidden" class="form-control" placeholder="Ingrese los apellido del empleado" id="apellido_usu" name="apellido_usu">

                        <!-- DOCUMENTO -->
                        <label class="form-label semibold" for="documento_usu">Numero de documento:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="number" class="form-control" placeholder="Ingrese el numero de documento del empleado" id="documento_usu" name="documento_usu">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                        </div><br>

                        <!-- CORREO ELECTRONICO -->
                        <label class="form-label semibold" for="pass_usu">Correo electronico:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="email" class="form-control" placeholder="example@gmail.com" id="correo_usu" name="correo_usu">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </div><br>

                        <!-- DIRECCION -->
                        <div id="direccion">
                            <label class="form-label semibold" for="direccion_usu">Direccion:</label>
                            <div class="form-control-wrapper form-control-icon-right">
                                <input type="text" class="form-control" placeholder="Ingrese la direccion del empleado" id="direccion_usu" name="direccion_usu">
                                <i class="fa fa-home" id="direccion_icon"></i>
                                <small class="text-muted text-danger alerta" id="direccion_alert" hidden>La direccion debe tener 25 caracteres maximo.</small>
                            </div><br>
                        </div>

                        <!-- TELEFONO -->
                        <div id="telefono">
                            <label class="form-label semibold" for="telefono_usu">Telefono:</label>
                            <div class="form-control-wrapper form-control-icon-right">
                                <input type="text" class="form-control" placeholder="Ingrese el telefono del empleado" id="telefono_usu" name="telefono_usu">
                                <i class="fa fa-phone" id="telefono_icon"></i>
                                <small class="text-muted text-danger alerta" id="telefono_alert" hidden>El telefono debe tener entre 7 y 10 numeros.</small>
                            </div><br>
                        </div>

                        <!-- PASSWORD -->
                        <label class="form-label semibold" for="pass_usu">Contraseña:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="password" class="form-control" placeholder="••••••••••••" id="pass_usu" name="pass_usu">
                            <i class="fa fa-key" id="pass_icon" aria-hidden="true"></i>
                            <small class="text-muted text-danger alerta" id="pass_alert" hidden>La contraseña debe tener entre 8 y 12 caracteres.</small>
                        </div><br>

                        <!-- PASSWORD 2 -->
                        <label class="form-label semibold" for="pass_usu">Repita la contraseña:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="password" class="form-control" placeholder="••••••••••••" id="pass2" name="pass2">
                            <i class="fa fa-key" id="pass2_icon" aria-hidden="true"></i>
                            <small class="text-muted text-danger alerta" id="pass2_alert" hidden>Las contraseñas no son iguales.</small>
                        </div><br>
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