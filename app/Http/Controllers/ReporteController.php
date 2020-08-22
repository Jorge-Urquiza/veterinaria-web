<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Atencion;
use App\Producto;
use App\User;
use Carbon\Carbon;
class ReporteController extends Controller
{
    //

    private function addPageViews(){
        Auth::user()->countPage(8);
    }
    public function atenciones(){
        $this->addPageViews();
        $montlyCounts=Atencion::select(
            DB::raw('MONTH(fecha) as month'), 
            DB::raw('COUNT(1) as count '))
         ->groupBy('month')->get()->toArray();
        $counts=array_fill(0,12,0); // inicio, fin y valores que quiero setear al array
        foreach($montlyCounts as $montlyCount){
            $index=$montlyCount['month']-1;
            $counts[$index]= $montlyCount['count'];
        }
        return view('reportes.atenciones',compact('counts'));

    }
    public function veterinarios(){
        $this->addPageViews();
        $array1=[];
        $array2=[];
        $atenciones = Atencion::groupBy('veterinario_id')->select('veterinario_id', DB::raw('count(*) as total'))->get();
        //dd($products_warranty);
        foreach ($atenciones as $atencion)
        {
            array_push($array1,$atencion->total);
            array_push($array2,$atencion->veterinario->nombre . ' '. $atencion->veterinario->apellido);
        }

      //dd(json_encode($array2));
       return view('reportes.veterinarios')->with('data1',json_encode($array1))->with('labels1',json_encode($array2));
    }

    function productos(){
        $this->addPageViews();
        $array1=[];
        $array2=[];
        $productos = Producto::groupBy('categoria_id')->select('categoria_id', DB::raw('count(*) as total'))->get();
        //dd($products_warranty);
        foreach ($productos as $producto)
        {
            array_push($array1,$producto->total);
            array_push($array2,$producto->categoria->nombre);
        }

       
        //dd(json_encode($array2));
       return view('reportes.productos')->with('data1',json_encode($array1))->with('labels1',json_encode($array2));

    }

}
