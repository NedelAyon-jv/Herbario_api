<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planta extends Model
{
    use HasFactory;
    protected $fillable = [
        "nombreCientifico",
        "nombreComun",
        "familia",
        "habitat",
        "formaBiologica",
        "tipoVegetacion",
        "vulnerada",
        "infoAdicional",
    ];

    public function observacion(){
        return $this->hasMany(Observacion::class,"idPlanta");
    }

}
