<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aprobaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        "correoCuenta",
        "observaciones",
    ];

    public function observacion(){
        return $this->belongsTo(Observacion::class);
    }


}
