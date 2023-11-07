<?php

namespace App\Http\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Color;
use WireUi\Traits\Actions;

class ColorTable extends DataTableComponent
{
    use Actions;

    protected $model = Color::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setColumnSelectStatus(false);
        $this->setBulkActions([
           'deleteSelected'=>'Eliminar'
       ]);
    }

    public function deleteSelected(){
        if ($this->getSelected()) {
           $articles = Color::whereIn('id', $this->getSelected())->delete();
           $this->clearSelected();
       }else{

           //Emitir evento
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


                Column::make("Sort", "sort")
                ->sortable(),

                Column::make("Name", "name")
                ->sortable(),
                Column::make("Code", "code")->hideIf(true),

                Column::make('Color')->label(
                    fn( $row)=>view('admin.colors.tables.color-code',['code'=>$row->code])
                )->html(),

                Column::make('Acciones')->label(
                    fn( $row)=>view('admin.colors.tables.actions',['id'=>$row->slug])
                )->html(),
        ];
    }
}