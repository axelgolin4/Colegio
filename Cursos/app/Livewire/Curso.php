<?php

namespace App\Livewire;

use App\Models\Curso as ModelsCurso;
use App\Models\Profesor;
use App\Tables\Columns\ProfesorColumn;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\EditAction;
use Filament\Support\Enums\Alignment;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Notifications\Notification;
use Filament\Forms\Components\Select;

class Curso extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public $nombre = '';
    public $descripcion = '';
    public $creditos = '';
    public $profesor = '';

    public function render()
    {
        return view('livewire.curso');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(ModelsCurso::query())
            ->columns([
                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable()
                    ->sortable(),

                ProfesorColumn::make('profesor')
                    ->alignment(Alignment::Center)
                    ->label('Maestro'),

                TextColumn::make('creditos')
                    ->label('Créditos'),

                TextColumn::make('created_at')
                    ->label('Fecha de Creación')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                DeleteAction::make()
                    ->label('Eliminar'),

                EditAction::make()
                    ->record(function (ModelsCurso $curso) {
                        return $curso;
                    })
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Curso Actualizado')
                            ->body('El curso ha sido actualizado correctamente.'),
                    )
                    ->form([
                        TextInput::make('nombre')
                            ->label('Nombre')
                            ->required(),

                        TextInput::make('descripcion')
                            ->label('Descripción')
                            ->required(),

                        TextInput::make('creditos')
                            ->label('Creditos')
                            ->integer()
                            ->required(),

                        Select::make('profesor')
                            ->label('Maestro')
                            ->options(Profesor::all()->pluck('nombre', 'id'))
                            ->searchable(),
                    ]),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nombre')
                    ->label('Nombre')
                    ->required(),

                TextInput::make('descripcion')
                    ->label('Descripción')
                    ->required(),

                TextInput::make('creditos')
                    ->label('Creditos')
                    ->integer()
                    ->required(),

                Select::make('profesor')
                    ->label('Maestro')
                    ->options(Profesor::all()->pluck('nombre', 'id'))
                    ->searchable(),
            ]);
    }


    public function ShowModal()
    {
        $this->dispatch('open-modal', id: 'modal-curso');
    }

    public function CloseModal()
    {
        $this->dispatch('close-modal', id: 'modal-curso');
    }

    public function SaveCurso()
    {

        $this->validate(
            [
                'nombre' => 'required',
                'descripcion' => 'required',
                'creditos' => 'required',
                'profesor' => 'required',
            ],
            [
                'nombre.required' => 'El campo nombre es requerido',
                'descripcion.required' => 'El campo descripción es requerido',
                'creditos.required' => 'El campo créditos es requerido',
                'profesor.required' => 'El campo maestro es requerido',
            ]
        );

        ModelsCurso::create([
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'creditos' => $this->creditos,
            'profesor_id' => $this->profesor,
        ]);
        $this->nombre = '';

        Notification::make()
            ->title('Curso Agregado')
            ->success()
            ->send();

        $this->dispatch('close-modal', id: 'modal-curso');
    }
}
