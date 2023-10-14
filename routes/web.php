<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentoController;




Route::get('/', [OrcamentoController::class, 'index'])->name('orcamento.index');


Route::post('/addOrcamento', [OrcamentoController::class, 'store'])->name('orcamento.store');


Route::group(['prefix' => 'api'], function () {
    Route::get('/orcamentosList', [OrcamentoController::class, 'index']);
    Route::put('/orcamentosUpdate/{id}', [OrcamentoController::class, 'update']);
    Route::delete('/orcamentosDelete/{id}', [OrcamentoController::class, 'destroy']);
    Route::post('/orcamentosFilter', [OrcamentoController::class, 'filtrar']);
});

