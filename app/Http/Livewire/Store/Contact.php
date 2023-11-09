<?php

namespace App\Http\Livewire\Store;

use App\Models\Message;
use Livewire\Component;
use WireUi\Traits\Actions;

class Contact extends Component
{
    use Actions;

    public $name, $email, $phone, $city, $brand, $message;
    
    protected $listeners = ['refresh' => 'refresh'];

    protected function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:10',
            'city' => 'required',
            'brand' => 'required',
            'message' => 'required',
        ];
    }

    public function render()
    {
        return view('livewire.store.contact');
    }

     

    public function save()
    {
        $rules = $this->rules();
        $this->validate($rules);

        $message = Message::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'city' => $this->city,
            'brand' => $this->brand,
            'message' => $this->message,

        ]);


        $this->dialog()->success(
            $title = 'Correcto',
            $description = 'El mensaje se ha enviado'
        );

        $this->reset(['name','email','phone','city','brand','message']);

    }
}
