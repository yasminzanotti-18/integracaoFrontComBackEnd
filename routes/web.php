<?php
use App\Http\Controllers\NivelAcessoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// rotas nivel de Acesso

route::get('/nivel-acesso/cadastro',[NivelAcessoController::class,'cadastro'])->name('nivel-acesso.cadastro');
route::post('/nivel-acesso/salvar',[NivelAcessoController::class,'add'])->name('nivel-acesso.salvar');
route::get('/nivel-acesso/listar',[NivelAcessoController::class,'listar'])->name('nivel-acesso.listar');
route::delete('/nivel-acesso/deletar/{id}',[NivelAcessoController::class,'deletar'])->name('nivel-acesso.deletar');



