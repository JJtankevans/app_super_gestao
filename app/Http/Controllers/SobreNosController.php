<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SobreNosController extends Controller
{   
    /*Adicionando um middleware diratemante no construct de um controller
    public function __construct()
    {   
        $this->middleware(LogAcessoMiddleware::class);
    }*/

    public function sobreNos(){
        return view('site.sobre_nos');
    }
}
