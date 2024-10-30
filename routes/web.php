<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UsuarioController;
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/test/{nombre}', function($nombre){
return "Hola,{$nombre} ";
});
Route::get('/tareas',
[TareaController::class,
'index'])->name('tareas.index');

Route::get('/tareas/create',[TareaController::class,'create'] )->name('tareas.create');

Route::post('tareas',[
TareaController::class,
'store'
])->name('tareas.store');
//Route::middleware('auth')->group(function () {
  //  Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');

//});
Route::put('/gamebuster/{game}', [GameController::class, 'update'])->name('gamebuster.update');

Route::middleware('auth')->group(function () {
Route::resource('usuarios', UsuarioController::class)->except(['show', 'edit', 'update']);
});
Route::middleware('auth')->group(function () {
Route::resource('usuarios', UsuarioController::class)->except(['show']);
});
Route::get('/usuarios/gestion', [UsuarioController::class, 'gestion'])->name('usuarios.gestion');
Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');

Route::get('/usuarios/gestion', [UsuarioController::class, 'gestion'])->name('usuarios.gestion');

Route::middleware('auth')->group(function () {
    Route::resource('gamebuster', GameController::class);
});
Route::get('/dashboard', function () {
    return redirect()->route('gamebuster.index');
})->middleware(['auth', 'verified'])->name('dashboard');
//Route::resource('games', GameController::class);

//Esto dejalo comentado por cualquier inconveniente tomi


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
