<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;


class UpdateBrand extends Component
{
    use Actions;
    use WithFileUploads;

    public $brand, $image,  $identificador;
    
    protected $listeners = ['refreshBrand' => 'refreshBrand'];

    public function refreshBrand()
    {
        $this->brand = $this->brand->fresh();
    }

    protected function rules()
    {
        return [
            'brand.name' => 'required',
            'brand.slug' => 'required|max:255|unique:brands,slug,' . $this->brand->id,
            'brand.description' => 'required',
            'brand.color' => 'required',
            
          
        ];
    }

    public function render()
    {
        return view('livewire.admin.update-brand')->layout('layouts.admin');
    }

    public function mount(Brand $brand)
    {
        $this->identificador = rand();
        $this->brand = $brand;
    }
    public function updatedBrandName($value)
    {
        $this->brand->slug = Str::slug($value);
    }

    public function close()
    {

        $this->refreshBrand();
    }
    public function update()
    {
        $rules = $this->rules();
        $this->validate($rules);

        if ($this->image) {
            $rules['image']='image';
        }

        $this->validate($rules);

        if ($this->image) {

            Storage::delete([$this->brand->image]);
            //Guarda la nueva iamgen
            $this->brand->image->update(['url' => $this->image->store('public/posts')]);
        }



        $this->brand->save();

        
        $this->identificador = rand();
        $this->reset(['image']);

        $this->dialog([
            'title'       => 'Actualizado',
            'description' => 'Los datos han sido actualizados',
            'icon'        => 'success',

        ]);

        $this->refreshBrand();
    }
}
