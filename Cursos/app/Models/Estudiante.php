<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Curso;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo', 'avatar'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }

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
