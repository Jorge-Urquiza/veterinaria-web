<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


     protected $fillable = [
        'nombre',
        'apellido', 
        'ci',    
        'celular',
        'direccion',
        'email',
        'password',
        'color',
        'rol',
        'font_size'
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function countPage($id){
        $page = Page::findOrFail($id);
        $page->count = $page->count +1;
        $page->save();
    }

    public function showCounter($id){
        $page = Page::findOrFail($id);
        return $page->cu." || Numero de visitas: ".$page->count;
    }
    public function total(){
        $total = DB::table('pages')
                ->sum('count');
        return "Numero total de visitas en el sitio : ".$total;
    }
    public function getStatsPages(){
        $array = [];
        for($i=1; $i <= 8;$i++){
            $page = Page::findOrFail($i);
            array_push($array,$page->count);
        }
       return json_encode($array);
    }
     
    function atenciones(){
        return $this->hasMany(Atencion::class,'veterinario_id');
    }


}
