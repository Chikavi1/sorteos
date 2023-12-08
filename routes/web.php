<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SorteosController;

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

Route::get('/',[SorteosController::class,'landing'])->name('sorteos.landing');



// Route::get('/sorteos',[SorteosController::class,'index'])->name('sorteos.index');
Route::get('/sorteos/{id}',[SorteosController::class,'show'])->name('sorteos.show');
Route::get('/privacy',[SorteosController::class,'privacy'])->name('sorteos.privacy');
Route::any('/verify',[SorteosController::class,'verify'])->name('sorteos.verify');
Route::get('/terms',[SorteosController::class,'terms'])->name('sorteos.terms');


Route::post('/sa-login',[SorteosController::class,'login'])->name('admin.login');
Route::get('/sos-admin',[SorteosController::class,'index'])->name('sorteos.index');
Route::get('/sos/{id}',[SorteosController::class,'sorteo'])->name('sorteos.sorteo');
Route::get('/sos-sorteos/create',[SorteosController::class,'create'])->name('sorteos.create');

Route::get('/sos-tickets/{id}',[SorteosController::class,'tickets'])->name('sorteos.tickets');
Route::get('/faq',[SorteosController::class,'faq'])->name('sorteos.faq');
Route::post('/book',[SorteosController::class,'book'])->name('sorteos.book');
Route::post('/sorteo-store',[SorteosController::class,'store'])->name('admin.store');
Route::put('/sorteo-update',[SorteosController::class,'update'])->name('admin.update');

Route::get('/success',[SorteosController::class,'success'])->name('sorteos.success');
Route::post('/sorteo-status',[SorteosController::class,'changeStatus'])->name('admin.changeStatus');
Route::post('/sorteo-status-ticket',[SorteosController::class,'changeStatusTicket'])->name('admin.changeStatusTicket');


