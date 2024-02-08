<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\TBMovimientoCAB;

class MovimientoController extends Controller
{
    public function Index(Request $request) {
        $movimiento = TBMovimientoCAB::with('detalles')->firstOrNew(['DocumentoID' => $request->id]);
        if (isset($request->id)) {
            return view('welcome', ['movimiento' => $movimiento]);
        }
        return view('welcome', ['id' => TBMovimientoCAB::count() + 1, 'movimiento' => $movimiento]);
    }

    public function Guardar(Request $request): RedirectResponse {
        $movimiento = new TBMovimientoCAB;
        $movimiento->Fecha = now();
        $movimiento->Tipo = $request->tipoCab;
        $movimiento->Almacen = $request->almacenCab;
        $movimiento->save();
        foreach ($request->articulos as $articulo) {
            DB::insert('insert into TBMovimientoDET(DocumentoID,ArticuloID,Cantidad) values(?,?,?)', [
                $movimiento->DocumentoID, $articulo['Id'], $articulo['Cantidad']
            ]);
            $existencia =  DB::scalar('select 1 from TBExistencia where ArticuloID=? and AlmacenID=? limit 1', [
                $articulo['Id'], $movimiento->Almacen
            ]);
            if ($existencia == null) {
                DB::insert('insert into TBExistencia(ArticuloID,AlmacenID,Cantidad) values(?,?,?)', [
                    $articulo['Id'], $movimiento->Almacen, $articulo['Cantidad']
                ]);
            } else {
                if ($movimiento->Tipo == 1) {
                    DB::update('update TBExistencia set Cantidad=Cantidad+? where ArticuloID=? and AlmacenID=?', [
                        $articulo['Cantidad'], $articulo['Id'], $movimiento->Almacen
                    ]);
                }
                if ($movimiento->Tipo == 2) {
                    DB::update('update TBExistencia set Cantidad=Cantidad-? where ArticuloID=? and AlmacenID=?', [
                        $articulo['Cantidad'], $articulo['Id'], $movimiento->Almacen
                    ]);
                }
            }
        }
        return redirect('/');
    }
}