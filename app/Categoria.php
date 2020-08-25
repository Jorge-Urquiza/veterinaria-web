<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Categoria extends Model
{
 
    protected $primaryKey = 'id';
    protected $table ='categorias';

    protected $fillable = [
        'nombre',
        'descripcion', 
    ];
   
    

    //relaciones
    function productos(){
        return $this->hasMany(Producto::class);
     }
}
