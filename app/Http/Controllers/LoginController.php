<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $req) {
        
        $erro = '';
        
        if($req->get('erro') == 1) {
            $erro = "Usuário e/ou senha não existe";
        }

        if($req->get('erro') == 2) {
            $erro = "Necessário efetuar login para ter acesso a pagina";
        }
        
        return view('site.login', ['titulo' => "Login", 'erro' => $erro]);
    }

    public function autenticar(Request $req) {
        
        //regras de validação
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        //Mensagens de feedback de validação
        $feedback =[
            'usuario.email' => "O campo usuário (e-mail) é obragtório",
            'senha.required' => "O campo senha é obrigatório"
        ];

        $req->validate($regras,$feedback);

        $email = $req->get('usuario');
        $pwd = $req->get('senha');

        //Iniciar o Model User
        $user = new User();
        
        $usuario=  $user->where('email', $email)->where('password', $pwd)->get()->first();
        

        if(isset($usuario->name)) {
            
            
            session_start();
            $_SESSION['nome'] =  $usuario->name;
            $_SESSION['email'] =  $usuario->email;
            
            return redirect()->route('app.clientes');
        
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
        
    }
}
