<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


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




Route::get('/products/{batches_id}',[ApiController::class,'products']);
Route::get('/canculate/{storage_id}',[ApiController::class,'canculate']);
Route::post('/buying',[ApiController::class,'buying']);
Route::post('/selling',[ApiController::class,'selling']);
Route::post('/refounds',[ApiController::class,'refounds']);

