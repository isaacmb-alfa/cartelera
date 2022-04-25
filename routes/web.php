<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;

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

// Route::get('{any}', function () {
//     return view('welcome');
// });
Route:: get('/', [PeliculaController::class, 'index'])->name('cartelera.index');
Route::get('/cartelera/{pelicula}', [PeliculaController::class, 'show'])->name('cartelera.show');

Auth::routes(['verify' => true]);

Route::group(['middleware' =>['auth', 'verified']], function () {
    Route::get('/cartelera', [PeliculaController::class, 'create'])->name('cartelera.create');
    Route::post('/cartelera', [PeliculaController::class, 'store'])->name('cartelera.store');
    Route::get('/cartelera/{url}/edit', [PeliculaController::class, 'edit' ])->name('cartelera.edit');
    Route::put('/cartelera/{url}/edit', [PeliculaController::class, 'update' ])->name('cartelera.update');
});
