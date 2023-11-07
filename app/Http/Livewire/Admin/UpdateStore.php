<?php

namespace App\Http\Livewire\Admin;

use App\Models\Store;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class UpdateStore extends Component
{
    use WithFileUploads;
    use Actions;

    public $store;
    public $name, $slug, $image;
    public $identificador;

    protected $listeners = ['refreshStore' => 'refreshStore'];

    public function refreshStore()
    {
        $this->store = $this->store->fresh();
    }

    public function render()
    {
        return view('livewire.admin.update-store')->layout('layouts.admin');
    }


    public function mount(Store $store)
    {
        $this->store = $store;
        $this->slug = $this->store->slug;
        $this->name = $this->store->name;

        $this->identificador = rand();
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function rules()
    {
        $rules = [
            'name' => 'required',
            'slug' => 'required|max:255|unique:stores,slug,' . $this->store->id,
        ];

        if ($this->image) {
            $rules['image'] = 'image';
        }

        return $rules;
    }

    public function update()
    {
        $rules = $this->rules();
        $this->validate($rules);

        if ($this->image) {
            Storage::delete([$this->store->image]);
            $this->store->image->update([
                'url' => $this->image->store('public/posts')
            ]);
        }

        $this->store->update([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->dialog()->success(

            $title = 'Profile saved',

            $description = 'Your profile was successfully saved'

        );

        $this->refreshStore();
    }
}
