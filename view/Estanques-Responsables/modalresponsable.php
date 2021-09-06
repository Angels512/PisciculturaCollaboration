<div id="modalresponsable" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <form method="post" id="responsable_form">
		   		<div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="font-icon-close-2"></i>
                    </button>
                    <h4 class="modal-title" id="titulores"></h4>
                </div>

               <div class="modal-body">
						<input type="hidden" name="id_respon" id="id_respon">
					    <div class="form-group">
					    	<label class="form-label semibold" for="nombre_respon">Nombre Responsable</label>
					    	<div class="form-control-wrapper form-control-icon-right">
					    		<input type="text" class="form-control" id="nombre_respon" name="nombre_respon" placeholder="Ingrese Nombre">
                        		<i class="fa fa-user"></i>
                        	</div>
					    </div>

					    <div class="form-group">
					    	<label class="form-label semibold" for="apellido_respon">Apellido Responsable</label>
					    	<div class="form-control-wrapper form-control-icon-right">
					    		<input type="text" class="form-control" id="apellido_respon" name="apellido_respon" placeholder="Ingrese Apellido">
                        		<i class="fa fa-user-o"></i>
                        	</div>
					    </div>
                </div>
               <div class="modal-footer">
                   <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
				   <button type="submit" name="action" class="btn btn-rounded btn-primary">Guardar</button>
               </div>
           </form>
       </div>
   </div>
</div>