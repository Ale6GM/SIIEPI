<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ups extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'area_id'];

    // Relacion de uno a muchos inversa con el modelo Area
    public function area() {
        return $this->belongsTo(Area::class);
    }
}
