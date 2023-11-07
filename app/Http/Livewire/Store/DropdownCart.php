<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;

class DropdownCart extends Component
{
    protected $listeners=['render'=>'render'];

    public function render()
    {
        return view('livewire.store.dropdown-cart');
    }

    public function delete($rowId)
    {
        Cart::remove($rowId);
        $this->emitTo('dropdown-cart','render');
    }
}
