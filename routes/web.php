<?php

use App\Http\Controllers\LokaleController;
use App\Http\Controllers\KluczeController;
use App\Http\Controllers\DokumentyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PdfController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/dashboard',[HomeController::class, 'dashboard']);

Route::get('/index', function () {
    return view('index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Lokale
Route::resource('/lokale', 'App\Http\Controllers\LokaleController', ['except'=>['show'], 'names' => [
    'index'   => 'lokale.index',
    'create'  => 'lokale.create',
    'store'   => 'lokale.store',
    'edit'    => 'lokale.edit',
    'update'  => 'lokale.update',
    'destroy' => 'lokale.destroy'
]], ['except' => ['show']]);

route::get('/detail/{id}',[LokaleController::class,'detail']);
//Rozszerzenia 1 do 1
Route::resource('/lokale/grzejniki', 'App\Http\Controllers\GrzejnikiController', ['except'=>['show'], 'names' => [
    'edit'   => 'lokale.grzejniki.edit',
    'store'  => 'lokale.grzejniki.store'
]], ['except' => ['show']]);

Route::resource('/lokale/klucze', 'App\Http\Controllers\KluczeController', ['except'=>['show'], 'names' => [
    'index'   => 'lokale.klucze.index',
    'create'  => 'lokale.klucze.create',
    'store'   => 'lokale.klucze.store',
    'edit'    => 'lokale.klucze.edit',
    'update'  => 'lokale.klucze.update',
    'destroy' => 'lokale.klucze.destroy'
]], ['except' => ['show']]);

Route::resource('/lokale/instalacje', 'App\Http\Controllers\InstalacjeController', ['except'=>['show'], 'names' => [
    'edit'   => 'lokale.instalacje.edit',
    'store'  => 'lokale.instalacje.store'
]], ['except' => ['show']]);

Route::resource('/lokale/liczniki', 'App\Http\Controllers\LicznikiController', ['except'=>['show'], 'names' => [
    'edit'   => 'lokale.liczniki.edit',
    'store'  => 'lokale.liczniki.store'
]], ['except' => ['show']]);

Route::resource('/lokale/pomieszczenia', 'App\Http\Controllers\PomieszczeniaController', ['except'=>['show'], 'names' => [
    'index'   => 'lokale.pomieszczenia.index',
    'create'  => 'lokale.pomieszczenia.create',
    'store'   => 'lokale.pomieszczenia.store',
    'edit'    => 'lokale.pomieszczenia.edit',
    'update'  => 'lokale.pomieszczenia.update',
    'destroy' => 'lokale.pomieszczenia.destroy'
]], ['except' => ['show']]);

Route::resource('/najemcy', 'App\Http\Controllers\NajemcyController', ['except'=>['show'], 'names' => [
    'index'   => 'najemcy.index',
    'create'  => 'najemcy.create',
    'store'   => 'najemcy.store',
    'edit'    => 'najemcy.edit',
    'update'  => 'najemcy.update',
    'destroy' => 'najemcy.destroy'
]], ['except' => ['show']]);

Route::resource('/dokumenty', 'App\Http\Controllers\DokumentyController', ['except'=>['show'], 'names' => [
    'index'   => 'dokumenty.index',
    'create'  => 'dokumenty.create',
    'store'   => 'dokumenty.store',
    'edit'    => 'dokumenty.edit',
    'update'  => 'dokumenty.update',
    'destroy' => 'dokumenty.destroy'
]], ['except' => ['show']]);

route::get('/edit_dokument_lokalu/{id_dokumentu}',[DokumentyController::class,'edit_dokument_lokalu']);
route::get('/edit_dokument_najemcy/{id_dokumentu}',[DokumentyController::class,'edit_dokument_najemcy']);
route::patch('/update_dokument_lokalu/{id_dokumentu}',[DokumentyController::class,'update_dokument_lokalu']);
route::patch('/update_dokument_najemcy/{id_dokumentu}',[DokumentyController::class,'update_dokument_najemcy']);
route::get('/print_wybor/{id_dokumentu}',[DokumentyController::class, 'print_wybor']);
route::get('/zawieranie_umowy/{id_dokumentu}',[DokumentyController::class, 'zawieranie_umowy']);
route::get('/zerwanie_umowy/{id_dokumentu}',[DokumentyController::class, 'zerwanie_umowy']);

Route::resource('/uzytkownicy', 'App\Http\Controllers\UzytkownicyController', ['except'=>['show'], 'names' => [
    'index'   => 'uzytkownicy.index',
    'create'  => 'uzytkownicy.create',
    'store'   => 'uzytkownicy.store',
    'edit'    => 'uzytkownicy.edit',
    'update'  => 'uzytkownicy.update',
    'destroy' => 'uzytkownicy.destroy'
]], ['except' => ['show']]);

//Drukowanie dokumentow
Route::get('dokumenty/zawarcie_pdf/{id_dokumentu}',[PdfController::class, 'drukowanie_zawarcia_umowy']);
Route::get('dokumenty/zerwanie_pdf/{id_dokumentu}',[PdfController::class, 'drukowanie_zerwania_umowy']);
