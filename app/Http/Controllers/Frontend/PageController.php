<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(1);

        return view('frontend.pages.index', compact('products'));
    }

    public function search(Request $request)
    {
        $search = $request->search;

        $product_search = Product::orWhere('title', 'like', '%'. $search . '%')
        ->orWhere('price', 'like', '%'. $search . '%')
        ->orWhere('quantity', 'like', '%'. $search . '%')
        ->orWhere('description', 'like', '%'. $search . '%')
        ->orderBy('id', 'desc')->paginate(1);

        return view('frontend.pages.search', compact('search','product_search'));
    }
}
