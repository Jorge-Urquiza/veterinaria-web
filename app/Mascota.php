<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Mascota extends Model
{
      
      protected $primaryKey = 'id';
      protected $table ='mascotas';
      protected $fillable = [
          'nombre',
          'raza',
          'color',
          'tipo',
          'cliente_id', 
      ];
      
     
 
      function cliente(){
         return $this->belongsTo(Cliente::class);
      }
     
}
