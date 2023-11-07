<?php

namespace App\Http\Livewire\Admin;

use App\Models\Unit;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class UpdateUnit extends Component
{   
    use Actions;

    public Unit $unit;
    public $slug, $name;

    protected $listeners = ['refreshUnit' => 'refreshUnit'];

    public function mount(Unit $unit)
    {
        $this->unit = $unit;
        $this->slug = $unit->slug;
        $this->name = $unit->name;
    }

    public function refreshUnit()
    {
        $this->unit = $this->unit->fresh();
    }

    public function render()
    {
        return view('livewire.admin.update-unit')->layout('layouts.admin');
    }
    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:units,slug,' . $this->unit->id,
        ];
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }


    public function update()
    {

        $rules = $this->rules();
        $this->validate($rules);

        $this->unit->update([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->unit->save();
        
        $this->dialog([
            'title'       => 'Guardado',
            'description' => 'Registro actualizado',
            'icon'        => 'success',
            'onClose' => [
                'label' => 'Ok',
                'method'      => 'refreshUnit',

            ]

        ]);
    }
}
