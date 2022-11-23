<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TodoController;
 
Route::get('/dashboard', function () {
    return view('index');
});
Route::middleware('isGuest')->group(function (){
    Route::get('/', [LoginController::class, 'login'])->name('login');
    Route::get('/register',[LoginController::class, 'register']);
    Route::get('/login',[LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout']);
    Route::post('/register/save' , [LoginController::class, 'inputRegister'])->name('register.post');
    Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
}); 

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware('isLogin')->prefix('/todo')->name('todo.')->group(function(){
    Route::get('/',[TodoController::class, 'index'])->name('index');
    Route::get('/complated',[TodoController::class, 'complated'])->name('complated');
    Route::get('/create',[TodoController::class, 'create'])->name('create');
    Route::post('/store', [TodoController::class, 'store'])->name('store');
    Route::get('/edit/{id}',[TodoController::class, 'edit'])->name('edit');
    Route::patch('/update/{id}', [TodoController::class, 'update'])->name('update');
});

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




