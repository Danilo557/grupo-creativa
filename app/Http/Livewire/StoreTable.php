<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Store;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;

class StoreTable extends DataTableComponent
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
            $store = Store::whereIn('id', $this->getSelected())->delete();
            $this->clearSelected();
        }else{
            $this->dialog()->error(

                $title = 'Error !!!',
    
                $description = 'No hay elementos seleccionados'
    
            );
        }
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->hideIf(true),

            Column::make("Sort", "sort")
                ->sortable(),

            Column::make('Image', 'image.url')->format(
                fn ($value, $row, Column $column) => view('admin.stores.tables.image', ['image' => Storage::url($value)])
            )->html(),

            Column::make("name", "name")
                ->sortable()
                ->searchable(),

            Column::make("Slug", "slug")
                ->hideIf(true),




            Column::make('Acciones', 'id')->format(
                fn ($value, $row, Column $column) => view('admin.stores.tables.actions', ['store' => $row->slug])
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
        return Store::query()
            ->with('image')
            ->where('images.imageable_type', Store::class);
    }
}
