<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;

class BrandTable extends DataTableComponent
{
    use Actions;

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setBulkActions([
            'deleteSelected' => 'Eliminar'
        ]);

        $this->setColumnSelectStatus(false);
    }

    public function deleteSelected()
    {
        if ($this->getSelected()) {
            $brand = Brand::whereIn('id', $this->getSelected())->delete();
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
            Column::make("Slug", "slug")
                ->hideIf(true),

            Column::make("Sort", "sort")
                ->sortable(),
            Column::make("image_url", "image.url")
                ->hideIf(true),

            Column::make('Image')->label(
                fn ($row) => view('admin.brands.tables.image', ['img' => Storage::url($row->image->url)])
            )->html(),

            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Id", "id")
                ->hideIf(true),

            Column::make('Acciones')->label(
                fn ($row) => view('admin.brands.tables.actions', ['brand' => $row->slug])
            )->html(),
            Column::make("Created at", "created_at")
                ->hideIf(true),
            Column::make("Updated at", "updated_at")
                ->hideIf(true),
        ];
    }

    public function builder(): Builder
    {

        return Brand::query()
            ->with('image')
            ->where('images.imageable_type', Brand::class);
    }
}
