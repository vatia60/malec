@extends('backend.layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
      @include('backend.partials.errormessage')
    <form action="{{ route('admin.products.update', $products_edit->id) }}" method="post">
        @csrf

        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control" value="{{ $products_edit->title }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $products_edit->description }}</textarea>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control" value="{{ $products_edit->price }}">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $products_edit->quantity }}">
        </div>
        <div class="form-group">
            <label>Category</label>
             <select name="category_id" class="form-control">
               <option value="">Select Category</option>

               @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $item)

               <option value="{{ $item->id }}" {{ $item->id == $products_edit->category->id ? 'selected' : '' }}>{{ $item->name }}</option>

               @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $item->id)->get() as $childitem)

               <option value="{{ $childitem->id }}"  {{ $childitem->id == $products_edit->category->id ? 'selected' : '' }}>----->{{ $childitem->name }}</option>

               @endforeach

               @endforeach
             </select>
           </div>
           <div class="form-group">
               <label>Brand</label>
             <select name="brand_id" class="form-control">

               <option value="">Select Brand</option>

               @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brandname)

               <option value="{{ $brandname->id }}" {{ $brandname->id == $products_edit->brand->id ? 'selected' : '' }}>{{ $brandname->name }}</option>

               @endforeach
             </select>
           </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
      </form>
 </div>
</div>
@endsection
