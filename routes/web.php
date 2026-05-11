<?php
use App\Http\Controllers\NivelAcessoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// rotas nivel de Acesso

route::get('/nivel-acesso/cadastro',[NivelAcessoController::class,'cadastro'])->name('nivel-acesso.cadastro');


