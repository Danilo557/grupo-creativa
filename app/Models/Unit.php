<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getImageUrlAttribute()
    {
        return isset($this->image) ?  $this->image->url : 'landing/img/404-picture-not-found.jpg';
    }

    public function sizes()
    {
        return $this->hasMany(Size::class);
    }
}
