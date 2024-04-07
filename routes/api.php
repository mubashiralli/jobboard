<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/scrapdb', [App\Http\Controllers\ScrapingAPI\ScrapingAPI::class, 'retrive_data']);
Route::post('/scrapdb', [App\Http\Controllers\ScrapingAPI\ScrapingAPI::class, 'add_data']);
Route::put('/scrapdb', [App\Http\Controllers\ScrapingAPI\ScrapingAPI::class, 'update_data']);
Route::delete('/scrapdb', [App\Http\Controllers\ScrapingAPI\ScrapingAPI::class, 'delete_data']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
