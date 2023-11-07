<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Spatie\Permission\Models\Role;
use WireUi\Traits\Actions;

class RoleTable extends DataTableComponent
{
    use Actions;
    protected $model = Role::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectStatus(false);

        $this->setBulkActions([
           'deleteSelected'=>'Eliminar'
       ]);
    }

    //Metodo
    public function deleteSelected(){
        if ($this->getSelected()) {
           $role = Role::whereIn('id', $this->getSelected())->delete();
           $this->clearSelected();
       }else{

        $this->dialog()->error(
            $title = 'Error',
            $description = 'No hay elementos seleccionados para eliminar'
        );
          
       }
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->sortable(),
            Column::make("Name", "name")
                ->sortable()
                ->searchable(),

            Column::make('Acciones', 'id')->format(
                fn ($value, $row, Column $column) => view('admin.roles.tables.actions', ['id' => $value])
            )->html(),

            Column::make("Created at", "created_at")
                ->sortable()
                ->hideIf(true),
            Column::make("Updated at", "updated_at")
                ->sortable()
                ->hideIf(true),
        ];
    }
}
