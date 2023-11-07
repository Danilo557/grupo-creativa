<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class UpdateColor extends Component
{
    use Actions;
    
    public $color;
    public $name, $slug,$code;

    protected $listeners = ['refreshColor' => 'refreshColor'];
    
    public function refreshColor(){
         
        $this->name=$this->color->fresh();
        $this->name=$this->color->name;
        $this->slug=$this->color->slug;
        $this->code=$this->color->code;
    }

    public function mount(Color $color)
    {
         
        $this->color = $color;
        $this->name=$this->color->name;
        $this->slug=$this->color->slug;
        $this->code=$this->color->code;
         
    }

    public function render()
    {
        return view('livewire.admin.update-color')->layout('layouts.admin');
    }

     

    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:categories,slug,' . $this->color->id,
            'code'=>'required|valid_color'
        ];
    }

    public function updatedName($value){
        $this->slug = Str::slug($value);
    }

    public function update(){
       
        $rules = $this->rules();
        $this->validate($rules);

        $this->color->name=$this->name;
        $this->color->slug=$this->slug;
        $this->color->code=$this->code;

        $this->color->save();

        $this->dialog()->success(
            $title = 'Actualizado',
            $description = 'El registro ha sido actualizado'

        );

        $this->refreshColor();
         

    }
}
