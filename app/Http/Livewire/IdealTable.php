<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Ideal;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;

class IdealTable extends DataTableComponent
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
            $ideal = Ideal::whereIn('id', $this->getSelected())->delete();
            $this->clearSelected();
        } else {

            //Emitir evento
            $this->emit('error', 'no hay elementos para eliminar');

            $this->dialog()->error(
                $title = 'Error',
                $description = 'No hay elementos para eliminar'

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

            Column::make("image_url", "image.url")
                ->hideIf(true),

            Column::make("Sort", "sort")
                ->sortable(),

            Column::make('Image')->label(
                fn ($row) => view('admin.ideals.tables.image', ['img' => Storage::url($row->image->url)])
            )->html(),

            Column::make("Name", "name")
                ->sortable(),

            Column::make('Actions')->label(
                fn ($row) => view('admin.ideals.tables.actions', ['ideal' => $row->slug])
            )->html(),
        ];
    }



    public function builder(): Builder
    {
        return Ideal::query()
            ->with('image')
            ->where('images.imageable_type', Ideal::class);
    }
}
