<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Venta extends Model
{

    protected $primaryKey = 'id';

    protected $table ='ventas';

    protected $fillable = [
        'nit',
        'cliente_id', 
        'veterinario_id',   
        'total', 
        'hora', 
        'fecha',
    ];
   

    
    function veterinario(){
        return $this->belongsTo(User::class);
     }
     function cliente(){
        return $this->belongsTo(Cliente::class);
     }
}
