<?php

namespace App\Models;

use App\Models\Ups;
use App\Models\Usuario;
use App\Models\Computadora;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'pc_con_red', 'pc_con_intranet', 'pc_con_internet', 'usuarios_remotos'];

    // relacion de uno a muchos con el modelo Computadora
    public function computadoras() {
        return $this->hasMany('App\Models\Computadora');
    }

    // relacion de uno a muchos con el modelo Usuario

    public function usuarios() {
        return $this->hasMany(Usuario::class);
    }

    //Relacion de uno a muchos con el modelo UPS
    public function ups() {
        return $this->hasMany(Ups::class);
    }
}
