<?php

namespace App\Observers;

use App\Models\Color;

class ColorObserver
{
    public function creating(Color $article){
        $article->sort=Color::max('sort')+1;
    }
}
