<div class="modal fade" id="modalCultivo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mdlTitulo">Actualizar Cultivo</h4>
            </div>

            <form action="" method="post" id="formCultivo">
                <!-- BODY -->
                <div class="modal-body">
                    <div class="form-group">
                        <!-- ID DEL USUARIO -->
                        <input type="hidden" id="id_cultivo" name="id_cultivo" value="">

                        <!-- NUMERO DE LOTE -->
                        <label class="form-label semibold" for="num_lote">Numero de lote:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" placeholder="Ingrese el/los nombre(s) del empleado" id="num_lote" name="num_lote">
                            <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i>
                        </div><br>

                        <!-- CANTIDAD DE SIEMBRA -->
                        <label class="form-label semibold" for="cant_siembra">Cantidad de siembra:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" placeholder="Ingrese los apellido del empleado" id="cant_siembra" name="cant_siembra">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        </div><br>

                        <!-- NUMERO DE ESTANQUE -->
                        <label class="form-label semibold" for="id_tanque">Numero de Estanque:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <select class="select2 manual select2-no-search-default select2-hidden-accessible" id="id_tanque" name="id_tanque">
                            </select>
                        </div><br>

                        <!-- NOMBRE DEL RESPONSABLE -->
                        <label class="form-label semibold" for="id_respon">Nombre del Responsable:</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <select class="select2 manual select2-no-search-default select2-hidden-accessible" id="id_respon" name="id_respon">
                            </select>
                        </div>
                    </div>
                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-rounded btn-primary">Actualizar</button>
                </div>
            </form> <!-- Formulario de usuario -->
        </div>
    </div>
</div><!--.modal-->