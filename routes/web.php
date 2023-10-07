<?php

use App\Http\Controllers\BilletCaisseController;
use App\Models\Operations;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperationsController;
use App\Http\Controllers\SecteurController;
use App\Models\Secteur;

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
    return view('welcome');
});

Route::get('/waiting', function () {
    return view('operations.waiting');
});

Route::get('/secteur', function () {
    return view('secteurs.create');
});

Route::get('/financement', function () {
    return view('financements.create');
});


/* Route::get('/operation', function () {
    return view('operations.create');
}); */




Route::get('/dashboard', [OperationsController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/test/{id}', [SecteurController::class, 'index'])->middleware(['auth'])->name('seteur');

Route::name('operation.')->group(function () {
    Route::get('/operation/index', [OperationsController::class, 'index'])->middleware(['auth'])->name('index');
    Route::post('/operation/store', [BilletCaisseController::class, 'store'])->middleware(['auth'])->name('store');
    Route::get('/operation/{id}', [OperationsController::class, 'create'])->middleware(['auth'])->name('create');
    Route::get('/operation/show/{operation}', [OperationsController::class, 'show'])->name('show');
    Route::get('/rapport', [OperationsController::class, 'rapport'])->name('rapport');
    Route::delete('/operation/{operation}', [OperationsController::class, 'destroy'])->name('destroy');
});


/* Route::name('secteur.')->group(function () {
    Route::get('/secteur/index', [SecteurController::class, 'index'])->middleware(['auth'])->name('create');

}); */



require __DIR__ . '/auth.php';
