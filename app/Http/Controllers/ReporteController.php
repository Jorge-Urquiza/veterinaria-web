<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReporteController extends Controller
{
    //

    public function getNombre($nombre)
    {                                
        $nombres = DB::table('busquedas')
        ->where('nombre', "like" , "%".$nombre. "%")
        ->get(['id', 'nombre']);

        return response()
                ->json([
                     'nombre'=>$nombres
                ]);
    }
}
