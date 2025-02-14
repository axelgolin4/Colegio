<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Curso;

/**
 * Este es el modelo de CursoEstudiante.
 * Aqui se definen las relaciones y atributos del modelo.
 */
class CursoEstudiante extends Model
{
    use HasFactory;

    protected $fillable = ['curso_id', 'estudiante_id'];

    protected $table = 'curso_estudiante';

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }
}
