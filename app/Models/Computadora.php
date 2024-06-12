<?php

namespace App\Models;

use App\Models\Area;
use App\Models\Rotura;
use App\Models\Sistema;
use App\Models\Actividad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Computadora extends Model
{
    use HasFactory;

    protected $fillable = ['ip', 'trabajo', 'procesador', 'velocidad', 'almacenamiento', 'memoria', 'placa', 'area_id', 'actividad_id'];

    // relacion uno a muchos inversa con el modelo actividad
    public function actividades() {
        return $this->belongsTo(Actividad::class);
    }

    // relacion de muchos a muchos con el modelo rotura
    public function roturas() {
        return $this->belongsToMany(Rotura::class);
    }

    // relacion de muchos a muchos con el modelo sistema

    public function sistemas() {
        return $this->belongsToMany(Sistema::class);
    }

    // Relacion de uno a muchos inversa con el modelo area

    public function area() {
        return $this->belongsTo('App\Models\Area');
    }

    //Relacion de uno a muchos inversa con la tabla Actividad

    public function actividad() {
        return $this->belongsTo('App\Models\Actividad');
    }

}
