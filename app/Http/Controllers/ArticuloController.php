<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\TBArticulos;

class ArticuloController extends Controller
{
    public function Guardar(Request $request): RedirectResponse {
        $articulo = TBArticulos::firstOrNew(['ArticuloID' => $request->codigoAnterior]);
        $articulo->ArticuloID = $request->codigo;
        $articulo->Descripcion = $request->descripcion;
        $articulo->save();
        return redirect('/');
    }
}