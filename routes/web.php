<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/info', fn() => view('pages.info'))->name('info');
Route::get('/contacto', fn() => view('pages.contacto'))->name('contacto');
Route::post('/contacto/enviar', function (Request $request) {
    $data = $request->validate([
        'nombre'  => 'required|string|max:255',
        'email'   => 'required|email',
        'mensaje' => 'required|string',
    ]);


    return back()->with('status', '¡Mensaje enviado correctamente!');
})->name('contacto.enviar');
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        $user = auth()->user();
        return $user->role === 'admin'
            ? redirect()->route('gamebuster.index')
            : redirect()->route('user.index');
    })->middleware(['verified'])->name('dashboard');

    Route::get('/games', [GameController::class, 'userIndex'])->name('user.index');
    Route::get('/games/{id}', [GameController::class, 'userShow'])->name('user.show');

    Route::middleware(['admin'])->group(function () {
        Route::resource('gamebuster', GameController::class);
        Route::resource('usuarios', UsuarioController::class)->except(['show']);
        Route::get('/usuarios/gestion', [UsuarioController::class, 'gestion'])->name('usuarios.gestion');
        Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    });


    Route::get('/test-role', function () {
        return response()->json([
            'user' => auth()->user(),
            'role' => auth()->user()?->role
        ]);
    });
});

require __DIR__.'/auth.php';
