<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 


class SobreNosController extends Controller
{   
    /*Adicionando um middleware diratemante no construct de um controller
    public function __construct()
    {   
        $this->middleware(LogAcessoMiddleware::class);
    }
    
    Outra forma de usar middleware diretamente no controller é assim:
    public function __construct()
    {   
        $this->middleware('log.acesso');
    }*/

    public function sobreNos(){
        return view('site.sobre_nos');
    }
}
