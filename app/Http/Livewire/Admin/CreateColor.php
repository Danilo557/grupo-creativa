<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class CreateColor extends Component
{
    use Actions;

    public $name, $slug, $code;

    public function render()
    {
        return view('livewire.admin.create-color')->layout('layouts.admin');
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:colors',
            'code' => 'required|valid_color',
        ];
    }

    public function redirection($color)
    {
        return redirect()->route('admin.colors.edit', $color);
    }

    public function save()
    {
        $rules = $this->rules();
        $this->validate($rules);

        $color = Color::create([
            "name" => $this->name,
            "slug" => $this->slug,
            "code" => $this->code,
        ]);

        $this->dialog([
            'title'       => 'Guardado',
            'description' => 'Registro actualizado',
            'icon'        => 'success',
            'onClose' => [
                'label' => 'Ok',
                'method'      => 'redirection',
                'params'      => $color->slug,
            ]

        ]);
    }
}
