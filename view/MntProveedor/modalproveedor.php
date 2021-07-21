
<div id="modalproveedor" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="proveedor_form">
                <div class="modal-header">
                    <h4><strong>Gestionar Proveedores </strong></h4>
                </div>
                <div class="modal-body">
                    <div class="form-group"> 
                        <label class="form-label semibold" for="fecha">Fecha de Creación</label>
						<div class="form-control-wrapper form-control-icon-right">
							<input type="text" class="form-control" id="fecha" name="fecha" disabled>
							<i class="font-icon font-icon-calend"></i>
						</div>
                    </div>
                   <div class="form-group"> 
                        <label  class="form-label semibold" for="nombre_emp">Nombre Proveedor</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" id="nombre_emp" name="nombre_emp" placeholder="Ingrese Nombre" required>
                            <i class="fa fa-user"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label semibold" for="direccion_emp">Dirección Proveedor</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" id="direccion_emp" name="direccion_emp" placeholder="Ingrese Dirección" required>
                            <i class="fa fa-home"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label semibold" for="telefono_emp">Teléfono Proveedor</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" id="telefono_emp" name="telefono_emp" placeholder="Ingrese Teléfono" required>
                            <i class="fa fa-phone"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label semibold" for="correo_emp">Correo Proveedor</label>
                        <div class="form-control-wrapper form-control-icon-right">
                            <input type="text" class="form-control" id="correo_emp" name="correo_emp" placeholder="Ingrese Correo" required>
                            <i class="fa fa-envelope"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" name="action" id="inser_prove"  class="btn btn-rounded btn-primary">Guardar</button>
                    <button type="button" name="action" id="consul_prove" value="add" class="btn btn-rounded btn-primary">Consultar</button>
                    <button type="button" name="action" id="modi_prove" value="add" class="btn btn-rounded btn-primary">Modificar</button>
                    <button type="button" name="action" id="elim_prove" value="add" class="btn btn-rounded btn-primary">Eliminar</button>                    
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>



 