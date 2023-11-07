<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;


class CreateProduct extends Component
{
    use Actions;
    
    public $name, $slug, $brand_id,$category_id;
    public $features,$ideals,$colors,$materials;
    public function render()
    {
        return view('livewire.admin.create-product')->layout('layouts.admin');
    }

    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:products',
            'brand_id' => 'required',
            'category_id' => 'required',
        ];
            
    }

     

    public function createproduct(){
        $this->slug = Str::slug($this->name);
        $rules=$this->rules();
        $this->validate($rules);


        $product=Product::create([
            'name'=>$this->name,
            'slug'=>$this->slug,
            'brand_id'=>$this->brand_id,
            'category_id'=>$this->category_id
        ]);

        $product->features()->sync($this->features);
        $product->ideals()->sync($this->ideals);
        $product->colors()->sync($this->colors);
        $product->materials()->sync($this->materials);

        $product->save();


        $this->dialog([
            'title'       => 'Guardado',
            'description' => 'Registro actualizado',
            'icon'        => 'success',
            'onClose' => [
                'label' => 'Ok',
                'method'      => 'redirection',
                'params'      => $product->slug,
            ]

        ]);

    }

    public function redirection($product)
    {
        return redirect()->route('admin.products.edit', $product);
    }
    

}   
