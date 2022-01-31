<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;


Route::get('/', [PrincipalController::class, 'principal'])->name("site.index");
Route::get('/sobre_nos', [SobreNosController::class, 'sobreNos'])->name("site.sobrenos");
Route::get('/contato', [ContatoController::class, 'contato'])->name("site.contato");
Route::post('/contato', [ContatoController::class, 'store'])->name("site.contato");
Route::get('/login/{erro?}',[LoginController::class, 'index'])->name("site.login");
Route::post('/login',[LoginController::class, 'autenticar'])->name("site.login");

Route::prefix('/app') ->middleware('autenticacao:padrao') -> group(function() {
    Route::get('/clientes', function() { return "Clientes";})
        ->name("app.clientes");

    Route::get('/fornecedores', [FornecedorController::class, 'index'])
        ->name("app.fornecedores");

    Route::get('/produtos',function() { echo "Produtos (view)";})
    ->name("app.produtos");
});

Route::fallback(function() {
    echo "A rota acessada não existe, <a href= ".route('site.index').">clique aqui</a> para ir para a página inicial.";
});