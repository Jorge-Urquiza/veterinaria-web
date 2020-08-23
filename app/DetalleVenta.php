<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Support\Facades\DB;

class DetalleVenta extends Model
{
    //
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $table ='detalle_venta';

    protected $fillable = [
        'venta_id', 
        'producto_id', 
        'cantidad',   
        'precio',  
        'subtotal',
    ];
   
    
    protected $dates =['deleted_at'];

    function producto(){
        return $this->belongsTo(Producto::class);
     }
}
