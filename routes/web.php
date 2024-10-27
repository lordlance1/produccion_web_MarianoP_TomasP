<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\GameController;
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
