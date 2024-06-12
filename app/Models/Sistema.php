<?php

namespace App\Models;

use App\Models\Computadora;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sistema extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion'];

    // relacion de muchos a muchos inversa con el modelo computadoras

    public function computadoras() {
        return $this->belongsToMany(Computadora::class);
    }
}
