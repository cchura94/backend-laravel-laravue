<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function materias()
    {
        return $this->belongsToMany(Materia::class)->withPivot("nota","rol", "gestion_id");
    }
}
