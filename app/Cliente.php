<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Cliente extends Model
{
    //
    use SoftDeletes;

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
   
    
    protected $dates =['deleted_at'];

}
