<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Curso;

/**
 * Este es el modelo de Estudiante.
 * Aqui se definen las relaciones y atributos del modelo.
 */
class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo', 'avatar'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

    // Este método se ejecuta antes de crear un nuevo estudiante para asignarle un avatar por defecto.
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($estudiante) {
            if (empty($estudiante->avatar)) {
                $estudiante->avatar = 'https://robohash.org/' . urlencode($estudiante->nombre) . '.png';
            }
        });
    }
}
