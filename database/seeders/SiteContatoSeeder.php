<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteContato;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = "Sistema SG";
        $contato->telefone = "(92) 99999-22222";
        $contato->email = "contato@sg.com.br";
        $contato->motivo_contato = 1;
        $contato->mensagem = "Seja bem-vindo ao sistema Super Gestão";
        $contato->save();*/

        SiteContato::factory()->count(100)->create();        
    }
}
