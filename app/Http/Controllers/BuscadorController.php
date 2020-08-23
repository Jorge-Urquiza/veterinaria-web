<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Buscar;

class BuscadorController extends Controller
{
    //

    public function index(Request $request)
    {
        $nombre = Buscar::buscar($request);
        return view('buscador.index', compact('nombre'));
    }

    public function buscar()
    {
        $nombres = Buscar::autocomplete();
        return  $nombres;
    }
}
