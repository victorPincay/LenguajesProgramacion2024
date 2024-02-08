<div class="modal fade" id="modal-busqueda" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5">B&uacute;squeda movimiento inventario</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label>No Documento</label>
                <input class="form-control form-control-sm" type="text" id="noCab" name="noCab" required="required" />
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" onclick="buscarMovimiento()">Aceptar</button>
        </div>
        </div>
    </div>
</div>