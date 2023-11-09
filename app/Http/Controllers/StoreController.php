<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        return view('store.index');
    }

    public function brands(Brand $brand)
    {
        return view('store.brand',compact('brand'));
    }
    
    public function we(){
        return view('store.we');
    }

    public function distributor(){
        return view('store.distributor');
    }

    public function tips(){
        return view('store.tips');
    }
}
