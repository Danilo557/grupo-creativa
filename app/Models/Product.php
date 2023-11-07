<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Traits\ProductTrait;

class Product extends Model
{
    use HasFactory, ProductTrait;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    const BORRADOR=1;
    const PUBLICADO=2;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function SizesById($id)
    {
        foreach ( $this->sizes as $size ) {
            if ( $id == $size->id) {
                return $size->high . $size->unit->name . " x " . $size->width . $size->unit->name;
            }
        }
        return;
    }

    public function getImageUrlAttribute()
    {
        return isset($this->images) ?  $this->images[0]->url : 'landing/img/404-picture-not-found.jpg';
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
 


    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function sizes()
    {
        //return $this->belongsToMany(Size::class);
        return $this->hasMany(Size::class);
        
    }

    public function stores()
    {
        return $this->belongsToMany(Store::class)->withPivot('url');
        
    }

    public function ideals()
    {
        return $this->belongsToMany(Ideal::class);
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
