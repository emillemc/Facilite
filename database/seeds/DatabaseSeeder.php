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

        // ************* Seeder Categorias ********** //
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

        // ************** Seeder Serviços *********** //

        //*** Serviços (cat. Moda e Beleza)
        DB::table('servicos')->insert([
            'categoria_id'  => 1,
            'name'          => 'Manicure',
            'url'           => 'manicure'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 1,
            'name'          => 'Cabeleleiro',
            'url'           => 'cabeleleiro'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 1,
            'name'          => 'Depilação',
            'url'           => 'depilacao'
        ]);
        // *************************//

        //*** Serviços (cat. Casa)
        DB::table('servicos')->insert([
            'categoria_id'  => 2,
            'name'          => 'Pedreiro',
            'url'           => 'pedreiro'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 2,
            'name'          => 'Eletricista',
            'url'           => 'eletricista'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 2,
            'name'          => 'Carpinteiro',
            'url'           => 'carpinteiro'
        ]);
        // *************************//

        //*** Serviços (cat. Transporte)
        DB::table('servicos')->insert([
            'categoria_id'  => 3,
            'name'          => 'Motorista',
            'url'           => 'motorista'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 3,
            'name'          => 'Motoboy',
            'url'           => 'motoboy'
        ]);

        DB::table('servicos')->insert([
            'categoria_id'  => 3,
            'name'          => 'Lavagem Automotiva',
            'url'           => 'lavagem-automotiva'
        ]);
        // *************************//

        // *********** Seeder Especialidades ******** //

        //***** Especialidades (serviço Manicure)
        DB::table('especialidades')->insert([
            'servico_id'    => 1,
            'name'          => 'Pedicure'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 1,
            'name'          => 'Podóloga'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 1,
            'name'          => 'Unhas Personalizadas'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 1,
            'name'          => 'Outros'
        ]);
        // *************************//

        //***** Especialidades (serviço Cabeleleiro)
        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Cortes Masculinos'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Cortes Femininos'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Alisamento'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Tintura'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Escova'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 2,
            'name'          => 'Outros'
        ]);
        // *************************//

        //***** Especialidades (serviço Depilação)
        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'Cera Quente'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'Cera Fria'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'Roll On'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'À Linha'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 3,
            'name'          => 'Outros'
        ]);
        // *************************//

        //***** Especialidades (serviço Pedreiro)
        DB::table('especialidades')->insert([
            'servico_id'    => 4,
            'name'          => 'Telhadista'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 4,
            'name'          => 'Porcelanato'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 4,
            'name'          => 'Piso e Alvenaria'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 4,
            'name'          => 'Outros'
        ]);
        // *************************//

        //** Especialidades (serviço Eletricista)
        DB::table('especialidades')->insert([
            'servico_id'    => 5,
            'name'          => 'Cabeamento'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 5,
            'name'          => 'Fiações Elétricas'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 5,
            'name'          => 'Quadros Elétricos'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 5,
            'name'          => 'Outros'
        ]);
        // *************************//

        //** Especialidades (serviço Carpinteiro)
        DB::table('especialidades')->insert([
            'servico_id'    => 6,
            'name'          => 'Assoalhos'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 6,
            'name'          => 'Forros'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 6,
            'name'          => 'Portas'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 6,
            'name'          => 'Outros'
        ]);
        // *************************//

        //** Especialidades (serviço Motorista)
        DB::table('especialidades')->insert([
            'servico_id'    => 7,
            'name'          => 'Carro próprio'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 7,
            'name'          => 'Atendimento 24h'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 7,
            'name'          => 'Outros'
        ]);
        // *************************//

        //** Especialidades (serviço Motoboy)
        DB::table('especialidades')->insert([
            'servico_id'    => 8,
            'name'          => 'Atendimento 24h'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 8,
            'name'          => 'Outros'
        ]);
        // *************************//

        //** Especialidades (serviço Lavagem Automotiva)
        DB::table('especialidades')->insert([
            'servico_id'    => 9,
            'name'          => 'Lavagem a seco'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 9,
            'name'          => 'Higienização'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 9,
            'name'          => 'Cristalização'
        ]);

        DB::table('especialidades')->insert([
            'servico_id'    => 9,
            'name'          => 'Outros'
        ]);
        // *************************//
    }
}
