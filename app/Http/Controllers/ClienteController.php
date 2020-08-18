<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
//Model
use App\Cliente;


class ClienteController extends Controller
{
    protected $cliente;

    public function __construct(){
       $this->cliente = new Cliente();
    }
    //Caso de uso 1
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $clientes = $this->cliente->orderBy('id','DESC')->paginate(10);
        
        $this->addPageViews();
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->addPageViews();
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

  
    $request->validate([
        'nombre'=> 'required',
        'apellido' => 'required',
        'ci'=> 'unique:clientes',
        'genero'=> 'required',
        'celular'=> 'required|numeric',
        'edad'=> 'required|numeric',
    ]);
    $data = $request->all();
    $this->cliente->create($data);
    $notification = 'Cliente registrado Exitosamente!';
    return redirect()->route('clientes.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        $this->addPageViews();
        $generos= collect([ 'Masculino' ,'Femenino' ,'Otro']);
        return view('clientes.edit',compact('cliente', 'generos'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
      
        $request->validate([
            'nombre'=> 'required',
            'apellido' => 'required',
            'ci'=> 'required',
            'genero'=> 'required',
            'celular'=> 'required|numeric',
            'edad'=> 'required|numeric',
        ]);
          $this->cliente= $cliente;
        // $this->performValidation($request);
         $data=  $request->all();
         $this->cliente->fill($data);
         $this->cliente->save(); // para guardar los cambios despues de haber usado el "fill" 
         $notification = 'Cliente modificado Exitosamente!';
        return redirect()->route('clientes.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $this->cliente= $cliente;
        $notification = 'El veterinario '.$cliente->nombre .' ha sido eliminado';
        $this->cliente->delete();
        return \redirect()->route('clientes.index')->with(compact('notification'));
    }
    private function addPageViews(){
        Auth::user()->countPage(1);
    }
}
