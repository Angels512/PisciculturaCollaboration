<div id="modalproduc" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4><strong>Modificar Producto</strong></h4>
            </div>
			<div class="modal-body">
				<form method="post" id="product_edit">
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
							</div>
						</div>
						<div class="form-group">
							<label class="form-label semibold"  for="num_lote">Número de Lote</label>
							<div class="form-control-wrapper form-control-icon-right">
								<input type="text" class="form-control" id="num_lote1" name="num_lote" placeholder="Ingrese Número" required>
								<i class="glyphicon glyphicon-barcode"></i>
							</div>
						</div>
						<div class="form-group">
							<label class="form-label semibold"  for="id_prove">Proveedor</label>
							<select id="id_prove1" name="id_prove" class="form-control">
							</select>
						</div>	                  						
						<div class="modal-footer">
							<button type="submit" name="action" class="btn btn-rounded btn-primary">Guardar</button>
							<button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
						</div>
				</form> 
			</div>
        </div>
    </div>
</div>

