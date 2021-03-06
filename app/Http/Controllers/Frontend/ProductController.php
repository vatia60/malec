<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index ()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('frontend.pages.products.index')->with('products', $products);
    }

    public function show ($slug)
    {
        $products = Product::where('slug', $slug)->first();

        return view('frontend.pages.products.show')->with('products', $products);
    }
}
