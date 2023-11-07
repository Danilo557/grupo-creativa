<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use WireUi\Traits\Actions;

class UpdateProduct extends Component
{   
    use Actions;

    public $product;
    public $name, $slug, $description, $brand_id, $category_id, $status;
    public  $features, $ideals, $colors, $materials ;

    protected $listeners = ['refreshProduct' => 'refreshProduct'];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->name = $this->product->name;
        $this->slug = $this->product->slug;
        $this->brand_id = $this->product->brand_id;
        $this->category_id = $this->product->category_id;
        $this->status=$this->product->status;

        
        $this->features=$this->product->features->pluck('id')->toArray();
        $this->ideals=$this->product->ideals->pluck('id')->toArray();
        $this->colors=$this->product->colors->pluck('id')->toArray();
        $this->materials=$this->product->materials->pluck('id')->toArray();
        
    }

     

    protected function rules()
    {
        return [
            'name' => 'required',
            'slug' => 'required|max:255|unique:products,slug,' . $this->product->id,
            'brand_id' => 'required',
            'category_id' => 'required',
             
        ];
    }

    public function deleteImage(Image $image)
    {
        Storage::delete([$image->url]);
        $image->delete();

        $this->product = $this->product->fresh();
    }
    public function refreshProduct()
    {
        $this->product = $this->product->fresh();
    }



    public function render()
    {
        return view('livewire.admin.update-product')->layout('layouts.admin');
    }

    public function updateproduct(){

        $this->slug = Str::slug($this->name);
        
        $rules=$this->rules();
        $this->validate($rules);

         

        $this->product->features()->sync($this->features) ;
        $this->product->ideals()->sync($this->ideals);
        $this->product->colors()->sync($this->colors);
        $this->product->materials()->sync($this->materials);

        $this->product->name= $this->name ;
        $this->product->slug= $this->slug ;
        $this->product->brand_id= $this->brand_id ;
        $this->product->category_id= $this->category_id ;
        $this->product->status=$this->status;

        $this->product->save();

        

        $this->dialog()->success(
            $title = 'Profile saved',
            $description = 'Your profile was successfully saved'

        );
        
        $this->refreshProduct();
        
        
    }

     
}
