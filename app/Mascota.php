<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Mascota extends Model
{
      //
      use SoftDeletes;
      protected $primaryKey = 'id';
      protected $table ='mascotas';
      protected $fillable = [
          'nombre',
          'raza',
          'color',
          'tipo',
          'cliente_id', 
      ];
      
      
      protected $dates =['deleted_at'];
 
      function cliente(){
         return $this->belongsTo(Cliente::class);
      }
}
