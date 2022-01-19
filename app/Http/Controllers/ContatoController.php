<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $req) {

        /*
            $contato = new SiteContato();
            $contato->nome = $req->input('nome');
            $contato->telefone = $req->input('telefone');
            $contato->email = $req->input('email');
            $contato->motivo_contato = $req->input('motivo_contato');
            $contato->mensagem = $req->input('mensagem');

            $contato->save();

            OUTRA FORMA DE SALVAR OS ATRIBUTOS NO BANCO É A SEGUINTE:
            ____________________________________
            |                                    |
            |  $contato = new SiteContato();     |
            |  $contato->fill($request->all());  |
            |  Ou podemos usar o método          |
            |  $contato->create($request->all());|
            |  $contato->save();                 |
            |____________________________________|
            
            Porém para fazer dessas duas maneiras é necessário habilitar a váriavel $fillable
            dentro do model que deve ser salvo;
        */
        $motivo_contatos = [
            '1' => "Dúvida",
            '2' => "Elogio",
            '3' => "Reclamação"
        ];
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function store(Request $req) {
        
        //Realizar a validação dos dados do formulário no request
        $req->validate([
            'nome' => 'required | min:3 | max:40',
            'telefone' => 'required',
            'email' => 'required | email | min:12',
            'motivo_contato' => 'required',
            'mensagem' => 'required',
        ]);

    }
}
