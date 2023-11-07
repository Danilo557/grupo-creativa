<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class CreateBrand extends Component
{
    use WithFileUploads;
    use Actions;

    public $name, $slug, $description, $color;
    public $image, $identificador;


    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:brands',
            'description' => 'required',
            'color' => 'required',
            'image' => 'image'
        ];
    }

    public function render()
    {
        return view('livewire.admin.create-brand')->layout('layouts.admin');
    }

    public function mount()
    {
        $this->identificador = rand();
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }


    public function redirection($brand)
    {
        return redirect()->route('admin.brands.edit', $brand);
    }
    public function save()
    {
        $rules = $this->rules();
        $this->validate($rules);

        $image = $this->image->store('public/posts');

        $brand = Brand::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'color' => $this->color
        ]);

        $brand->image()->create([
            'url' => $image,
            'imageable_id' => $brand->id,
            'imageable_type' => Brand::class
        ]);

        $this->dialog([
            'title'       => 'Guardado',
            'description' => 'Registro actualizado',
            'icon'        => 'success',
            'onClose' => [
                'label' => 'Ok',
                'method'      => 'redirection',
                'params'      => $brand->slug,
            ]

        ]);
         
    }
}
