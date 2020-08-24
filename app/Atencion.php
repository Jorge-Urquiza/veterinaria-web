<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
class Atencion extends Model
{
    //
     //
     use SoftDeletes;

     protected $primaryKey = 'id';
     protected $table ='atenciones';
     protected $fillable = [
         'fecha',
         'hora',
         'tipo', // emergencai preventivo control
         'problema',
         'diagnostico',
         'tratamiento',
         'veterinario_id', 
         'mascota_id', 
     ];
     
     
     protected $dates =['deleted_at'];

     function mascota(){
      return $this->belongsTo(Mascota::class, 'id');
    
   }
     function veterinario(){
      return $this->belongsTo(User::class);
    }
   /*
   function veterinario(){
      return $this->belongsTo(User::class);
   }
   */
}
