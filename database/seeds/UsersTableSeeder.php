<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
                'nombre'=> 'Jorge Luis',
                'apellido'=> 'Urquiza',
                'password' => '$2y$12$owIzMEmivTmbGNTZx/fkue4Kk2J/0wFqH2PomZ.JXaMgic3uNcquu', // 123456
                'ci' => '9584368', 
                'celular'=> '78036436', 
                'direccion'=> 'Calle paraguay #22',
                'email' => 'jorge@gmail.com'
        ]);
        DB::table('users')->insert([
            'nombre'=> 'Ernesto',
            'apellido'=> 'Zambrana',
            'password' => '$2y$12$owIzMEmivTmbGNTZx/fkue4Kk2J/0wFqH2PomZ.JXaMgic3uNcquu', // 123456
            'ci' => '1025874', 
            'celular'=> '75455743', 
            'direccion'=> 'Calle uruguay#755',
            'email' => 'ernesto@gmail.com'
    ]);

    DB::table('users')->insert([
        'nombre'=> 'Luis',
        'apellido'=> 'Veizaga',
        'password' => '$2y$12$owIzMEmivTmbGNTZx/fkue4Kk2J/0wFqH2PomZ.JXaMgic3uNcquu', // 123456
        'ci' => '528403', 
        'celular'=> '75575743', 
        'direccion'=> 'Calle Indana#115',
        'email' => 'luis@gmail.com'
]);

        
    }
}
