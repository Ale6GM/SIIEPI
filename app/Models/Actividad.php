<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Computadora;

class Actividad extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion'];

    // Relacion de uno a muchos con el modelo computadora
    public function computadoras() {
        return $this->hasMany(Computadora::class);
    }
}
