<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cliente extends Model
{
   
    protected $primaryKey = 'id';
    protected $table ='clientes';

    protected $fillable = [
        'nombre',
        'apellido', 
        'ci',   
        'genero', 
        'celular',
        'edad'
    ]; 
  

    function mascotas(){
        return $this->hasMany(Mascota::class);
     }
}
