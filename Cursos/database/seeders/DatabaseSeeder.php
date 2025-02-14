<?php

namespace Database\Seeders;

use App\Models\Profesor;
use App\Models\Curso;
use App\Models\CursoEstudiante;
use App\Models\Estudiante;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seeders para tener datos por defecto. 
     */
    public function run(): void
    {



        Profesor::create([
            'nombre' => 'Juan Pérez',
            'correo' => 'juan.perez@mail.com',
            'avatar' => 'https://robohash.org/juanperez.png',
        ]);

        Profesor::create([
            'nombre' => 'María López',
            'correo' => 'maria.lopez@mail.com',
            'avatar' => 'https://robohash.org/marialopez.png',
        ]);


        Estudiante::create([
            'nombre' => 'Ana Rodríguez',
            'correo' => 'ana.rodriguez@mail.com',
            'avatar' => 'https://robohash.org/anarodriguez.png',
        ]);

        Estudiante::create([
            'nombre' => 'Pedro Martínez',
            'correo' => 'pedro.martinez@mail.com',
            'avatar' => 'https://robohash.org/pedromartinez.png',
        ]);





        Curso::create([
            'nombre' => 'Matemáticas',
            'descripcion' => 'Curso de matemáticas básicas',
            'creditos' => 4,
            'profesor_id' => 1,
        ]);

        Curso::create([
            'nombre' => 'Física',
            'descripcion' => 'Curso de física básica',
            'creditos' => 4,
            'profesor_id' => 2,
        ]);

        Curso::create([
            'nombre' => 'Química',
            'descripcion' => 'Curso de química básica',
            'creditos' => 4,
            'profesor_id' => 1,
        ]);

        Curso::create([
            'nombre' => 'Biología',
            'descripcion' => 'Curso de biología básica',
            'creditos' => 4,
            'profesor_id' => 2,
        ]);



        CursoEstudiante::create([
            'curso_id' => 1,
            'estudiante_id' => 1,
        ]);

        CursoEstudiante::create([
            'curso_id' => 2,
            'estudiante_id' => 2,
        ]);

    }
}
