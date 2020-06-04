<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use Image;
use File;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('backend.pages.categories.index')->with('categories', $categories);
    }

    public function create()
    {
        $main_categories = Category::orderBy('id', 'desc')->where('parent_id', NULL)->get();

        return view('backend.pages.categories.create', compact('main_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
       ]);

        $category = new Category;

        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        if($request->hasFile('image')){
            $image = $request->file('image');
            $img = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/'.$img);
            Image::make($image)->save($location);
            $category->image = $img;
          }

        $category->save();

        session()->flash('message', 'Category created Successfully');
        session()->flash('type', 'success');

        return redirect()->route('admin.categories.create');

    }

    public function edit($id)
    {
        $main_categories = Category::orderBy('id', 'desc')->where('parent_id', NULL)->get();
        $categories_edit = Category::find($id);
        return view('backend.pages.categories.edit', compact('categories_edit','main_categories'));
    }

    public function update(Request $request, $id )
    {
        $request->validate([
            'name' => 'required',
       ]);

        $category = Category::find($id);

        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;

        if(count([$request->image]) > 0 ){

            if(File::exists('images/categories/'.$category->image)){
               File::delete('images/categories/'.$category->image);
            }

            $image = $request->file('image');
            $img = time(). '.' . $image->getClientOriginalExtension();
            $location = public_path('images/categories/'.$img);
            Image::make($image)->save($location);
            $category->image = $img;
          }

        $category->save();



        session()->flash('message', 'Category Updated Successfully');
        session()->flash('type', 'success');

        return redirect()->route('admin.categories.index');

    }

    public function delete($id)
    {

        $category = Category::find($id);
        if(File::exists('images/categories/'.$category->image)){
            File::delete('images/categories/'.$category->image);
         }

        $category->delete();

        if(!is_null($category)){

           if($category->parent_id == NULL){

                $sub_categories = Category::orderBy('id', 'desc')->where('parent_id', $category->id)->get();

                    foreach($sub_categories as $sub){

                    if(File::exists('images/categories/'.$sub->image))
                    {
                        File::delete('images/categories/'.$sub->image);
                    }

                    $sub->delete();

                    }


        }





    }
        session()->flash('message', 'Category Delete Successfully');
        session()->flash('type', 'success');

        return redirect()->back();
    }
}
