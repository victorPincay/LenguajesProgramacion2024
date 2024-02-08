@use('App\Models\TBArticulos')
<form method="POST" action="/articulo">
    @csrf
    <div class="modal fade" id="modal-articulo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Mantenimiento art&iacute;culo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="codigoAnteriorArt" name="codigoAnterior" />
                <div class="mb-3">
                    <label>C&oacute;digo</label>
                    <input class="form-control form-control-sm" type="text" id="codigoArt" name="codigo" required="required" />
                </div>
                <div class="mb-3">
                    <label>Descripci&oacute;n</label>
                    <input class="form-control form-control-sm" type="text" id="descripcionArt" name="descripcion" required="required" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Aceptar</button>
            </div>
            </div>
        </div>
    </div>
</form>