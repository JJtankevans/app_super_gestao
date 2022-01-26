<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\FornecedorController;


Route::get('/', [PrincipalController::class, 'principal'])->name("site.index");
Route::get('/sobre_nos', [SobreNosController::class, 'sobreNos'])->name("site.sobrenos");
Route::get('/contato', [ContatoController::class, 'contato'])->name("site.contato");
Route::post('/contato', [ContatoController::class, 'store'])->name("site.contato");
Route::get('/login',function() { echo "Login (view)"; })->name("site.login");

Route::prefix('/app') -> group(function() {
    Route::get('/clientes', function() { echo "Client (view)";})
        ->name("app.clientes")
        ->middleware('autenticacao');

    Route::get('/fornecedores', [FornecedorController::class, 'index'])
        ->name("app.fornecedores")
        ->middleware('autenticacao');

    Route::get('/produtos',function() { echo "Produtos (view)";})
    ->name("app.produtos")
    ->middleware('autenticacao');
});

Route::fallback(function() {
    echo "A rota acessada não existe, <a href= ".route('site.index').">clique aqui</a> para ir para a página inicial.";
});