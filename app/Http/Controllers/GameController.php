<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use App\Models\Categoria;
class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games= Game::select('id','nombre','fecha_lanzamiento','categoria_id')
        ->orderBy('id','desc')
        ->paginate(10);
return view ('gamebuster.index', compact('games')
);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias= Categoria::select('id','nombre')->orderBy('nombre')->get();
        return view ('gamebuster.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
'nombre'=> 'required',
'fecha_lanzamiento'=>'required|date|before:tomorrow',
'categoria_id'=>'required',
'descripcion'=>'required'
        ],[
            'nombre.required'=>' debe ingresar un nombre',
            'fecha_lanzamiento.required'=>'debe ingresar una fecha de nacimiento',
            'catregoria_id.required'=>'debe seleccionar una categoria',
            'fecha_lanzamiento.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'fecha_lanzamiento.before' => 'La fecha de nacimiento debe ser antes de mañana',
            'descripcion.required'=>'debe agregar una descripcion'
            ]
    );
       Game::create([
        'nombre'=>$request->nombre,
        'fecha_lanzamiento'=>$request->fecha_nacimiento,
        'categoria_id'=>$request->categoria_id,
        'descripcion'=>$request->descripcion,
       ]);
return redirect()->route('games.index')
->with('status','El juego se agrego correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
