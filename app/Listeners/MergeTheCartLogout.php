<?php

namespace App\Listeners;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Providers\Logout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class MergeTheCartLogout
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\Logout  $event
     * @return void
     */
    public function handle(Logout $event)
    {
        //
        Cart::erase(auth()->user()->id);
        Cart::Store(auth()->user()->id);
    }
}
