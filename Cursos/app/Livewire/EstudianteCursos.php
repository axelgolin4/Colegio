<?php

namespace App\Livewire;

use App\Models\Estudiante;
use Livewire\Component;

class EstudianteCursos extends Component
{
    public $estudiante;

    public function render()
    {
        return view('livewire.estudiante-cursos');
    }

    public function mount($estudiante)
    {
        $this->estudiante = Estudiante::find($estudiante);
    }

}
