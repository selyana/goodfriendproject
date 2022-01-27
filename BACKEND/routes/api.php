<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReviewApiController;
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

Route::resource('reviews', 'App\Http\Controllers\API\ReviewApiController');
Route::resource('become_sitter', 'App\Http\Controllers\API\BecomeSitterApiController');
Route::get('sitters', ['App\Http\Controllers\API\SittersSearchApiController', 'index']);
Route::post('sitters', ['App\Http\Controllers\API\SittersSearchApiController', 'index']);
Route::get('sitter/{id}', ['App\Http\Controllers\API\SittersSearchApiController', 'sitter']);
//Route::resource('reviews', 'API\ReviewApiController');
//Route::get('reviews', [ReviewsApiController::class, 'index']);
//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
