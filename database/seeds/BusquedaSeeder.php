<?php

use Illuminate\Database\Seeder;

class BusquedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('busquedas')->insert([
            'nombre' => "listar cliente"
        ]);
        DB::table('busquedas')->insert([
            'nombre' => "registrar cliente"
        ]);

        DB::table('busquedas')->insert([
            'nombre' => "listar mascota"
        ]);
        DB::table('busquedas')->insert([
            'nombre' => "registrar mascota"
        ]);

        DB::table('busquedas')->insert([
            'nombre' => "listar veterinario"
        ]);
        DB::table('busquedas')->insert([
            'nombre' => "registrar veterinario"
        ]);

        DB::table('busquedas')->insert([
            'nombre' => "listar categoria"
        ]);
        DB::table('busquedas')->insert([
            'nombre' => "registrar categoria"
        ]);

        DB::table('busquedas')->insert([
            'nombre' => "listar producto"
        ]);
        DB::table('busquedas')->insert([
            'nombre' => "registrar producto"
        ]);

        DB::table('busquedas')->insert([
            'nombre' => "listar venta"
        ]);
        DB::table('busquedas')->insert([
            'nombre' => "registrar venta"
        ]);

        DB::table('busquedas')->insert([
            'nombre' => "listar atencion"
        ]);
        DB::table('busquedas')->insert([
            'nombre' => "registrar atencion"
        ]);

        DB::table('busquedas')->insert([
            'nombre' => "reporte1"
        ]);
        DB::table('busquedas')->insert([
            'nombre' => "reporte2"
        ]);
    }
}
