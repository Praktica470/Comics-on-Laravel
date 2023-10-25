<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomePageController;
use App\Http\Controllers\ComicsPageController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CreatedComicsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\MasterController;

use Illuminate\Support\Facades\Route;

use App\Http\Middleware\EnsureUserIsAuthor;
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

Route::get('/', [WelcomePageController::class, 'index']);

Route::get('/comics{id}', [ComicsPageController::class, 'index']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/mastery', [MasterController::class, 'index']);

    Route::get('/new_project', [CreatedComicsController::class, 'index'])->name('new_project');
    Route::post('/new_project', [CreatedComicsController::class, 'store'])->name('new_project.store');
});

Route::middleware([EnsureUserIsAuthor::class])->group(function () {
    Route::get('/project/{id}', [ProjectController::class, 'index'])->name('project');
    Route::post('/project/{id}', [ProjectController::class, 'storeChapter'])->name('project.chapter');
    Route::get('/project/{id}/page/{ch}', [ProjectController::class, 'toPage'])->name('project.topage');
    Route::post('/project/{id}/page/{ch}', [ProjectController::class, 'storePage'])->name('project.page');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
