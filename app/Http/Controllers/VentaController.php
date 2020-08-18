<?php

namespace App\Http\Controllers;

use App\Venta;
use App\Producto;
use App\Cliente;
use App\User;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

/*

problema
observaciones
diagnostico
TIPOS DE ATENCIONES
*/

    public function index()
    {
        //
        $this->addPageViews();
        $ventas= Venta::orderBy('id','DESC')->paginate(10);
        return view('ventas.index',compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->addPageViews();
        $productos =Producto::orderBy('nombre')->pluck('nombre','id');
        $clientes =Cliente::orderBy('nombre')->pluck('nombre','id');
        $veterinarios =User::orderBy('nombre')->pluck('nombre','id');
        $productos =Producto::orderBy('nombre')->pluck('nombre','id');
        return view('ventas.create',compact('productos','clientes', 'veterinarios' , 'productos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function show(Venta $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        //
    }
    private function addPageViews(){
        Auth::user()->countPage(6);
    }
}
