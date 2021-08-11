<div id="modalmortalidad" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="mortalidad_form">
                <!-- HEADER -->
                <div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="font-icon-close-2"></i>
                    </button>
                    <h4 class="modal-title" id="mdlTitulo">Nuevo Registro de Mortalidad</h4>
                </div>



                <div class="modal-body">

                    <div class="form-group">
                        <label for="id_culti" class="form-label">Cultivo</label>
						<div>
							<select id="id_culti" name="id_cultivo" class="form-control cultivo">
							</select>
						</div>
                    </div>
                   <div class="form-group">
                        <label class="form-label" for="reg_mortandad">Registro de Mortalidad</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" id="reg_mortandad" name="reg_mortandad" placeholder="Ingrese la Mortalidad" required>
                            <i class="fa fa-anchor"></i>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>


