<?php

namespace App\Http\Livewire\Admin;

use App\Models\Ideal;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class UpdateIdeal extends Component
{
    use WithFileUploads;
    
    use Actions;

    public $name, $slug;
    public Ideal $ideal;
    public $image;
    public $identificador;

    protected $listeners = ['refreshIdeal' => 'refreshIdeal'];

    protected function refreshIdeal()
    {
        $this->ideal = $this->ideal->fresh();
        $this->name = $this->ideal->name;
        $this->slug = $this->ideal->slug;

        $this->reset(['image']);
        $this->identificador = rand();
    }

    public function mount(Ideal $ideal)
    {
        $this->ideal = $ideal;
        $this->name = $ideal->name;
        $this->slug = $ideal->slug;

        $this->identificador = rand();
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:ideals,slug,' . $this->ideal->id,

        ];
    }

    public function render()
    {
        return view('livewire.admin.update-ideal')->layout('layouts.admin');
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function update()
    {
        $rules = $this->rules();
        $this->validate($rules);

        $this->ideal->name= $this->name;
        $this->ideal->slug= $this->slug;

        if ($this->image) {
            Storage::delete([$this->ideal->image]);
            $this->ideal->image->update(['url' => $this->image->store('public/posts')]);
        }

        $this->ideal->save();

        $this->dialog()->success(
            $title = 'Actualizado',
            $description = 'Registro actualizado'
        );

        $this->refreshIdeal();
    }
}
