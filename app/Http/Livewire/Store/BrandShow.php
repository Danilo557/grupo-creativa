<?php

namespace App\Http\Livewire\Store;

use App\Models\Brand;
use Livewire\Component;
 

class BrandShow extends Component
{
  

    public $brand;
    public $open= false;

    public function mount(Brand $brand){
        $this->brand=$brand;
    }
     
    public function render()
    {
        return view('livewire.store.brand-show')->layout('layouts.store');
    }

    
    
}
