<?php

namespace App\Http\Controllers;

use App\Models\User; // Importar el modelo de usuario
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Importar Hash
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    public function index()
{
    $usuarios = User::all();
    return view('usuarios.index', compact('usuarios'));
}

public function create()
{
    return view('usuarios.create');
}

public function store(Request $request)
{
    // Validar los datos del formulario y guardarlos en una variable
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Crear el usuario con los datos validados
    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password']), // Encriptar la contraseña
    ]);

    
    return redirect()->route('usuarios.gestion')->with('success', 'Usuario creado correctamente.');
}
public function edit(User $usuario)
{
    return view('usuarios.edit', compact('usuario'));
}

public function update(Request $request, $id)
{
    $usuario = User::findOrFail($id);

    
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $usuario->id,
        'password' => 'nullable|string|min:8|confirmed', 
    ]);

    
    $usuario->update([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => isset($validated['password']) ? Hash::make($validated['password']) : $usuario->password,
    ]);

    return redirect()->route('usuarios.gestion')->with('success', 'Usuario actualizado correctamente.');
}

public function gestion()
{
    $usuarios = User::all(); 
    return view('usuarios.gestion', compact('usuarios'));
}
public function destroy($id)
{
    $usuario = User::findOrFail($id); 
    $usuario->delete(); 

    return redirect()->route('usuarios.gestion')->with('status', 'Usuario eliminado correctamente.');
}


}
