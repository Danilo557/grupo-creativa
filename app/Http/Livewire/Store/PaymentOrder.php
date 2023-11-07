<?php

namespace App\Http\Livewire\Store;

use App\Models\Order;
use Livewire\Component;

class PaymentOrder extends Component
{
    public $order;

    protected $listeners=['payOrder'=>'payOrder'];

    public function payOrder(){
        $this->order->status=Order::RECIBIDO;
        $this->order->save();

        return redirect()->route('orders.show',$this->order);
    }
    
    public function mount(Order $order){
        $this->order=$order;
    }

    public function render()
    {
        $items=json_decode($this->order->content);
        $envio = json_decode($this->order->envio);
        return view('livewire.store.payment-order',compact('items','envio'))->layout('layouts.store');
    }
}
