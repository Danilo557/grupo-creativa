<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use App\Models\Store;
use Livewire\Component;

class ProductStore extends Component
{
    public $product, $store_id, $url, $stores = [], $stores_list;

    protected $listeners = ['refreshStoreProduct' => 'refreshStoreProduct'];

    public function mount(Product $product)
    {
        $this->stores = Store::with('image')->get();
        $this->product = $product;
        $this->stores_list = $product->stores;
        $this->store_id = "";
    }
    public function deleteStore($store)
    {
        $st = new Store();
        $st->forceFill($store);
        
        $this->product->stores()->detach($st->id);
        $this->refreshStoreProduct();
    }
    public function refreshStoreProduct()
    {
        $this->reset(['url', 'store_id']);
        $this->product = $this->product->fresh();
        $this->stores_list = $this->product->stores;
    }

    public function render()
    {
        return view('livewire.admin.product-store');
    }

    protected function rules()
    {
        return [
            'store_id' => 'required',
            'url' => 'required|url',
            'stores_list' => 'array',
            'stores_list.*' => 'required|stores_unique'
        ];
    }

    public function add()
    {
        $rules = $this->rules();
        $this->validate($rules);

        $this->product->stores()->attach([
            $this->store_id => ['url' => $this->url],
        ]);


        $this->refreshStoreProduct();
    }
}
