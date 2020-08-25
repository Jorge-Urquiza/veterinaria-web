<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetalleVenta extends Model
{
   
    protected $primaryKey = 'id';
    protected $table ='detalle_venta';

    protected $fillable = [
        'venta_id', 
        'producto_id', 
        'cantidad',   
        'precio',  
        'subtotal',
    ];
   

    function producto(){
        return $this->belongsTo(Producto::class);
     }
}
