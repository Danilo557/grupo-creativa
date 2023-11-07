<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    
    protected $guarded = ['id', 'created_at', 'updated_at'];

    const BORRADOR = 1;
    const PUBLICADO = 2;


    public function getImageUrlAttribute()
    {
        return isset($this->image) ?  $this->image->url : 'landing/img/404-picture-not-found.jpg';
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
