<?php

namespace App\Livewire;

use App\Models\Curso;
use App\Models\Estudiante;
use App\Models\CursoEstudiante;
use Livewire\Component;
use Filament\Forms\Form;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class EstudianteCursos extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public $estudiante;
    public $curso;

    public function render()
    {
        return view('livewire.estudiante-cursos');
    }

    public function mount($estudiante)
    {
        $this->estudiante = Estudiante::find($estudiante);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('curso')
                    ->label('Curso')
                    ->options(Curso::all()->pluck('nombre', 'id'))
                    ->searchable(),
            ]);
    }

    public function ShowModal()
    {
        $this->dispatch('open-modal', id: 'modal-estudiante-curso');
    }

    public function CloseModal()
    {
        $this->dispatch('close-modal', id: 'modal-estudiante-curso');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(CursoEstudiante::query())
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('curso.nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('curso.descripcion')
                    ->label('Descripción')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('curso.creditos')
                    ->label('Creditos')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                DeleteAction::make()
                    ->label('Eliminar'),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function SaveCursoEstudiante()
    {
        $this->validate([
            'curso' => 'required',
        ]);

        $this->estudiante->cursos()->attach($this->curso);

        Notification::make()
            ->title('Curso Agregado')
            ->success()
            ->send();
        
        $this->curso = null;

        $this->dispatch('close-modal', id: 'modal-estudiante-curso');
    }
}
