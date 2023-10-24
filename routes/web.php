<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\ProdutoController;

Route::group(['prefix' => 'marca'], function() {
    Route::get('/', [MarcaController::class,'index']);

    Route::get('/inserir', [MarcaController::class,'inserir']);
    Route::post('/inserir', [MarcaController::class,'salvar_novo']);

    Route::get('/alterar/{id}', [MarcaController::class,'alterar']);
    Route::post('/alterar', [MarcaController::class,'salvar_alterar']);

    // Route::get('/excluir', [MarcaController::class,'excluir']);
    Route::get('/excluir/{id}', [MarcaController::class,'excluir']);
});

Route::group(['prefix' => 'categoria'], function() {
    Route::get('/', [CategoriaController::class,'index']);

    Route::get('/inserir', [CategoriaController::class,'inserir']);
    Route::post('/inserir', [CategoriaController::class,'salvar_novo']);


    Route::get('/alterar/{id}', [CategoriaController::class,'alterar']);
    Route::post('/alterar', [CategoriaController::class,'salvar_alterar']);

    Route::get('/excluir/{id}', [CategoriaController::class,'excluir']);

});

Route::group(['prefix' => 'cor'], function() {
    Route::get('/', [CorController::class,'index']);

    Route::get('/inserir', [CorController::class,'inserir']);
    Route::post('/inserir', [CorController::class,'salvar_novo']);


    Route::get('/alterar/{id}', [CorController::class,'alterar']);
    Route::post('/alterar', [CorController::class,'salvar_alterar']);

    Route::get('/excluir/{id}', [CorController::class,'excluir']);

});

Route::group(['prefix' => 'produto'], function() {
    Route::get('/', [ProdutoController::class,'index']);

    Route::get('/inserir', [ProdutoController::class,'inserir']);
    Route::post('/inserir', [ProdutoController::class,'salvar_novo']);

    Route::get('/alterar/{id}', [ProdutoController::class,'alterar']);
    Route::post('/alterar', [ProdutoController::class,'salvar_alterar']);

    // Route::get('/excluir', [ProdutoController::class,'excluir']);
    Route::get('/excluir/{id}', [ProdutoController::class,'excluir']);
});

Route::get('/', [MarcaController::class, 'index']);
