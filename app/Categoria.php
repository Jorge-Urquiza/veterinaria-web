<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Categoria extends Model
{
    //
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table ='categorias';

    protected $fillable = [
        'nombre',
        'descripcion', 
    ];
   
    
    protected $dates =['deleted_at'];

    //relaciones
    function productos(){
        return $this->hasMany(Producto::class);
     }
}
