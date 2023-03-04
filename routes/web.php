<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

///////////////////////////////////////////////////////////////////




Route::get('/colori', [App\Http\Controllers\CarController::class, 'listacolori'])
->middleware(['auth', 'verified'])->name('colori');
Route::post('/colore', [App\Http\Controllers\CarController::class, 'storecolore']);
Route::get('/inseriscicolore', [App\Http\Controllers\CarController::class, 'inseriscicolore']);
Route::get('/modificacolore/{i}', [App\Http\Controllers\CarController::class, 'modificacolore']);
Route::get('/cancellacolore/{i}', [App\Http\Controllers\CarController::class, 'cancellacolore']);

Route::get('/marchi', [App\Http\Controllers\CarController::class, 'listamarchi'])
->middleware(['auth', 'verified'])->name('marchi');

Route::post('/marchio', [App\Http\Controllers\CarController::class, 'storemarchio']);
Route::get('/inseriscimarchio', [App\Http\Controllers\CarController::class, 'inseriscimarchio']);
Route::get('/modificamarchio/{i}', [App\Http\Controllers\CarController::class, 'modificamarchio']);
Route::get('/cancellamarchio/{i}', [App\Http\Controllers\CarController::class, 'cancellamarchio']);

Route::get('/modelli', [App\Http\Controllers\CarController::class, 'listamodelli'])
->middleware(['auth', 'verified'])->name('modelli');
Route::post('/modello', [App\Http\Controllers\CarController::class, 'storemodello']);
Route::get('/inseriscimodello', [App\Http\Controllers\CarController::class, 'inseriscimodello']);
Route::get('/modificamodello/{i}', [App\Http\Controllers\CarController::class, 'modificamodello']);
Route::get('/cancellamodello/{i}', [App\Http\Controllers\CarController::class, 'cancellamodello']);

Route::get('/automobili', [App\Http\Controllers\CarController::class, 'listaautomobili'])
->middleware(['auth', 'verified'])->name('automobili');
Route::post('/automobilenew', [App\Http\Controllers\CarController::class, 'storenewautomobile']);
Route::post('/automobile', [App\Http\Controllers\CarController::class, 'storeautomobile']);
Route::get('/inserisciautomobile', [App\Http\Controllers\CarController::class, 'inserisciautomobile']);
Route::get('/modificaautomobile/{i}', [App\Http\Controllers\CarController::class, 'modificaautomobile']);
Route::get('/cancellaautomobile/{i}', [App\Http\Controllers\CarController::class, 'cancellaautomobile']);

Route::get('/proprietari', [App\Http\Controllers\CarController::class, 'listaproprietari'])
->middleware(['auth', 'verified'])->name('proprietari');
Route::post('/proprietarionew', [App\Http\Controllers\CarController::class, 'storenewproprietario']);
Route::post('/proprietario', [App\Http\Controllers\CarController::class, 'storeproprietario']);
Route::get('/inserisciproprietario', [App\Http\Controllers\CarController::class, 'inserisciproprietario']);
Route::get('/modificaproprietario/{i}', [App\Http\Controllers\CarController::class, 'modificaproprietario']);
Route::get('/cancellaproprietario/{i}', [App\Http\Controllers\CarController::class, 'cancellaproprietario']);


Route::get('/proprieta', [App\Http\Controllers\CarController::class, 'listaproprieta'])
->middleware(['auth', 'verified'])->name('proprieta');
Route::post('/inserisciproprieta', [App\Http\Controllers\CarController::class, 'storeproprieta']);
Route::get('/inserisciproprieta', [App\Http\Controllers\CarController::class, 'inserisciproprieta']);
Route::get('/modificaproprieta/{i}', [App\Http\Controllers\CarController::class, 'modificaproprieta']);
Route::get('/cancellaproprieta/{i}', [App\Http\Controllers\CarController::class, 'cancellaproprieta']);


Route::POST('/pluto', [App\Http\Controllers\Controller::class, 'pluto']);
Route::GET('/', [App\Http\Controllers\Controller::class, 'prova']);
Route::POST('/link', [App\Http\Controllers\Controller::class, 'link']);
Route::POST('/', [App\Http\Controllers\Controller::class, 'contattiricevuti']);
