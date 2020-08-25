<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Producto extends Model
{
  
     protected $primaryKey = 'id';
     protected $table ='productos';
     protected $fillable = [
         'nombre',
         'precio',
         'stock',
         'categoria_id', 
     ];


     function categoria(){
        return $this->belongsTo(Categoria::class);
     }
}
