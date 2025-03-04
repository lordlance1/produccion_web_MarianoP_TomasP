<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    /**
     * Display a listing of the resource for admin/editor.
     */
    public function index()
    {
        // Solo Admins y Editores pueden gestionar juegos
        if (!in_array(Auth::user()->role, ['admin', 'editor'])) {
            return redirect()->route('user.index')->with('error', 'No tienes permisos para gestionar juegos.');
        }

        $games = Game::select('id', 'nombre', 'fecha_lanzamiento', 'categoria_id', 'imagen')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('gamebuster.index', compact('games'));
    }

    /**
     * Display a listing of the resource for normal users (solo vista).
     */
    public function userIndex()
    {
        // Todos los usuarios pueden ver los juegos sin opciones de gestión
        $games = Game::select('id', 'nombre', 'fecha_lanzamiento', 'categoria_id', 'imagen')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('user.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Solo Admins y Editores pueden crear juegos
        if (!in_array(Auth::user()->role, ['admin', 'editor'])) {
            return redirect()->route('user.index')->with('error', 'No tienes permisos para agregar juegos.');
        }

        $categorias = Categoria::select('id', 'nombre')->orderBy('nombre')->get();
        return view('gamebuster.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Solo Admins y Editores pueden agregar juegos
        if (!in_array(Auth::user()->role, ['admin', 'editor'])) {
            return redirect()->route('user.index')->with('error', 'No tienes permisos para agregar juegos.');
        }

        $request->validate([
            'nombre' => 'required',
            'fecha_lanzamiento' => 'required|date|before:tomorrow',
            'categoria_id' => 'required',
            'descripcion' => 'required',
            'imagen' => 'nullable|string',
        ], [
            'nombre.required' => 'Debe ingresar un nombre',
            'fecha_lanzamiento.required' => 'Debe ingresar una fecha de lanzamiento',
            'categoria_id.required' => 'Debe seleccionar una categoría',
            'fecha_lanzamiento.date' => 'La fecha de lanzamiento debe ser una fecha válida',
            'fecha_lanzamiento.before' => 'La fecha de lanzamiento debe ser antes de mañana',
            'descripcion.required' => 'Debe agregar una descripción',
        ]);

        Game::create([
            'nombre' => $request->nombre,
            'fecha_lanzamiento' => $request->fecha_lanzamiento,
            'categoria_id' => $request->categoria_id,
            'descripcion' => $request->descripcion,
            'imagen' => $request->input('imagen') ?? 'https://picsum.photos/200/300',
        ]);

        return redirect()->route('gamebuster.index')->with('status', 'El juego se agregó correctamente.');
    }

    /**
     * Display the specified resource for normal users.
     */
    public function userShow($id)
    {
        $game = Game::findOrFail($id);
        return view('user.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Solo Admins y Editores pueden editar juegos
        if (!in_array(Auth::user()->role, ['admin', 'editor'])) {
            return redirect()->route('user.index')->with('error', 'No tienes permisos para editar juegos.');
        }

        $game = Game::findOrFail($id);
        $categorias = Categoria::select('id', 'nombre')->orderBy('nombre')->get();

        return view('gamebuster.edit', compact('game', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Solo Admins y Editores pueden actualizar juegos
        if (!in_array(Auth::user()->role, ['admin', 'editor'])) {
            return redirect()->route('user.index')->with('error', 'No tienes permisos para actualizar juegos.');
        }

        $game = Game::findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'fecha_lanzamiento' => 'required|date|before:tomorrow',
            'categoria_id' => 'required',
            'descripcion' => 'required',
        ]);

        $game->update([
            'nombre' => $request->nombre,
            'fecha_lanzamiento' => $request->fecha_lanzamiento,
            'categoria_id' => $request->categoria_id,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('gamebuster.index')->with('status', 'Juego actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        // Solo Admins y Editores pueden eliminar juegos
        if (!in_array(Auth::user()->role, ['admin', 'editor'])) {
            return redirect()->route('user.index')->with('error', 'No tienes permisos para eliminar juegos.');
        }

        $game->delete();

        return redirect()->route('gamebuster.index')->with('status', 'Juego eliminado correctamente.');
    }
}
