<div id="modalnovedad" class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" id="novedad_form">
                <div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="font-icon-close-2"></i>
                    </button>
                    <h4 class="modal-title" id="mdlTitulo">Nueva Novedad</h4>
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
                        <label class="form-label semibold" for="medidad_prev">Medidas Preventivas</label>
                        <textarea rows="4" class="form-control" id="medidad_prev" name="medidad_prev" placeholder="Escriba las medidas preventivas"></textarea>
                        <small class="text-muted text-danger alerta" id="medidad_prev_alert" hidden>Las medidas de prevención son mínimo de 20 y max de 250 caracteres.</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="action1" value="add" class="btn azul btn-rounded btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

