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
        $games= Game::select('id','nombre','fecha_lanzamiento','categoria_id', 'imagen')
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
'descripcion'=>'required',
'imagen' => 'nullable|string',
        ],[
            'nombre.required'=>' debe ingresar un nombre',
            'fecha_lanzamiento.required'=>'debe ingresar una fecha de nacimiento',
            'catregoria_id.required'=>'debe seleccionar una categoria',
            'fecha_lanzamiento.date' => 'La fecha de nacimiento debe ser una fecha válida',
            'fecha_lanzamiento.before' => 'La fecha de nacimiento debe ser antes de mañana',
            'descripcion.required'=>'debe agregar una descripcion',
           
            ]
    );
       Game::create([
        'nombre'=>$request->nombre,
        'fecha_lanzamiento'=>$request->fecha_lanzamiento,
        'categoria_id'=>$request->categoria_id,
        'descripcion'=>$request->descripcion,
        'imagen' => $request->input('imagen') ?? 'https://picsum.photos/200/300',
       ]);
return redirect()->route('gamebuster.index')
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
    public function edit($id)
    {
        $game = Game::findOrFail($id);
        $categorias = Categoria::select('id', 'nombre')->orderBy('nombre')->get();
        return view('gamebuster.edit', compact('game', 'categorias'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
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
    
        return redirect()->route('gamebuster.index')->with('status', 'Juego actualizado correctamente');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        //
    }
}
