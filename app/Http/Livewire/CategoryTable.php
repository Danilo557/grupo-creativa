<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;
use WireUi\Traits\Actions;

class CategoryTable extends DataTableComponent
{
    use Actions;

    protected $model = Category::class;

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
            $category = Category::whereIn('id', $this->getSelected())->delete();
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

            Column::make("Name", "name")
                ->sortable()
                ->searchable(),

                Column::make("Slug", "slug")
                ->hideIf(true),

            column::make('Acciones')->label(
                fn ($row) => view('admin.categories.tables.actions', ['category' => $row->slug])
            )->html(),


        ];
    }
}
