<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Estudiante;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'descripcion', 'creditos', 'profesor_id'];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
}
