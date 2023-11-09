<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Message;

class MessageTable extends DataTableComponent
{
    protected $model = Message::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectStatus(false);
    }

    public function filters(): array
    {
        return [
            DateFilter::make('Desde')

                ->filter(function (Builder $query, $value) {
                    $query->whereDate('messages.created_at', '>=', $value);
                }),

            DateFilter::make('Hasta')->filter(function (Builder $query, $value) {
                $query->whereDate('messages.created_at', '<=', $value);
            }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable()
                ->hideIf(true),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),
            Column::make("Email", "email")
                ->sortable(),

            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make('Actions')->label(
                fn ($row) => view('admin.messages.tables.actions', ['message' => $row->id])
            )->html(),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->hideIf(true),
        ];
    }
}
