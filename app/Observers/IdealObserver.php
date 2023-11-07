<?php

namespace App\Observers;

use App\Models\Ideal;

class IdealObserver
{
    public function creating(Ideal $ideal){
        $ideal->sort=Ideal::max('sort')+1;
    }
}
