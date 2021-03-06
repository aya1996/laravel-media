<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('addProduct');
// });
Route::get('/addProduct', [ProductController::class, 'create']);
Route::post('/addProduct', [ProductController::class, 'store']);
Route::post('/addVideo', [VideoController::class, 'store']);
Route::get('/addVideo', [VideoController::class, 'create']);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
