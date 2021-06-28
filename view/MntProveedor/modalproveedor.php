<div id="modalproveedor" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="proveedor_form">
                <div class="modal-header">
                    <h4><strong>Gestionar Proveedores </strong><span class="glyphicon glyphicon-phone-alt"></span></h4>
                </div>
                <div class="modal-body">
                   <div class="form-group">
                        <label class="form-label" for="prov_nom">Nombre Proveedor</label>
                        <input type="text" class="form-control" id="prov_nom" name="prov_nom" placeholder="Ingrese Nombre" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="prov_dire">Dirección Proveedor</label>
                        <input type="text" class="form-control" id="prov_dire" name="prov_dire" placeholder="Ingrese Dirección" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="prov_tel">Teléfono Proveedor</label>
                        <input type="text" class="form-control" id="prov_tel" name="prov_tel" placeholder="Ingrese Teléfono" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="prov_email">Correo Proveedor</label>
                        <input type="text" class="form-control" id="prov_email" name="prov_email" placeholder="Ingrese Correo" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="action" id="#" value="add" class="btn btn-rounded btn-primary">Guardar</button>
                    <button type="submit" name="action" id="consul_prove" value="add" class="btn btn-rounded btn-primary">Consultar</button>
                    <button type="submit" name="action" id="modi_prove" value="add" class="btn btn-rounded btn-primary">Modificar</button>
                    <button type="submit" name="action" id="elim_prove" value="add" class="btn btn-rounded btn-primary">Eliminar</button>                    
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>