<?php

namespace App\Http\Livewire\Store;

use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ButtonAdd extends Component
{

    public bool $open = false;
    public $product, $qty = 1;
    public $size_id, $color_id, $options;

    public function rules()
    {
        return [
            'size_id' => 'required',
            'color_id' => 'required',

        ];
    }

    public function addItem()
    {
        $rules = $this->rules();
        $this->validate($rules);


        $this->options['size'] =$this->product->SizesById($this->size_id);;
        $this->options['color'] = Color::find($this->color_id)->name;
         
        

        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => Size::find($this->size_id)->price,

            //Este campo es obligatorio, pero no se va a usar
            'weight' => 550,
            'options' => $this->options,
        ]);


        //Reset propiedad
        $this->reset(['qty', 'size_id', 'color_id']);


        //Emite evento
        $this->emitTo('store.dropdown-cart', 'render');
        $this->open=false;
    }
    public function mount(Product $product)
    {
        $this->product = $product;
        $this->options['image'] = $this->product->image_url;
       
        //$this->options['size'] = Size::find($this->size_id)->;
    }

    
    public function render()
    {
        return view('livewire.store.button-add');
    }

    public function decrement()
    {

        $this->qty = $this->qty - 1;
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
    }
}
