<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\FeatureImage;
use App\Models\Product;
use Image;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.products.index')->with('products', $products);
    }

    public function create()
    {
        return view('backend.pages.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
       ]);

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

        // if($request->hasFile('product_image')){
        //   $image = $request->file('product_image');
        //   $img = time(). '.' . $image->getClientOriginalExtension();
        //   $location = public_path('images/products/'.$img);
        //   Image::make($image)->save($location);

        //   $feature_image = new FeatureImage;
        //   $feature_image->product_id = $product->id;
        //   $feature_image->image = $img;
        //   $feature_image->save();
        // }

        if(count($request->product_image)>0)
        {
            foreach ($request->product_image as $image) {
                $img = time(). '.' . $image->getClientOriginalExtension();
                $location = public_path('images/products/'.$img);
                Image::make($image)->save($location);

                $feature_image = new FeatureImage;
                $feature_image->product_id = $product->id;
                $feature_image->image = $img;
                $feature_image->save();
            }

        }



        return redirect()->route('admin.products.create');

    }

    public function edit($id)
    {
        $products_edit = Product::find($id);
        return view('backend.pages.products.edit')->with('products_edit', $products_edit);
    }

    public function update(Request $request, $id )
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
       ]);

        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();




        return redirect()->route('admin.products.index');

    }

    public function delete($id)
    {
        $product = Product::find($id);
        if(!is_null($product)){
            $product->delete();
        }
        session()->flash('message', 'Product Delete Successfully');
        session()->flash('type', 'success');
        return redirect()->back();

    }
}
