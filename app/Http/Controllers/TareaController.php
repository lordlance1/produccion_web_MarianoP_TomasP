<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;

class TareaController extends Controller
{
    public function index(){
        $tareas=Tarea::all();
        $titulo= 'Lista de tareas';
        /*
        return view('tareas.index',[
            'titulo'=>$titulo,
            'tareas'=>$tareas
        ]);
        */
        return view ('tareas.index', compact('titulo','tareas'));
    }
    // formulario para crear una tarea nueva.
    public function create(){
return view('tareas.create');



    }
    //accion que recibe la informacion de las tareas a crear del metodo create
    public function store(Request $request){
$tarea=Tarea::create([
'titulo'=>$request->titulo,
'descripcion'=>$request->descripcion,
'resuelta'=> false
]);
return redirect()->route('tareas.index');
    }
}
