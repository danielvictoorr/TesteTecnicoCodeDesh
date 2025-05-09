<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'statusApiCron']);

//Atualiza um produto da base de dados
Route::put('/products/{id}', [ProductController::class, 'updateProduct']);

//Altera o status de um produto da base de dados para 'trash'
Route::delete('/products/{id}', [ProductController::class, 'deleteProduct']);

// Faz a busca de um produto da base de dados
Route::get('/products/{id}', [ProductController::class, 'expecificProduct']);

//Listar todos os produtos da base de dados
Route::get('/products', [ProductController::class, 'allProducts']);
