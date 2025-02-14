<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Curso;

class Profesor extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo', 'avatar'];

    protected $table = 'profesor';

    public function cursos()
    {
        return $this->hasMany(Curso::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($profesor) {
            if (empty($profesor->avatar)) {
                $profesor->avatar = 'https://robohash.org/' . urlencode($profesor->nombre) . '.png';
            }
        });
    }
}
