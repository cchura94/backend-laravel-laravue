<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    public function materias()
    {
        return $this->belongsToMany(Materia::class)->withPivot("dia", "hora_ini", "hora_fin");;
    }
}
