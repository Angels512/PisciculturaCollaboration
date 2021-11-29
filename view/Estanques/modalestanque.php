<div id="modalestanque" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <form method="post" id="estanque_form">
		   		<div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="font-icon-close-2"></i>
                    </button>
                    <h4 class="modal-title" id="tituloest"></h4>
                </div>
               <div class="modal-body">
						<input type="hidden" name="id_tanque" id="id_tanque">
					    <div class="form-group">
					    	<label class="form-label semibold" for="num_tanque">Numero de Estanque</label>
					    	<div class="form-control-wrapper form-control-icon-right">
					    		<input type="number" class="form-control" id="num_tanque" name="num_tanque" placeholder="Ingrese el Numero de Estanque">
                        		<i class="fa fa-user"></i>
								<small class="text-muted text-danger alerta" id="num_tanque_alert" hidden>El numero debe contener solo numeros, max 2 caracateres.</small>
                        	</div>
					    </div>
					    <div class="form-group">
					    	<label class="form-label semibold" for="capacidad_tanque">Capacidad de Estanque</label>
					    	<div class="form-control-wrapper form-control-icon-right">
					    		<input type="number" class="form-control" id="capacidad_tanque" name="capacidad_tanque" placeholder="Ingrese la capacidad del estanque">
                        		<i class="fa fa-user-o"></i>
								<small class="text-muted text-danger alerta" id="capacidad_tanque_alert" hidden>La capacidad debe contener solo numeros, max 4 caracateres.</small>
                        	</div>
					    </div>
						<div class="form-group">
					    	<label class="form-label semibold" for="desc_tanque">Descripción del Estanque</label>
					    	<div class="form-control-wrapper form-control-icon-right">
                        		<textarea id="desc_tanque" name="desc_tanque" rows="6" class="form-control" placeholder="Ingrese la descripción" maxlength="200"></textarea>
								<i class="fa fa-user-o"></i>
								<small class="text-muted text-danger alerta" id="desc_tanque_alert" hidden>La descripción es mínimo de 10 y max de 80 caracteres.</small>
					    </div>
                </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
				   <button type="submit" name="action"  class="btn azul btn-rounded btn-primary">Guardar</button>
               </div>
           </form>
       </div>
   </div>
</div>