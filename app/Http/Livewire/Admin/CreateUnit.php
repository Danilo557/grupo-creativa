<?php

namespace App\Http\Livewire\Admin;

use App\Models\Unit;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class CreateUnit extends Component
{
    use Actions;

    public $name, $slug;
    public function render()
    {
        return view('livewire.admin.create-unit')->layout('layouts.admin');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:units',
        ];
    }
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function redirection($unit)
    {
        return redirect()->route('admin.units.edit', $unit);
    }

    public function save()
    {
        $rules = $this->rules();
        $this->validate($rules);

        $unit = Unit::create([
            'name' => $this->name,
            'slug' => $this->slug
        ]);

        $this->dialog([
            'title'       => 'Guardado',
            'description' => 'Registro actualizado',
            'icon'        => 'success',
            'onClose' => [
                'label' => 'Ok',
                'method'      => 'redirection',
                'params'      => $unit->slug,
            ]

        ]);
    }
}
