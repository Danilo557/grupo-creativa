<?php

namespace App\Http\Livewire\Store;

 
use App\Models\Product;
use Livewire\Component;

class AddCartItemSize extends Component
{
    public Product $product;
    public $colors=[], $sizes=[], $materials=[];
    public $color, $size, $material;
 
    public function mount(Product $product)
    {
        $this->product = $product;

       
        foreach ($this->product->colors as  $color) {
            array_push( $this->colors,['id'=>$color->id,'name'=>$color->name]);
        }

        foreach ($this->product->sizes as  $size) {
            array_push( $this->sizes,['id'=>$size->id,'name'=>$size->high.'x'.$size->width.$size->unit->name]);
        }

        foreach ($this->product->materials as  $material) {
            array_push( $this->materials,['id'=>$material->id,'name'=>$material->name]);
        }
        
         
       
        

         

         
    }
    public function render()
    {
        return view('livewire.store.add-cart-item-size');
    }
}
