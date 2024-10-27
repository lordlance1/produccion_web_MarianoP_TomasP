<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Game;
class Categoria extends Model
{
    use HasFactory;
protected $fillable=['nombre','descripcion'];
public function gamebuster (){
    return $this->hasMany(Game::class);
}

}
