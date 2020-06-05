<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index ($id)
    {
        $category = Category::find($id);

        if(!is_null($category)){
          return view('frontend.pages.categories.index', compact('category'));
        }else {
            return redirect()-> back();
        }
    }
}
