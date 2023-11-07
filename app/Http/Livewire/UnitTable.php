<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Builder;
use WireUi\Traits\Actions;

class UnitTable extends DataTableComponent
{

    use Actions;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectStatus(false);

        $this->setBulkActions([
            'deleteSelected' => 'Eliminar'
        ]);
    }

    public function deleteSelected()
    {
        if ($this->getSelected()) {
            $unit = Unit::whereIn('id', $this->getSelected())->delete();
            $this->clearSelected();
        } else {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'No hay elementos seleccionados para eliminar'
            );
        }
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true),
            Column::make("Slug", "slug")
                ->hideIf(true),
            Column::make("Sort", "sort")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),

            Column::make('Acciones')->label(
                fn ($row) => view('admin.units.tables.actions', ['unit' => $row->slug])
            )->html(),

            Column::make("Created at", "created_at")
                ->hideIf(true),
            Column::make("Updated at", "updated_at")
                ->hideIf(true),
        ];
    }

    public function builder(): Builder
    {
        return Unit::query()
            //Cargar relaciones
            // ->with('user')
            //->select('')
        ;
    }
}
