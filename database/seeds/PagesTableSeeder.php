<?php

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'cu' => "CU1: Gestionar Cliente"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU2: Gestionar Mascota"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU3: Gestionar Veterinario"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU4: Gestionar Categoria"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU5: Gestionar Producto"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU6: Gestionar Atencion"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU7: Gestionar Venta"
        ]);
        DB::table('pages')->insert([
            'cu' => "CU8: Reportes y Estadisticas"
        ]);

    }
}
