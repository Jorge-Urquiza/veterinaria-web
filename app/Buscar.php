<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;
class Buscar extends Model
{
    //
    protected $table='buscar';

    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable=[
         'nombre',
         'tipo',
         'ruta'
    ];

    public static function buscar($request){
        $nombres=DB::table('buscar')
            ->where('nombre','LIKE','%'.$request->get('nombre').'%')
            ->orderBy('id','asc')->get();
        return  $nombres;
    }

    public static function autocomplete(){
        $nombres=DB::table('buscar')
            ->select('nombre')
            ->orderBy('nombre','asc')->get();
        return  $nombres;
    }

    public static function store($nombre,$tipo,$ruta){
        $buscar=new Buscar;
        $buscar->nombre=$nombre;
        $buscar->tipo=$tipo;
        $buscar->ruta=$ruta;
        $buscar->save();
    }
}
