<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    /*Fazer isso caso o nome da tabela no banco seja diferente do modelo presente aqui
    por exemplo fornecedors != fornecedores;
    protected $table = 'fornecedores';*/
    use SoftDeletes;
    
    //Permite a criação de um objeto usando um metodo estático 
    //no caso do curso foi o \App\Fornecedor::create()
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}