<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ideal;
use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class CreateIdeal extends Component
{
    use WithFileUploads;
    use Actions;

    public $image, $identificador;
    public $name, $slug;

    public function render()
    {
        return view('livewire.admin.create-ideal')->layout('layouts.admin');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:ideals',
            'image'=> 'required|image'
        ];
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $rules = $this->rules();
        $this->validate($rules);

        $image = $this->image->store('public/posts');

        $ideal=Ideal::create([
            'name'=>$this->name,
            'slug'=>$this->slug
        ]);

        $ideal->image()->create([
            'url' => $image,
            'imageable_id' => $ideal->id,
            'imageable_type' => Ideal::class
        ]);

        $this->dialog()->show([

            'title'       => 'Guardado',
            'description' => 'Registro guardado',
            'icon'        => 'success',
            'method'      => 'redirect',
            'params'      => $ideal->slug,

        ]);
    }

    public function redirect($url)
    {
        return redirect()->route('admin.ideals.edit', $url);
    }
}
