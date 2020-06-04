<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
use File;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'desc')->get();

        return view('backend.pages.brands.index')->with('brands', $brands);
    }

    public function create()
    {


        return view('backend.pages.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
       ]);

        $brand = new Brand;

        $brand->name = $request->name;
        $brand->description = $request->description;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$img);
            Image::make($image)->save($location);
            $brand->image = $img;
          }

        $brand->save();

        session()->flash('message', 'brand created Successfully');
        session()->flash('type', 'success');

        return redirect()->route('admin.brands.create');

    }

    public function edit($id)
    {

        $brands_edit = brand::find($id);
        return view('backend.pages.brands.edit', compact('brands_edit'));
    }

    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => 'required',
       ]);

        $brand = brand::find($id);

        $brand->name = $request->name;
        $brand->description = $request->description;

        if(count([$request->image]) > 0 ){

            if(File::exists('images/brands/'.$brand->image)){
               File::delete('images/brands/'.$brand->image);
            }

            $image = $request->file('image');
            $img = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/brands/'.$img);
            Image::make($image)->save($location);
            $brand->image = $img;
          }

        $brand->save();



        session()->flash('message', 'brand Updated Successfully');
        session()->flash('type', 'success');

        return redirect()->route('admin.brands.index');

    }

    public function delete($id)
    {

        $brand = Brand::find($id);


        if(!is_null($brand)){
            if(File::exists('images/brands/'.$brand->image)){
                File::delete('images/brands/'.$brand->image);
             }

            $brand->delete();
    }
        session()->flash('message', 'Brand Delete Successfully');
        session()->flash('type', 'success');

        return redirect()->back();
    }
}
