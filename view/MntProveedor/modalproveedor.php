<div id="modalproveedor" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title">Modificar Proveedor</h4>
            </div>
            <form method="post" id="proveedor_edit">

                <div class="modal-body">

					<input type="hidden" class="form-control" id="id_prove1" name="id_prove">

                    <div class="form-group">
						<label  class="form-label semibold" for="nombre_emp">Nombre Proveedor <span class="color-red">*</span></label>
						<div class="form-control-wrapper form-control-icon-right">
							<input type="text" class="form-control" id="nombre_emp1" name="nombre_emp"  >
							<i class="fa fa-user" id="nombre_icon1" aria-hidden="true"></i>
							<small class="text-muted text-danger alerta" id="nombre_alert1" hidden>El nombre debe contener letras y espacios, máximo 30 caracteres.</small>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label semibold" for="direccion_emp">Dirección Proveedor <span class="color-red">*</span></label>
						<div class="form-control-wrapper form-control-icon-right">
							<input type="text" class="form-control" id="direccion_emp1" name="direccion_emp"  >
							<i class="fa fa-home" id="direccion_icon1" aria-hidden="true"></i>
							<small class="text-muted text-danger alerta" id="direccion_alert1" hidden>La dirección debe contener letras, números, caracteres como (#, - ,espacios).</small>						
						</div>
					</div>
					<div class="form-group">
						<label class="form-label semibold" for="telefono_emp">Teléfono Proveedor <span class="color-red">*</span></label>
						<div class="form-control-wrapper form-control-icon-right">
							<input type="text" class="form-control" id="telefono_emp1" name="telefono_emp"  >
							<i class="fa fa-phone" id="telefono_icon1" aria-hidden="true"></i>
							<small class="text-muted text-danger alerta" id="telefono_alert1" hidden>El teléfono debe contener solo números, min 7 - max 10.</small>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label semibold" for="correo_emp">Correo Proveedor <span class="color-red">*</span></label>
						<div class="form-control-wrapper form-control-icon-right">
							<input type="text" class="form-control" id="correo_emp1" name="correo_emp"  >
							<i class="fa fa-envelope" id="correo_icon1" aria-hidden="true"></i>
							<small class="text-muted text-danger alerta" id="correo_alert1" hidden>El correo debe tener un @ y un dominio(.com).</small>
						</div>
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn azul btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

