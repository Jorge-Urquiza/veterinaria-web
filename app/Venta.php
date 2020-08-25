<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Support\Facades\DB;
class Venta extends Model
{
    //
    //
    use SoftDeletes;

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
   
    
    protected $dates =['deleted_at'];
    
    function veterinario(){
        return $this->belongsTo(User::class);
     }
     function cliente(){
        return $this->belongsTo(Cliente::class);
     }
}
