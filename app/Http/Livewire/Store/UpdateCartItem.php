<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateCartItem extends Component
{
    public $rowId, $qty;

    public function mount()
    {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
    }

    public function decrement()
    {

        $this->qty = $this->qty - 1;
        Cart::update($this->rowId, $this->qty);
        $this->emitTo('store.dropdown-cart','render');
        $this->emit('render');
       
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
        Cart::update($this->rowId,$this->qty);
        $this->emitTo('store.dropdown-cart','render');
        $this->emit('render');
       
    }

    public function render()
    {
        return view('livewire.store.update-cart-item');
    }
}
