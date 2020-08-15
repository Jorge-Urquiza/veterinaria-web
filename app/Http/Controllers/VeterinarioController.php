<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class VeterinarioController extends Controller
{
    //
    public function index()
    {
        $veterinarios = User::orderBy('id','DESC')->paginate(10);
        Auth::user()->countPage(3);
        return view('veterinarios.index',compact('veterinarios'));
    }

    public function color(Request $request)
    {
        $user = User::find(Auth::id());
        $user->color = $request->get('color');
        if($request->get('font_size') != null)
        {
            $user->font_size = $request->get('font_size')."px";
        }
        $user->save();
        return redirect('home');
    }
   
    
    function create(){
        Auth::user()->countPage(3);
        return view('veterinarios.create');
    }
    
    function store(Request $request){
        // el validate usa 2 parametros el request a validar y las reglas que se van a usar
        dd($request->all());
        $this->performValidation($request);
       // dd($request->all());
         $user= User::Create(
          // mass assigment = ASIGNACION MASIVA
            //$request->all()
            $request->only('name','email','dni','address','phone') +
            [
                'role' => 'doctor',
                'password'=> bcrypt($request->input('password')),
            ]
            //especificamos al request que ccampo queremos 
            //esto evita que el usuario desde el cliente inserte un input con el role admin por ejemplo
        );
        // PARA LLENAR LA TABLA MUCHOS A MUCHOS!
        $user->specialties()->attach($request->input('specialties')); 
        $notification = 'La especialidad ha sido registrada Exitosamente!';
        return \redirect()->route('doctors.index')->with(compact('notification'));
    }
    function edit(User $veterinario){
        Auth::user()->countPage(3);
        return view('veterinarios.edit',compact('veterinario'));
    }
    private function performValidation(Request $request){
          
        $rules= [
            'name' => 'required|min:3',
            'email' => 'required|email', // laravel ya verifica el email con la regla email
            // para ver las reglas mriar la documentacion "available ryles"}
            'dni' =>    'nullable|digits:8',
            'address' =>   'nullable|min:8',
            'phone' =>    'nullable|min:6', // MINIMO 6 CHARS
        ];
        $messages=[
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Es necesario ingresar un nombre',
            'dni.min' => 'Su DNI debe tener 8 digitos',
            'address.min' => 'Su Direccion debe contener al menos 8 caracteres',
        ];
        // EL TERCER PARAMETRO DE LOS MENSAJES ES OPCIONAL
        $this->validate($request,$rules,$messages);
    }
    function update(Request $request,User $doctor){
        //dd($request->all() , $doctor->toArray());
        dd($request->all());
        $this->performValidation($request);
        $data=  $request->only('name','email','dni','address','phone');
        $password= $request->password;
        if($password) $data['password'] = bcrypt($password);
      
        $doctor->fill($data);
        $doctor->save(); // para guardar los cambios despues de haber usado el "fill" 
        // para modificar la tabla "intermedia"
        $doctor->specialties()->sync($request->input('specialties'));
        // LARAVEL SYNCRONIZA LAS ESPECIALIDADES QUE NO TENIA.

        $notification = 'Los Datos del Médico ha sido actualizado';
        return \redirect()->route('veterinarios.index')->with(compact('notification'));
    }
    function destroy(User $veterinario){
        $notification = 'El veterinario '.$veterinario->nombre .' ha sido eliminado';
        $veterinario->delete();
        return \redirect()->route('veterinarios.index')->with(compact('notification'));
    }
  
}
