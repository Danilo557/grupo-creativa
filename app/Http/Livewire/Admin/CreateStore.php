<?php

namespace App\Http\Livewire\Admin;

use App\Models\Store;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class CreateStore extends Component
{
    use WithFileUploads;
    use Actions;

    public $name, $slug, $image, $identificador;

    public function mount()
    {
        $this->identificador = rand();
    }

    public function render()
    {
        return view('livewire.admin.create-store')->layout('layouts.admin');
    }

    public function redirection($store)
    {
        return redirect()->route('admin.stores.edit', $store);
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:stores',
            'image' => 'image'
        ];
    }

    public function save()
    {
        $rules = $this->rules();
        $this->validate($rules);

        $image = $this->image->store('public/posts');

        $store = Store::Create([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $store->image()->create([
            'url' => $image,
            'imageable_id' => $store->id,
            'imageable_type' => Store::class
        ]);

        $this->dialog([
            'title'       => 'Guardado',
            'description' => 'Registro actualizado',
            'icon'        => 'success',
            'onClose' => [
                'label' => 'Ok',
                'method'      => 'redirection',
                'params'      => $store->slug,
            ]

        ]);
    }
}
