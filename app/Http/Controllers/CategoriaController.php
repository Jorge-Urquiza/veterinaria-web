<?php

namespace App\Http\Controllers;

use App\Categoria;
use Auth;
use App\User;
use Illuminate\Http\Request;

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
        'descripcion' => 'required',
        
    ]);
    $data = $request->all();
    $this->categoria->create($data);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
        
        $this->cliente= $categoria;
        $notification = 'La categoria: '.$categoria->nombre .' ha sido eliminada';
        $this->cliente->delete();
        return \redirect()->route('categorias.index')->with(compact('notification'));
    }
    private function addCountVisit(){
        Auth::user()->countPage(4);
    }
}
