<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Profesor;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\Action;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Notifications\Notification;

class Profesores extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public $nombre = '';
    public $correo = '';

    public function render()
    {
        return view('livewire.profesores');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Profesor::query())
            ->columns([

                ImageColumn::make('avatar')
                    ->circular()
                    ->label('Avatar'),

                TextColumn::make('nombre')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('correo')
                    ->label('Correo')
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
                    ->record(function (Profesor $profesor) {
                        return $profesor;
                    })
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Maestro Actualizado')
                            ->body('El Maestro ha sido actualizado correctamente.'),
                    )
                    ->form([
                        TextInput::make('nombre')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('correo')
                            ->required()
                            ->email()
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
                    ->label('Nombre')
                    ->required(),

                TextInput::make('correo')
                    ->email()
                    ->label('Correo')
                    ->required(),
            ]);
    }

    public function ShowModal()
    {
        $this->dispatch('open-modal', id: 'modal-profesor');
    }

    public function CloseModal()
    {
        $this->dispatch('close-modal', id: 'modal-profesor');
    }


    public function SaveProfesor()
    {
        $this->validate(
            [
                'nombre' => 'required',
                'correo' => 'required|email',
            ],
            [
                'nombre.required' => 'El campo nombre es requerido',
                'correo.required' => 'El campo correo es requerido',
                'correo.email' => 'El campo correo debe ser un correo válido',
            ]
        );

        Profesor::create([
            'nombre' => $this->nombre,
            'correo' => $this->correo,
        ]);
        $this->nombre = '';

        Notification::make()
            ->title('Maestro Creado')
            ->success()
            ->send();

        $this->dispatch('close-modal', id: 'modal-profesor');
    }
}
