<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Estudiante;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function estudiantes()
    {
        return $this->belongsToMany(Estudiante::class);
    }
}
