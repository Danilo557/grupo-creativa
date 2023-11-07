<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Size;
use Livewire\Component;

class ProductSize extends Component
{
    public $product, $sizes, $high,$width, $unit_id,$price;

    protected $listeners = ['refreshProductSize' => 'refreshProductSize'];
    public function refreshProductSize()
    {
        $this->reset(['high', 'width','unit_id',"price"]);
        $this->product = $this->product->fresh();
        $this->sizes=$this->product->sizes;
        
    }
    public function render()
    {
        return view('livewire.admin.product-size');
    }

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->sizes=$product->sizes;
    }
    public function rules()
    {
        return [
            'high' => 'required|sizes_unique',
            'width' => 'required|sizes_unique',
            'unit_id'=>'required',
            'price'=>'required'
        ];
    }

    public function deleteSize(Size $size){

        Size::destroy($size->id);
        
       
        $this->refreshProductSize();
    }
    public function add(){
        $rules=$this->rules();
        $this->validate($rules);
         
        $this->product->sizes()->create([
            "high"=>$this->high,
            "width"=>$this->width,
            "unit_id"=>$this->unit_id,
            "price"=>$this->price
        ]);
        $this->refreshProductSize();
    }
}
