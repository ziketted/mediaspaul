<?php

use App\Http\Controllers\BilletCaisseController;
use App\Http\Controllers\CaisseController;
use App\Http\Controllers\CentreController;
use App\Http\Controllers\CompteController;
use App\Http\Controllers\FinancementController;
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



Route::get('/dashcompte', function () {
    return view('operations.dashcompte');
});
Route::get('/dashsecteur', function () {
    return view('operations.dashsecteur');
});


Route::get('/dashcaisse', function () {
    return view('operations.dashcaisse');
});

Route::get('/centre', function () {
    return view('centres.create');
});

Route::get('/compte', function () {
    return view('comptes.create');
});

Route::get('/secteur', function () {
    return view('secteurs.create');
});

Route::get('/show', function () {
    return view('operations.show');
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
    Route::get('/sms', [OperationsController::class, 'sms'])->name('sms');
    Route::delete('/operation/{operation}', [OperationsController::class, 'destroy'])->name('destroy');
});


Route::name('compte.')->group(function () {
    Route::get('/compte/index', [CompteController::class, 'index'])->middleware(['auth'])->name('index');
    Route::post('/compte/store', [CompteController::class, 'store'])->middleware(['auth'])->name('store');
    Route::get('/compte/show/{compte}', [CompteController::class, 'show'])->name('show');

    Route::delete('/compte/{compte}', [CompteController::class, 'destroy'])->name('destroy');
});


Route::name('centre.')->group(function () {
    Route::get('/centre/index', [CentreController::class, 'index'])->middleware(['auth'])->name('index');
    Route::post('/centre/store', [CentreController::class, 'store'])->middleware(['auth'])->name('store');
    Route::get('/centre/show/{centre}', [CentreController::class, 'show'])->name('show');

    Route::delete('/centre/{centre}', [CentreController::class, 'destroy'])->name('destroy');
});


Route::name('financement.')->group(function () {
    Route::get('/financement/index', [FinancementController::class, 'index'])->middleware(['auth'])->name('index');
    Route::post('/financement/store', [FinancementController::class, 'store'])->middleware(['auth'])->name('store');
    Route::get('/financement/show/{financement}', [FinancementController::class, 'show'])->name('show');

    Route::delete('/financement/{financement}', [FinancementController::class, 'destroy'])->name('destroy');
});
Route::name('secteur.')->group(function () {
    Route::get('/secteur/index', [SecteurController::class, 'index'])->middleware(['auth'])->name('index');
    Route::post('/secteur/store', [SecteurController::class, 'store'])->middleware(['auth'])->name('store');
    Route::get('/secteur/show/{secteur}', [SecteurController::class, 'show'])->name('show');
    Route::delete('/secteur/{secteur}', [SecteurController::class, 'destroy'])->name('destroy');
});

/* Route::name('secteur.')->group(function () {
    Route::get('/secteur/index', [SecteurController::class, 'index'])->middleware(['auth'])->name('create');
}); */

//Caisse
Route::get('/caisse', [CaisseController::class, 'index'])->middleware(['auth'])->name('caisse.index');


//Administration
Route::get('/dashboard1', [OperationsController::class,'dashboard1'])->middleware(['auth'])->name('dash1');

require __DIR__ . '/auth.php';
