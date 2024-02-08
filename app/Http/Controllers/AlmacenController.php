<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\TBAlmacenes;

class AlmacenController extends Controller
{
    public function Guardar(Request $request): RedirectResponse {
        $almacen = TBAlmacenes::firstOrNew(['AlmacenID' => $request->codigoAnterior]);
        $almacen->AlmacenID = $request->codigo;
        $almacen->Descripcion = $request->descripcion;
        $almacen->save();
        return redirect('/');
    }
}