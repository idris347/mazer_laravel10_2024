<?php

use App\Http\Controllers\CrudAjaxController;
use App\Http\Controllers\CrudApiController;
use App\Http\Controllers\CrudBiasaController;
use App\Http\Controllers\CrudModalController;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\ProuductController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home',[dashboardController::class,'index'])->name('dashboard');

//data User 
Route::get('/user',[userController::class,'index'])->name('user.index');
//data product 
Route::get('/product',[ProuductController::class,'index'])->name('product.index');

//data product crud biasa 
Route::get('/getcrudb',[CrudBiasaController::class,'index'])->name('crudb.index');
Route::get('/createcrudb',[CrudBiasaController::class,'tambah'])->name('crudb.create');
Route::get('/editcrudb/{id}',[CrudBiasaController::class,'edit'])->name('crudb.edit');
Route::post('/updatecrudb/{id}',[CrudBiasaController::class,'update'])->name('crudb.update');
Route::post('/storecrudb',[CrudBiasaController::class,'submit'])->name('crudb.store');
Route::delete('/destroycrudb/{id}',[CrudBiasaController::class,'hapus'])->name('crudb.destroy');

//profile 
Route::get('/profile',[profileController::class,'index'])->name('profile');
Route::get('/security',[profileController::class,'security'])->name('security');
Route::post('/reset',[profileController::class,'ubah_pass'])->name('resetPass');

//Crud Resource
Route::resource('crudapis', CrudApiController::class);

//CrudModal
Route::get('/getcrudM',[CrudModalController::class,'index'])->name('crudm.index');
Route::post('/createcrudm',[CrudModalController::class,'tambah1'])->name('crudm.create');
Route::post('/updatecrudm/{id}',[CrudModalController::class,'update'])->name('crudm.update');

//CrudAjax
Route::get('getcrudA',[CrudAjaxController::class,'index'])->name('cruda.index');