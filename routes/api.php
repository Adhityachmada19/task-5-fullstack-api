<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;
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

Route::prefix('V1')->group(function(){
    Route::post('login',[AuthController::class,'login']);
    Route::post('register',[AuthController::class,'register']);
    
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('/posts ',[PostsController::class,'all']);
        Route::get('/posts/{id}',[PostsController::class,'show']);
        Route::post('/posts',[PostsController::class,'store']);
        Route::put('/posts/{id}',[PostsController::class,'update']);
        Route::delete('/posts/{id}',[PostsController::class,'delete']);
        Route::get('logout', [AuthController::class,'logout']);
    });
    Route::get('/categories',[CategoriesController::class,'all']);
    Route::get('/categories/{id}',[CategoriesController::class,'show']);
    Route::post('/categories',[CategoriesController::class,'store']);
    Route::put('/categories/{id}',[CategoriesController::class,'update']);
    Route::delete('/categories/{id}',[CategoriesController::class,'delete']);
   
   
});
