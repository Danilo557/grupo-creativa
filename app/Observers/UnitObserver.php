<?php

namespace App\Observers;

use App\Models\Unit;

class UnitObserver
{
    public function creating(Unit $unit){
        $unit->sort=Unit::max('sort')+1;
    }
}
