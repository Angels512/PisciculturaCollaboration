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
					    		<input type="number" class="form-control" id="num_tanque" name="num_tanque" placeholder="Ingrese el Numero de Estanque" required>
                        		<i class="fa fa-user"></i>
                        	</div>
					    </div>

					    <div class="form-group">
					    	<label class="form-label semibold" for="capacidad_tanque">Capacidad de Estanque</label>
					    	<div class="form-control-wrapper form-control-icon-right">
					    		<input type="number" class="form-control" id="capacidad_tanque" name="capacidad_tanque" placeholder="Ingrese la capacidad del estanque" required>
                        		<i class="fa fa-user-o"></i>
                        	</div>
					    </div>

						<div class="form-group">
					    	<label class="form-label semibold" for="desc_tanque">Descripción del Estanque</label>
					    	<div class="form-control-wrapper form-control-icon-right">
					    		<textarea class="form-control" id="desc_tanque" name="desc_tanque" placeholder="Ingrese la descripción" required></textarea>
                        		<i class="fa fa-user-o"></i>
                        	</div>
					    </div>

                </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
				   <button type="submit" name="action"  class="btn btn-rounded btn-primary">Guardar</button>
               </div>
           </form>
       </div>
   </div>
</div>