<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instanciando o objeto ***Recomendado2***
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->uf = 'CE';
        $fornecedor->email = 'contato@fornecedor100.com.br';

        $fornecedor->save();

        //o método create (atenção para o atributo fillable da classe) ***Recomendado1***
        Fornecedor::create([
            'nome' => "Fornecedor 200",
            'site' => "fornecedor200.com.br",
            'uf' => "RS",
            'email' => "contato@fornecedor200.com.br"
        ]);

        //insert (se for usar o DB tem que fazer o import lá encima) ***Não Recomendado***
        DB::table('fornecedors')->insert([
            'nome' => "Fornecedor 200",
            'site' => "fornecedor200.com.br",
            'uf' => "RS",
            'email' => "contato@fornecedor200.com.br"
        ]);
    }
}
