<div id="modalproduc" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title">Modificar Producto</h4>
            </div>
			<form method="post" id="product_edit">
				<div class="modal-body">
						<input type="hidden" class="form-control" id="id_produ1" name="id_produ">

						<div class="form-group">
							<label class="form-label semibold" for="id_clase">Nombre Porducto</label>
							<select id="id_clase1" name="id_clase" class="form-control">
							</select>
						</div>

						<div class="form-group">
							<label  class="form-label semibold" for="fech_venc">Fecha de Vencimiento</label>
							<div class="form-group">
								<div class='input-group date'>
									<input id="fech_venc1" name="fech_venc" type="text" class="form-control daterange3">
									<span class="input-group-addon">
										<i class="font-icon font-icon-calend"></i>
									</span>
								</div>
								<small class="text-muted text-danger alerta" id="fech_venc_alert1" hidden>La fecha de vencimiento debe ser posterior a hoy.</small>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label semibold"  for="num_lote">Número de Lote</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control" id="num_lote1" name="num_lote" placeholder="Ingrese Número">
								<i class="glyphicon glyphicon-barcode" id="num_lote_icon1" aria-hidden="true"></i>
								<small class="text-muted text-danger alerta" id="num_lote_alert1" hidden>El número de lote debe contener una R y números, máximo 16 caracteres.</small>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label semibold"  for="id_prove">Proveedor</label>
							<select id="id_prove1" name="id_prove" class="form-control">
							</select>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" name="action" class="btn azul btn-rounded btn-primary">Guardar</button>
				</div>
			</form>
        </div>
    </div>
</div>

