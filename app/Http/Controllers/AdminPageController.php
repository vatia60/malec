<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\FeatureImage;
use App\Product;
use Image;

class AdminPageController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function products_index()
    {
        return view('admin.pages.products.index');
    }

    public function products_create()
    {
        return view('admin.pages.products.create');
    }

    public function products_store(Request $request)
    {
        $product = new Product;

        $product->title = $request->title;
        $product->slug = Str::slug($request->title);
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;

        $product->category_id = 1;
        $product->parent_id = 1;
        $product->admin_id = 1;
        $product->save();

        if($request->hasFile('product_image')){
          $image = $request->file('product_image');
          $img = time(). '.' . $image->getClientOriginalExtension();
          $location = public_path('images/products/'.$img);
          Image::make($image)->save($location);

          $feature_image = new FeatureImage;
          $feature_image->product_id = $product->id;
          $feature_image->image = $img;
          $feature_image->save();
        }

        return redirect()->route('admin.products.create');

    }
}
