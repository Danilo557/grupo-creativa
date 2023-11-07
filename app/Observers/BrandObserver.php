<?php

namespace App\Observers;

use App\Models\Brand;

class BrandObserver
{
    public function creating(Brand $brand){
        $brand->sort=Brand::max('sort')+1;
    }
}
