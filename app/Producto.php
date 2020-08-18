<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Producto extends Model
{
    //
     //
     use SoftDeletes;

     protected $primaryKey = 'id';
     protected $table ='productos';
     protected $fillable = [
         'nombre',
         'precio',
         'stock',
         'categoria_id', 
     ];
     
     
     protected $dates =['deleted_at'];

     function categoria(){
        return $this->belongsTo(Categoria::class);
     }
}
