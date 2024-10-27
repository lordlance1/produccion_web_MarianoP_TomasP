<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Game extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion', 'fecha_lanzamiento', 'categoria_id','is_visible'];
    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }
}
