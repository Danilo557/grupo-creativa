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
}
