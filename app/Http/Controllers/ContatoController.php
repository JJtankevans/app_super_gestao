<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\Models\MotivoContato;

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
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);
    }

    public function store(Request $req) {
        
        //Realizar a validação dos dados do formulário no request
        $req->validate([
            'nome' => 'required | min:3 | max:40',
            /*Caso queria q um campo seja unico é so fazer o seguinte
               'nome' => 'required | min:3 | max:40 | unique:site_contatos'
                No caso é só inserir o nome da tabela depois do atributo unique: */
            'telefone' => 'required | min:11 | numeric',
            'email' => 'email | min:12',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required| max:2000',
        ],
        [
            'required' => "O campo :attribute precisa ser preenchido",
            'nome.min' => "O campo nome precisa ter no minimo 3 caracteres",
            'nome.max' => "O campo nome precisa ter menos de 40 caracteres",
            'telefone.numeric' => "O numero inserido é invalido, por favor insira somente números",
            'telefone.min' => "O campo precisa ter no minimo 11 caracteres",
            'email.email' => "E-mail inserido é invalido",
            'email.min' => "O campo precisa ter pelo menos 12 caracteres",
            'mensagem.max' => "O campo precisa ter menos de 2000 caracteres",
        ]);
        SiteContato::create($req->all());
        return redirect()->route('site.index');
    }
}
