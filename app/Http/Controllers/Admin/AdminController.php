<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Feature;
use App\Models\Ideal;
use App\Models\Material;
use App\Models\Message;
use App\Models\Product;
use App\Models\Size;
use App\Models\Store;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function colors()
    {
        return view('admin.colors.index');
    }

    public function brands()
    {
        return view('admin.brands.index');
    }

    public function units()
    {
        return view('admin.units.index');
    }

    public function stores()
    {
        return view('admin.stores.index');
    }

    public function categories()
    {
        return view('admin.categories.index');
    }

    public function products()
    {
        return view('admin.products.index');
    }

    public function ideals()
    {
        return view('admin.ideals.index');
    }

    public function messages()
    {
        return view('admin.messages.index');
    }

    public function messages_show(Message $message)
    {
        
        return view('admin.messages.show',compact('message'));
    }

    public function brandselect(Request $request)
    {
        $search = $request->search;
        return Brand::where('name', 'like', "%{$search}%")
            ->when($request->selected, function ($query, $selected) {
                $query->whereIn('id', $selected)->limit(10);
            })
            ->get();
    }

    public function storesselect(Request $request)
    {
        $search = $request->search;
        return Store::with('image')->where('name', 'like', "%{$search}%")
            ->when($request->selected, function ($query, $selected) {
                $query->whereIn('id', $selected)->limit(10);
            })
            ->get();
    }

    public function categoryselect(Request $request)
    {

        $search = $request->search;
        return Category::where('name', 'like', "%{$search}%")
            ->when($request->selected, function ($query, $selected) {
                $query->whereIn('id', $selected)->limit(10);
            })
            ->get();
    }

    public function featuresselect(Request $request)
    {
        return Feature::when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
            ->when($request->selected, function ($query, $selected) {
                $query->whereIn('id', $selected)->limit(10);
            })
            ->get();
    }

    public function colorsselect(Request $request)
    {
        return Color::when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
            ->when($request->selected, function ($query, $selected) {
                $query->whereIn('id', $selected)->limit(10);
            })
            ->get();
    }

    public function materialsselect(Request $request)
    {
        return Material::when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
            ->when($request->selected, function ($query, $selected) {
                $query->whereIn('id', $selected)->limit(10);
            })
            ->get();
    }

    public function idealsselect(Request $request)
    {
        return Ideal::when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
            ->when($request->selected, function ($query, $selected) {
                $query->whereIn('id', $selected)->limit(10);
            })
            ->get();
    }


    public function unitsselect(Request $request)
    {   
        return Unit::when($request->search, function ($query, $search) {
            $query->where('name', 'like', "%{$search}%");
        })
            ->when($request->selected, function ($query, $selected) {
                $query->whereIn('id', $selected)->limit(10);
            })
            ->get();
    }

    public function files(Product $product, Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $url = Storage::put('products', $request->file('file'));

        $product->images()->create([
            'url' => $url
        ]);
    }
}
