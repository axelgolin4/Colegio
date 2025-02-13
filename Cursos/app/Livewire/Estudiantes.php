<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Estudiante;
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
use Filament\Notifications\Notification;

class Estudiantes extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public $nombre = '';
    public $correo = '';

    public function render()
    {
        return view('livewire.estudiantes');
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Estudiante::query())
            ->columns([
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
                    ->record(function (Estudiante $estudiante) {
                        return $estudiante;
                    })
                    ->successNotification(
                        Notification::make()
                            ->success()
                            ->title('Estudiante Actualizado')
                            ->body('El estudiante ha sido actualizado correctamente.'),
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

                Action::make('curso')
                    ->label('Curso')
                    ->icon('heroicon-o-book-open')
                    ->color('info')
                    ->url(function (Estudiante $estudiante) {
                        return route('estudiantes.cursos', $estudiante);
                    }),
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
        $this->dispatch('open-modal', id: 'modal-estudiante');
    }

    public function CloseModal()
    {
        $this->dispatch('close-modal', id: 'modal-estudiante');
    }


    public function SaveEstudiante()
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

        Estudiante::create([
            'nombre' => $this->nombre,
            'correo' => $this->correo,
        ]);
        $this->nombre = '';

        Notification::make()
            ->title('Saved successfully')
            ->success()
            ->send();

        $this->dispatch('close-modal', id: 'modal-estudiante');
    }
}
