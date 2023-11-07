<?php

namespace App\Observers;

use App\Models\Store;

class StoreObserver
{
    public function creating(Store $store)
    {
        $store->sort = Store::max('sort') + 1;
    }
}
