<?php

namespace App\Http\Livewire\Store;

use Livewire\Component;

class DropdownUser extends Component
{
    public $open=false;

    public function open_close(){
        $this->open=!$this->open;
    }

    public function render()
    {
        return view('livewire.store.dropdown-user');
    }
}
