<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Jobs\JobsController;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
//     return response()->json(['status'=>200,'working'=>'developing']);
// });

Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/job/single/{id}', [App\Http\Controllers\Jobs\JobsController::class, 'jobView'])->name('single.job');
Route::post('/savejob', [App\Http\Controllers\Jobs\JobsController::class, 'saveJob'])->name('save.job');
Route::post('/applyjob', [App\Http\Controllers\Jobs\JobsController::class, 'applyJob'])->name('apply.job');
Route::get('/category/{name}', [App\Http\Controllers\Category\Categories::class, 'categoriesListing'])->name('categories.job');
Route::get('/user/profile',[App\Http\Controllers\Users\UsersController::class,'profile'])->name('profile');
