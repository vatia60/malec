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

        <button type="submit" class="btn btn-primary">Update Product</button>
      </form>
 </div>
</div>
@endsection
