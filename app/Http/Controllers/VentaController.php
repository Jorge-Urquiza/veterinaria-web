<?php

namespace App\Http\Controllers;
use DB;
use App\Venta;
use Carbon\Carbon;
use App\Producto;
use App\DetalleVenta;
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
        return view('ventas.create', compact('productos','clientes', 'veterinarios' , 'productos'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        try{
            DB::beginTransaction();
            $request->validate([
                'nit'=> 'required',
                'cliente_id' => 'required',
                'veterinario_id'=> 'required',
                'fecha'=> 'required',
            ]); 
            $hora = (Carbon::now())->toDateTimeString();
            $total= 0;
            $input = $request->all();
            $input['total']=$total;
            $input['hora']=$hora;
            $venta = Venta::create($input);

            $producto_id= $request->get('productoid');
            $cantidad = $request->get('cantidad');
            $precio= $request->get('precio');
           
            $index = 0;
            while($index < count($producto_id)){

                $data['venta_id']=$venta->id;
                $data['producto_id']= $producto_id[$index];
                $data['cantidad']=$cantidad[$index];
                $data['precio']= $precio[$index];
                $subtotal = $cantidad[$index] * $precio[$index];
                $data['subtotal']=$subtotal;
                $total=$total + $subtotal;

                DetalleVenta::create($data);
             
                $index++;
            }

            $venta->total = $total;
            $venta->save();
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        $notification = 'Venta registrada Exitosamente!';
        return redirect()->route('ventas.index')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */

    public function edit(Venta $venta)
    {
        $this->addPageViews();
        $clientes =Cliente::orderBy('nombre')->pluck('nombre','id');
        $detalles =DetalleVenta::where('venta_id', $venta->id)->orderBy('id','DESC')->paginate(10);
        $veterinarios =User::orderBy('nombre')->pluck('nombre','id');
        return view('ventas.edit',compact('venta', 'detalles' ,'veterinarios', 'clientes' ));
    }

    public function show(Venta $venta)
    {  
        
        $this->addPageViews();

        $detalles =DetalleVenta::where('venta_id', $venta->id)->orderBy('id','DESC')->paginate(10);
        return view('ventas.show',compact('venta', 'detalles'));

    }

    public function update(Request $request, Venta $venta)
    {

        $request->validate([
            'nit'=> 'required',
            'fecha' => 'required',
            'hora'=> 'required',
            'veterinario_id'=> 'required|numeric',
            'cliente_id'=> 'required|numeric',
          
        ]);
        
         $data=  $request->all();
         $venta->fill($data);
         $venta->save(); // para guardar los cambios despues de haber usado el "fill" 
         $notification = 'Venta modificado Exitosamente!';
        return redirect()->route('ventas.index')->with(compact('notification'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        
        $notification = 'La venta con id: '. $venta->id  . ' ha sido eliminada';
        $venta->delete();
        return \redirect()->route('ventas.index')->with(compact('notification'));
    }
    function pdf(Venta $venta){
        $detalles =DetalleVenta::all();

        $pdf = \PDF::loadView('ventas.reporte',compact('venta', 'detalles'));
        return $pdf->stream();
    }
    private function addPageViews(){
        Auth::user()->countPage(6);
    }
}
