@use('App\Models\TBAlmacenes')
@use('App\Models\TBArticulos')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Movimiento inventario</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="{{ asset('js/mantenimientos.js') }}" type="text/javascript"></script>
        <script>
            function buscarMovimiento() {
                const url = '{{url('/')}}';
                window.location.href = url + '?id=' + document.getElementById('noCab').value;
            }
        </script>
    </head>
    <body>

    @include('almacen')
    @include('articulo')

    <form>
        <h4 class="text-center">Movimiento inventario</h4>
        <div class="row mb-5 justify-content-center">
            <div class="col-8">
                <div class="row mb-1">
                    <div class="col-5">
                        <label>No Documento</label>
                        <div class="input-group">
                            <input class="form-control form-control-sm" type="text" id="noCab" name="noCab" required="required" />
                            <button class="btn btn-outline-secondary" type="button">Buscar</button>
                        </div>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-5">
                            <label>Tipo</label>
                            <select class="form-select form-select-sm" id="tipoCab" name="tipoCab" required="required">
                                <option value="">Seleccione una opci&oacute;n</option>
                                <option value="1">Entrada de inventario</option>
                                <option value="2">Salida de inventario</option>
                            </select>
                        </div>
                    </div>
                <div class="row mb-1">
                    <div class="col-5">
                        <label>Almac&eacute;n</label>
                        <div class="input-group">
                            <select class="form-select form-select-sm" id="almacenCab" name="almacenCab" onchange="changeAlmacen(this)" required="required">
                                <option value="">Seleccione una opci&oacute;n</option>
                                @foreach (TBAlmacenes::all() as $almacen)
                                    <option value="{{ $almacen->AlmacenID }}">{{ $almacen->Descripcion }}</option>
                                @endforeach
                                </select>
                                <button class="btn btn-outline-primary" 
                                    type="button"
                                    onclick="limpiarAlmacen()"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modal-almacen">
                                    Nuevo
                                </button>
                                <button class="btn btn-outline-success" 
                                    type="button"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modal-almacen">
                                    Editar
                                </button>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>
                                <a href="javascript:void(0)" 
                                    onclick="editarArticulo('', '')" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#modal-articulo">
                                    Nuevo art&iacute;culo
                                </a>
                            </th>
                            <th>Codigo</th>
                            <th>Descripci&oacute;n</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
        <form method="POST" action="/movimiento" class="p-3">
            @csrf
            <h4 class="text-center">Movimiento inventario</h4>
            <div class="row mb-5 justify-content-center">
                <div class="col-8">
                    <div class="row mb-1">
                        <div class="col-5">
                            <label>No Documento</label>
                            <div class="input-group">
                                <input class="form-control form-control-sm" type="text" id="noCab" name="noCab" required="required" value="{{ $movimiento->DocumentoID }}" />
                                <button class="btn btn-outline-secondary" type="button" onclick="buscarMovimiento()">Buscar</button>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col-5">
                                <label>Tipo</label>
                                <select class="form-select form-select-sm" id="tipoCab" name="tipoCab" required="required">
                                    <option value="">Seleccione una opci&oacute;n</option>
                                    <option value="1" {{ $movimiento->Tipo == '1' ? 'selected' : '' }}>Entrada de inventario</option>
                                    <option value="2" {{ $movimiento->Tipo == '2' ? 'selected' : '' }}>Salida de inventario</option>
                                </select>
                            </div>
                        </div>
                    <div class="row mb-1">
                        <div class="col-5">
                            <label>Almac&eacute;n</label>
                            <div class="input-group">
                                <select class="form-select form-select-sm" id="almacenCab" name="almacenCab" required="required">
                                    <option value="">Seleccione una opci&oacute;n</option>
                                </select>
                                <button class="btn btn-outline-primary" 
                                    type="button">
                                    Nuevo
                                </button>
                                <button class="btn btn-outline-success" 
                                    type="button">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>
                                    <a href="javascript:void(0)">
                                        Nuevo art&iacute;culo
                                    </a>
                                </th>
                                <th>Codigo</th>
                                <th>Descripci&oacute;n</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach (TBArticulos::all() as $index=>$articulo)
                            <tr>
                                <td>
                                    <a href="javascript:void(0)">
                                        Editar
                                    </a>
                                </td>
                                <td>{{ $articulo->ArticuloID }}</td>
                                <td>{{ $articulo->Descripcion }}</td>
                                <td>
                                    <input type="hidden" name="articulos[{{$index}}][Id]" value="{{$articulo->ArticuloID}}" />
                                    <input class="form-control form-control-sm" type="number" name="articulos[{{$index}}][Cantidad]" required="required" 
                                        value="<?php
                                        foreach ($movimiento->detalles as $value) {
                                            if ($value->ArticuloID == $articulo->ArticuloID) {
                                                echo $value->Cantidad;
                                                break;
                                            }
                                        } 
                                        ?>" />
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-8">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </div>
        </form>
    </body>
</html>
