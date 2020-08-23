<?php

use Illuminate\Database\Seeder;

class BuscarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('buscar')->insert([
            'nombre' => "Evans Balcazar",
            'tipo' =>  "veterinario (Director)",
            'ruta' =>  "/veterinarios",
        ]);
    }
}
