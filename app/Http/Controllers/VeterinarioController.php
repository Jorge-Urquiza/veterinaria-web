<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Illuminate\Support\Facades\Hash;

//Model
use App\User;

class VeterinarioController extends Controller
{
    //
    protected $veterinario;

    public function __construct(){
       $this->veterinario = new User();
    }
    
    public function index()
    {
        $veterinarios = $this->veterinario->orderBy('id','DESC')->paginate(10);
        $this->veterinario->countPage(3);
        return view('veterinarios.index',compact('veterinarios'));
    }
    
    
    function create(){
        $this->veterinario->countPage(3);
        return view('veterinarios.create');
    }
    function store(Request $request){
        // el validate usa 2 parametros el request a validar y las reglas que se van a usar
       // $this->performValidation($request);
       // dd($request->all());
       $this->veterinario =  $this->veterinario->Create(
          // mass assigment = ASIGNACION MASIVA
            //$request->all()
            $request->only('nombre','apellido','ci','celular','direccion' , 'email') +
            [
                //'role' => 'doctor',
                'password'=> bcrypt($request->input('password')),
            ]
            //especificamos al request que ccampo queremos 
            //esto evita que el usuario desde el cliente inserte un input con el role admin por ejemplo
        );
        
        $notification = 'Veterinario registrado Exitosamente!';
        return \redirect()->route('veterinarios.index')->with(compact('notification'));
    }
    function edit(User $veterinario){
        $this->veterinario->countPage(3);
        return view('veterinarios.edit',compact('veterinario'));
    }
   
    function update(Request $request,User $veterinario){
        $this->veterinario= $veterinario;
       // $this->performValidation($request);
        $data=  $request->only('nombre','apellido','ci','celular','direccion' , 'email');
        $password= $request->password;
        if($password) $data['password'] = bcrypt($password);
        $this->veterinario->fill($data);
        $this->veterinario->save(); // para guardar los cambios despues de haber usado el "fill" 
        $notification = 'Los datos del Veterinario ha sido actualizado';
        return \redirect()->route('veterinarios.index')->with(compact('notification'));
    }
    function destroy(User $veterinario){
        $this->veterinario= $vterinario;
        $notification = 'El veterinario '.$veterinario->nombre .' ha sido eliminado';
        $this->veterinario->delete();
        return \redirect()->route('veterinarios.index')->with(compact('notification'));
    }
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Su contraseña actual no coincide con la contraseña que proporcionó. Inténtalo de nuevo.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","La nueva contraseña no puede ser la misma que su contraseña actual. Por favor, elija una contraseña diferente.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:3|confirmed',
        ]);
        //Change Password
        $this->veterinario = Auth::user();
        $this->veterinario->password = bcrypt($request->get('new-password'));
        //$user->password_changed_at = \Carbon\Carbon::now();
        $this->veterinario->save();
        return redirect()->route('home')->with("success","Contraseña cambiada con éxito !");
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
    public function color(Request $request)
    {     
        $this->veterinario = $this->veterinario->find(Auth::id());
        $this->veterinario->color = $request->get('color');
        if($request->get('font_size') != null)
        {
            $this->veterinario->font_size = $request->get('font_size')."px";
        }
        $this->veterinario->save();
        return redirect('home');
    }
   
}
