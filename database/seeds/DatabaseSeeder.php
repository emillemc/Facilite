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

        DB::table('professionals')->insert([
        	'name' 		=> 'Raniery Pontes',
        	'email'		=> 'pontesraniery@gmail.com',
        	'password'	=> Hash::make('123456'),
        	'cpf'		=> '05897430403',
        	'tel'		=> '83986149858',
        ]);
    }
}
