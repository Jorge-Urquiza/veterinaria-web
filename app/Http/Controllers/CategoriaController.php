<?php

namespace App\Http\Controllers;

use App\Categoria;
use Auth;
use App\User;
use Illuminate\Http\Request;

//Model

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $categoria;

    public function __construct(){
       $this->categoria = new Categoria();
       
    }
    public function index()
    {
        //
        $categorias = $this->categoria->orderBy('id','DESC')->paginate(10);
        
        $this->addCountVisit();
        return view('categorias.index',compact('categorias'));
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
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $request->validate([
            'nombre'=> 'required',
            'descripcion' => 'required|max:255',
            
        ]);
        $data = $request->all();
        $this->categoria->create($data);
        \App\Buscar::store($request->get('nombre') ,'categoria','/categorias');
        $notification = 'Categoria registrada Exitosamente!';
        return redirect()->route('categorias.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit(Categoria $categoria)
    {
        //
        $this->addCountVisit();
        return view('categorias.edit',compact('categoria'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categoria $categoria)
    {
        //
        
        $request->validate([
            'nombre'=> 'required',
            'descripcion' => 'required|max:255',
          
        ]);
          $this->categoria= $categoria;
        // $this->performValidation($request);
         $data=  $request->all();
         $this->categoria->fill($data);
         $this->categoria->save(); // para guardar los cambios despues de haber usado el "fill" 
         $notification = 'Categoria modificada Exitosamente!';
        return redirect()->route('categorias.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        
        $notification = 'La categoria: '.$categoria->nombre .' ha sido eliminada';
        $categoria->delete();
        return \redirect()->route('categorias.index')->with(compact('notification'));
    }
    private function addCountVisit(){
        Auth::user()->countPage(4);
    }
    
}
