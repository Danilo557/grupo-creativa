<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class UpdateCategory extends Component
{
    use Actions;

    public $category;
    public $name, $slug;

    protected $listeners = ['refreshCategory' => 'refreshCategory'];

    public function refreshCategory()
    {
        
        $this->category = $this->category->fresh();
       
    }

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->name = $this->category->name;
        $this->slug = $this->category->slug;
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:categories,slug,' . $this->category->id,
        ];
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function render()
    {
        return view('livewire.admin.update-category')->layout('layouts.admin');
    }

    public function update()
    {
        $rules = $this->rules();
        $this->validate($rules);

        $this->category->update([
            'name' => $this->name,
            'slug' => $this->slug,
        ]);

        $this->dialog()->success(
            $title = 'Profile saved',
            $description = 'Your profile was successfully saved'

        );

        $this->refreshCategory();
    }
}
