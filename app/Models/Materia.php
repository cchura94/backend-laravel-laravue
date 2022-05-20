<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }

    public function personas()
    {
        return $this->belongsToMany(Persona::class)->withPivot("nota", "rol", "gestion_id");
    }

    public function aula()
    {
        return $this->belongsToMany(Aula::class)->withPivot("dia", "hora_ini", "hora_fin");
    }
}
