<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentoController;

/**
 * Rota para a página inicial.
 *
 * Define a rota principal da aplicação.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
Route::get('/', [OrcamentoController::class, 'index'])->name('orcamento.index');


/**
 * Rota para adicionar um novo orçamento.
 *
 * Define a rota para adicionar um novo orçamento.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
Route::post('/addOrcamento', [OrcamentoController::class, 'store'])->name('orcamento.store');


/**
 * Grupo de rotas para a API de orçamentos.
 *
 * Define um grupo de rotas relacionadas a orçamentos.
 */
Route::group(['prefix' => 'api'], function () {
    Route::get('/orcamentosList', [OrcamentoController::class, 'index']);
    Route::put('/orcamentosUpdate/{id}', [OrcamentoController::class, 'update']);
    Route::delete('/orcamentosDelete/{id}', [OrcamentoController::class, 'destroy']);
    Route::post('/orcamentosFilter', [OrcamentoController::class, 'filtrar']);
});

