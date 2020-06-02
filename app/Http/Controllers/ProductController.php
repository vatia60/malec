<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index ()
    {
        $data = [];
        $data['products'] = Product::orderBy('id', 'desc')->get();
        return view('pages.products.index', $data);
        
        return view('pages.products.index', compact('products'));
        return view('pages.products.index')->with('products', $products);
    }
}
