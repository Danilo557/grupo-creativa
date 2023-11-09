<?php

namespace App\Observers;

use App\Models\Message;

class MessageObserver
{
    public function creating(Message $message){
        $message->sort=Message::max('sort')+1;
    }
}
