<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart extends Component
{
    protected $listeners=['render'=>'render'];
    //Destuye el carrito de compra
    public function distroy()
    {
        Cart::destroy();
        $this->emitTo('dropdown-cart','render');
    }
    
    //Elimina un elemento del carrito
    public function delete($rowId)
    {
        Cart::remove($rowId);
        $this->emitTo('store.dropdown-cart','render');
    }

    public function render()
    {
        return view('livewire.store.shopping-cart')->layout('layouts.store');
    }
}
