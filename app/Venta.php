<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

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
        'fecha',
    ];
   
    
    protected $dates =['deleted_at'];
}
