<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombre",
        "identificador",
        "colector",
        "longitud",
        "latitud",
        "localidad",
        "ubicacion",
        "fisiografia",
        "fechaColecta",
    ]; 

    public function planta(){
        return $this->belongsTo(Planta::class);

    }

    public function aprobaciones(){
        return $this->belongTo(Aprobaciones::class);
    }


}
