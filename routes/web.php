<?php

use App\Models\Operations;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperationsController;

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


/* Route::get('/operation', function () {
    return view('operations.create');
}); */

Route::get('/dashboard', [OperationsController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::name('operation.')->group(function () {
    Route::get('/operation/index', [OperationsController::class, 'index'])->middleware(['auth'])->name('index');
    Route::post('/operation/store', [OperationsController::class, 'store'])->middleware(['auth'])->name('store');
    Route::get('/operation', [OperationsController::class, 'create'])->middleware(['auth'])->name('create');
    Route::get('/operation/show/{operation}', [OperationsController::class, 'show'])->name('show');
    Route::get('/rapport', [OperationsController::class, 'rapport'])->name('rapport');
    Route::delete('/operation/{operation}', [OperationsController::class, 'destroy'])->name('destroy');
});




require __DIR__ . '/auth.php';
