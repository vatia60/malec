@extends('backend.layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
      @include('backend.partials.errormessage')
    <form action="{{ route('admin.products.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
          <label>Title</label>
          <input type="text" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label>Price</label>
            <input type="number" name="price" class="form-control">
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control">
        </div>
        <div class="form-group">
         <label>Category</label>
          <select name="category_id" class="form-control">
            <option value="">Select Category</option>

            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $item)

            <option value="{{ $item->id }}">{{ $item->name }}</option>

            @foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $item->id)->get() as $childitem)

            <option value="{{ $childitem->id }}">----->{{ $childitem->name }}</option>

            @endforeach

            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label>Brand</label>
          <select name="brand_id" class="form-control">

            <option value="">Select Brand</option>

            @foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brand)

            <option value="{{ $brand->id }}">{{ $brand->name }}</option>

            @endforeach
          </select>
        </div>
        <div class="form-group">
            <label>Image</label>
            <div class="row">
                <div class="col-md-4"><input type="file" name="product_image[]" class="form-control"></div>
                <div class="col-md-4"><input type="file" name="product_image[]" class="form-control"></div>
                <div class="col-md-4"><input type="file" name="product_image[]" class="form-control"></div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Add Product</button>
      </form>
 </div>
</div>
@endsection
