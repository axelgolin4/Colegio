<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Curso;


class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo'];

    public function cursos()
    {
        return $this->belongsToMany(Curso::class);
    }
}
