<?php

use App\Http\Controllers\TarefaController;
use App\Http\Controllers\TipoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/tipos/', [TipoController::class, 'index'])
    ->name('tipos.index');
Route::post('/tipos/', [TipoController::class, 'store'])
    ->name('tipos.store');
Route::get('/tipos/{tipo}', [TipoController::class, 'show'])
    ->name('tipos.show');
Route::put('/tipos/{tipo}', [TipoController::class, 'update'])
    ->name('tipos.update');
Route::delete('/tipos/{tipo}', [TipoController::class, 'destroy'])
    ->name('tipos.destroy');

Route::get('/tarefas/', [TarefaController::class, 'index'])
    ->name('tarefas.index');
Route::post('/tarefas/', [TarefaController::class, 'store'])
    ->name('tarefas.store');
Route::get('/tarefas/{tipo}', [TarefaController::class, 'show'])
    ->name('tarefas.show');
Route::put('/tarefas/{tipo}', [TarefaController::class, 'update'])
    ->name('tarefas.update');
Route::delete('/tarefas/{tipo}', [TarefaController::class, 'destroy'])
    ->name('tarefas.destroy');


// Route::resource('/tipos',TipoController::class);
// Route::apiresource('/tipos',TipoController::class);