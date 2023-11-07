<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use WireUi\Traits\Actions;
use Illuminate\Support\Str;

class CreateCategory extends Component
{
    use Actions;

    public $name, $slug;


    public function render()
    {
        return view('livewire.admin.create-category')->layout('layouts.admin');
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:categories',
        ];
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }
    public function redirection($category)
    {
        return redirect()->route('admin.categories.edit', $category);
    }

    public function save(){
        $rules=$this->rules();
        $this->validate($rules);

        $category=Category::create([
            'name'=>$this->name,
            'slug'=>$this->slug
        ]);
        

        $this->dialog([
            'title'       => 'Guardado',
            'description' => 'Registro actualizado',
            'icon'        => 'success',
            'onClose' => [
                'label' => 'Ok',
                'method'      => 'redirection',
                'params'      => $category->slug,
            ]

        ]);
        
    }
}
