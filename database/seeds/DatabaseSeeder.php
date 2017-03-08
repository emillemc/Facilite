<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // DB::table('professionals')->insert([
        // 	'name' 		=> 'Raniery Pontes',
        // 	'email'		=> 'pontesraniery@gmail.com',
        // 	'password'	=> Hash::make('123456'),
        // 	'cpf'		=> '05897430403',
        // 	'tel'		=> '83986149858',
        // ]);

        // ******** Seeder Categorias ****** //
        DB::table('categorias')->insert([
            'name'      => 'Moda e Beleza',
            'url'     => 'moda-beleza'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Casa',
            'url'     => 'casa'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Transporte',
            'url'     => 'transporte'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Saúde',
            'url'     => 'saude'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Aulas',
            'url'     => 'aulas'
        ]);

        DB::table('categorias')->insert([
            'name'      => 'Eventos',
            'url'     => 'eventos'
        ]);

        // ******** Seeder Serviços ****** //
        DB::table('servicos')->insert([
            'categoria_id'  => 1,
            'name'          => 'Manicure',
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 1,
            'name'          => 'Cabeleleiro',
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 2,
            'name'          => 'Pedreiro',
        ]);
    }
}
