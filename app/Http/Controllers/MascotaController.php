<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

//Model
use App\Mascota;
use App\Cliente;

class MascotaController extends Controller
{
    //iNSTANCIAS A LOS MODELOS
    private $cliente;
    private $mascota;

    public function __construct(){
       $this->cliente = new Cliente();
       $this->mascota = new Mascota();
    }
    public function index()
    {
        $mascotas = $this->mascota->orderBy('id','DESC')->paginate(10);
     
        $this->addPageViews();
        return view('mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->addPageViews();

        $clientes =$this->cliente->orderBy('nombre')->pluck('nombre','id');
        return view('mascotas.create',compact('clientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function store(Request $request){

    
        $request->validate([
            'nombre'=> 'required',
            'raza' => 'required',
            'color'=> 'required',
            'tipo'=> 'required',
            'cliente_id'=> 'required',
        ]); 
        
        $data = $request->all();
        $this->mascota->create($data);
        \App\Buscar::store($request->get('nombre')  ,'mascota','/mascotas');
        $notification = 'Mascota registrado Exitosamente!';
        return redirect()->route('mascotas.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function show(Mascota $mascota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        //
        $this->addPageViews();

        $clientes =$this->cliente->orderBy('nombre')->pluck('nombre','id');
        return view('mascotas.edit',compact('clientes','mascota'));  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mascota $mascota)
    {
    
        $request->validate([
            'nombre'=> 'required',
            'raza' => 'required',
            'color'=> 'required',
            'tipo'=> 'required',
            'cliente_id'=> 'required',
        ]); 
          $this->mascota= $mascota;
        // $this->performValidation($request);
         $data=  $request->all();
         $this->mascota->fill($data);
         $this->mascota->save(); // para guardar los cambios despues de haber usado el "fill" 
       
         $notification = 'Mascota modificada Exitosamente!';
        return redirect()->route('mascotas.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mascota  $mascota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mascota $mascota)
    {
        $this->mascota= $mascota;
        $notification = 'La mascota: '.$mascota->nombre .' ha sido eliminado';
        $this->mascota->delete();
        return \redirect()->route('mascotas.index')->with(compact('notification'));
    }
    private function addPageViews(){
        Auth::user()->countPage(2);
    }
    public function getAmo(Mascota $mascota)
    {   $fullName= $mascota->cliente->nombre . ' ' . $mascota->cliente->apellido;                                      
        return response()
                ->json([
                     'fullname'=>$fullName
                ]);
    }
}
