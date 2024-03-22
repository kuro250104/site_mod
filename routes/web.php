<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StagesController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValidatedHourController;
use App\Http\Controllers\WorkerController;
use App\Http\Controllers\TeamController;
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
Route::get('/api/workers-for-selector', [WorkerController::class, 'getWorkersForSelector']);

Route::middleware('auth')->group(function () {

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    Route::get('/dashboard', function () {
        return view('home.home');
    })->middleware(['auth', 'verified'])->name('home.home');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/user', [UserController::class, 'index'])->name('users.index');
        Route::get('/user/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/user-create', [UserController::class, 'create'])->name('users.create');
        Route::get('/user-delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');


    });

    Route::view('/', 'home.home');
    Route::get('/', [HomeController::class, 'home'])->name('home.home');
    Route::get('/recherche', [SearchController::class, 'search'])->name('search');





    Route::get('/operators', [OperatorController::class, 'home'])->name('operator.index');
    Route::post('/operators', [OperatorController::class, 'store'])->name('operator.store');
    Route::get('/operators/{id}/edit', [OperatorController::class, 'edit'])->name('operator.edit');
    Route::put('/operators/{id}', [OperatorController::class, 'update'])->name('operator.update');




    Route::get('/teams', [TeamController::class, 'home'])->name('team.index');
    Route::post('/teams', [TeamController::class, 'store'])->name('team.store');
    Route::get('/teams/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/teams/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::get('/teams/{id}/view',[TeamController::class, 'view'])->name('team.view');


    Route::get('/projects', [ProjectController::class, 'home'])->name('project.index');
    Route::post('/projects', [ProjectController::class, 'store'])->name('project.store');
    Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('project.update');

    Route::get('/tasks', [TaskController::class, 'home'])->name('task.index');
    Route::post('/tasks', [TaskController::class, 'store'])->name('task.store');
    Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('task.edit');
    Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('task.update');

    Route::get('/stage', [StagesController::class, 'home'])->name('stage.index');
    Route::post('/stage', [StagesController::class, 'store'])->name('stage.store');
    Route::get('/stage/{id}/edit', [StagesController::class, 'edit'])->name('stage.edit');
    Route::put('/stage/{id}', [StagesController::class, 'update'])->name('stage.update');

    Route::get('/validated-hour', [ValidatedHourController::class, 'home'])->name('validated_hour.index');
    Route::post('/validated-hour', [ValidatedHourController::class, 'store'])->name('validated_hour.store');
    Route::get('/validated-hour/{id}/edit', [ValidatedHourController::class, 'edit'])->name('validated_hour.edit');
    Route::post('/validated-hour/{id}', [ValidatedHourController::class, 'update'])->name('validated_hour.update');
    Route::delete('/validated-hour/{id}/destroy', [ValidatedHourController::class, 'destroy'])->name('validated_hour.destroy');



});

require __DIR__.'/auth.php';
