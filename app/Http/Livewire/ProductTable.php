<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;

class ProductTable extends DataTableComponent
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
            $product = Product::whereIn('id', $this->getSelected())->delete();
            $this->clearSelected();
        } else {
            $this->dialog()->error(
                $title = 'Error !!!',
                $description = 'Your profile was not saved'

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

            Column::make("image_url", "image.url")
                ->hideIf(true),

                Column::make("Slug", "slug")
                ->hideIf(true),

            Column::make('Image')->label(
                fn ($row) => view('admin.brands.tables.image', ['img' => Storage::url($row->image->url)])
            )->html(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),


            


            column::make('Acciones', 'id')->format(
                fn ($value, $row, Column $column) => view('admin.products.tables.actions', ['product' => $row->slug])
            )->html(),
        ];
    }

    public function builder(): Builder
    {
        return Product::query()
            ->with('features')
            ->with('ideals')
            ->with('colors')
            ->with('materials')
            ->with('sizes')
            ->with('stores')
            ->with('brand')
            ->with('category')
            ->with('image');
    }
}
