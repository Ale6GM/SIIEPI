<?php

namespace App\Models;

use App\Models\Area;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    //Relacion de uno a muchos inversa con el modelo  Area

    public function areas() {
        return $this->belongsTo(Area::class);
    }
}
