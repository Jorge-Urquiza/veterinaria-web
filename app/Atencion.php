<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Atencion extends Model
{
    

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
     
     

     function mascota(){
      return $this->belongsTo(Mascota::class);
    
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
