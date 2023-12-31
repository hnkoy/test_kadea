<?php

use App\Http\Controllers\MovieController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::get('movies', [MovieController::class, 'index'])->name('movies');
Route::get('movie/detail/{id}', [MovieController::class, 'show'])->name('movie.show');
 Route::get('movies/create', [MovieController::class, 'create']) ->name('movies.create');
 Route::post('movies/store', [MovieController::class, 'store'])->name('movie.store');
 Route::get('movie/delete/{id}', [MovieController::class, 'destroy']) ->name('movie.destroy');
 Route::get('movie/edit/{id}', [MovieController::class, 'edit']) ->name('movie.edit');

 Route::post('movie/update', [MovieController::class, 'update']) ->name('movie.update');
 Route::get('movies/getByName', [MovieController::class, 'getByName'])->name('movies.getByName');

