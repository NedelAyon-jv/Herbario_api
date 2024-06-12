<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    use HasFactory;
    protected $table="Observaciones";
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
        "idPlanta",
    ]; 

    public function planta(){
        return $this->belongsTo(Planta::class,"idPlanta");
        
    }

    public function aprobaciones(){
        return $this->belongTo(Aprobaciones::class);
    }


}
