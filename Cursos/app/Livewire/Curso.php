<?php

namespace App\Livewire;

use App\Models\Curso as ModelsCurso;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Notifications\Notification;

class Curso extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public $nombre = '';

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
                    ->label('Nombre del Curso')
                    ->searchable()
                    ->sortable(),

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
                            ->required()
                            ->maxLength(255),
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
                    ->label('Nombre del Curso')
                    ->required(),
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

        $this->validate([
            'nombre' => 'required',
        ],
        [
            'nombre.required' => 'El campo nombre es requerido',
        ]);

        ModelsCurso::create([
            'nombre' => $this->nombre,
        ]);
        $this->nombre = '';

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();
    }
}
