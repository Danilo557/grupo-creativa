<?php

namespace App\Http\Livewire\Store;

use App\Models\Municipality;
use App\Models\Order;
use App\Models\State;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class CreateOrder extends Component
{
    public $states = [], $municipalities = [];
    public $state_id , $municipality_id = "";
    public $address, $reference, $envio_type = 1;
    public $contact, $phone, $shipping_cost = 100;

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'envio_type' => 'required',
    ];
    public function mount()
    {
        $this->states = State::all();
    }
    public function updatedStateId($value)
    {
        $this->reset(['municipality_id', 'municipalities']);
        $this->municipalities = Municipality::where('state_id', $value)->get();
    }

    public function render()
    {
        return view('livewire.store.create-order')->layout('layouts.store');
    }

    public function createOrder(){
        $rules = $this->rules;
        if ($this->envio_type == 2) {
            $rules['state_id']='required';
            $rules['municipality_id']='required';
            $rules['address']='required';
            $rules['reference']='required';
        }

        $this->validate($rules);

        $order=new Order();
        $order->user_id=auth()->user()->id;
        $order->contact=$this->contact;
        $order->phone=$this->phone;
        $order->envio_type=$this->envio_type;
        $order->shipping_cost=$this->shipping_cost;
        $order->total=(float)  Cart::subtotal(2,'.','');
        $order->content=Cart::content();

        if($this->envio_type == 2){
            $order->envio=json_encode([
                'state'=>State::find($this->state_id),
                'municipality'=>Municipality::find($this->municipality_id),
                'address'=>$this->address,
                'references'=>$this->reference
            ]);
        }

        $order->save();
        Cart::destroy();
        return redirect()->route('orders.payment',$order);


    }
}
