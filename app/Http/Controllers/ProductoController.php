<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

//Model 


use App\Producto;
use App\Categoria;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $producto;
    protected $categoria;

    public function __construct(){
       $this->producto = new Producto();
       $this->categoria = new Categoria();
       
    }
    public function index()
    {
        //
        $this->addCountVisit();
        $productos = $this->producto->orderBy('id','DESC')->paginate(10);
        return view('productos.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->addCountVisit();
        $categorias = $this->categoria->orderBy('nombre')->pluck('nombre','id');
        return view('productos.create',compact('categorias'));
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
       
        $request->validate([
        'nombre'=> 'required',
        'precio' => 'required|numeric|min:1',
        'stock' => 'required|numeric|min:1',
        'categoria_id' => 'required|numeric',
        
    ]);
    $data = $request->all();
    $this->producto->create($data);
    $notification = 'Producto registrado Exitosamente!';
    return redirect()->route('productos.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        //
        $categorias = $this->categoria->orderBy('nombre')->pluck('nombre','id');
        $this->addCountVisit();
        return view('productos.edit',compact('producto','categorias'));
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'nombre'=> 'required',
            'precio' => 'required|numeric',
            'stock'=> 'required|numeric',
            'categoria_id'=> 'required',
        ]);
          $this->producto= $producto;
        // $this->performValidation($request);
         $data=  $request->all();
         $this->producto->fill($data);
         $this->producto->save(); // para guardar los cambios despues de haber usado el "fill" 
         $notification = 'Producto modificado Exitosamente!';
        return redirect()->route('productos.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $this->producto= $producto;
        $notification = 'El producto: '.$producto->nombre .' ha sido eliminado';
        $this->producto->delete();
        return \redirect()->route('productos.index')->with(compact('notification'));
    }
    private function addCountVisit(){
        Auth::user()->countPage(5);
    }
    public function getPrecio(Producto $producto)
    {                                        
        return response()
                ->json([
                     'precio'=>$producto->precio
                ]);
    }
}
