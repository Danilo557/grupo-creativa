<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;

class UserTable extends DataTableComponent
{
    //protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectStatus(false);
        $this->setSingleSortingDisabled();
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),

            
            Column::make("Email", "email")
                ->sortable()
                ->searchable(),

            
            

            Column::make('Roles')->label(
                fn ($row) => view('users.tables.roles', ['id' => $row->id])
            )->html(),

            Column::make('Acciones')->label(
                fn ($row) => view('users.tables.actions', ['user' => $row->id])
            )->html(),

            Column::make("Created at", "created_at")
                ->sortable()
                ->hideIf(true),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->hideIf(true),
        ];
    }

    public function builder(): Builder
    {
        return User::query()
            ->with('roles');
    }
}
