function limpiarAlmacen() {
    document.getElementById('almacenCab').value = '';
    document.getElementById('codigoAnteriorAlm').value = '';
    document.getElementById('codigoAlm').value = '';
    document.getElementById('descripcionAlm').value = '';
}

function changeAlmacen(select) {
    if (!select.value) {
        limpiarAlmacen(); return;
    }
    document.getElementById('codigoAnteriorAlm').value = select.value;
    document.getElementById('codigoAlm').value = select.value;
    document.getElementById('descripcionAlm').value = select.options[select.selectedIndex].text;
}

function editarArticulo(codigo, descripcion) {
    document.getElementById('codigoAnteriorArt').value = codigo;
    document.getElementById('codigoArt').value = codigo;
    document.getElementById('descripcionArt').value = descripcion;
}