<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Atencion;
use App\Mascota;
class AtencionController extends Controller
{

    protected $atencion;
    

    public function __construct(){
       $this->atencion = new Atencion();
    }
   
    public function index()
    {
        $this->addPageViews();
        $atenciones= Atencion::orderBy('id','DESC')->paginate(10);
        return view('atenciones.index',compact('atenciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->addPageViews();
        $mascotas =Mascota::orderBy('nombre')->pluck('nombre','id');
        $veterinarios =User::orderBy('nombre')->pluck('nombre','id');
        return view('atenciones.create',compact('mascotas', 'veterinarios'));
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
            'fecha'=> 'required',
            'hora'=> 'required',
            'tipo'=> 'required',
            'mascota_id'=> 'exists:mascotas,id',
            'problema'=> 'required',
            'diagnostico'=> 'required',
            'tratamiento'=> 'required',
        ]); 
        $data = $request->all();
       
        $this->atencion->create($data);
        $notification = 'Atención registrada Exitosamente!';
        return redirect()->route('atenciones.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function show(Atencion $atencion)
    {
        return view('atenciones.show',compact('atencion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */

    public function edit(Atencion $atencion)
    {
        $this->addPageViews();
        $veterinarios = User::orderBy('nombre')->pluck('nombre','id');
        $mascotas = Mascota::orderBy('nombre')->pluck('nombre','id');
        return view('atenciones.edit',compact('atencion','veterinarios','mascotas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atencion  $atencion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atencion $atencion)
    {
       
        $request->validate([
            'fecha'=> 'required',
            'hora'=> 'required',
            'tipo'=> 'required',
            'mascota_id'=> 'exists:mascotas,id',
            'problema'=> 'required',
            'diagnostico'=> 'required',
            'tratamiento'=> 'required',
        ]); 
         $data=  $request->all();
        $atencion->fill($data);
        $atencion->save(); // para guardar los cambios despues de haber usado el "fill" 
        $notification = 'Atención modificada Exitosamente!';
        return redirect()->route('atenciones.index')->with(compact('notification'));

    }
    
    public function destroy(Atencion $atencion)
    {
        $notification = 'La atención ha sido eliminada';
        $atencion->delete();
        return \redirect()->route('atenciones.index')->with(compact('notification'));
    }
    private function addPageViews(){
        Auth::user()->countPage(7);
    }
}
