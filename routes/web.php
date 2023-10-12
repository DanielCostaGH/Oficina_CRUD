<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentoController;




Route::get('/', function () {
    return view('orcamentos.index');
});


Route::group(['prefix' => 'orcamento' ], function() {
    Route::get('/', [OrcamentoController::class, 'index'])->name('orcamento.index');
    Route::get('/create', [OrcamentoController::class, 'create'])->name('orcamento.create');
    Route::get('/{id}', [OrcamentoController::class, 'edit'])->name('orcamento.edit');
});