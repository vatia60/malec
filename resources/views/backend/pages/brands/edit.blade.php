@extends('backend.layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
      @include('backend.partials.errormessage')
    <form action="{{ route('admin.brands.update', $brands_edit->id) }}" method="post"  enctype='multipart/form-data'>
        @csrf

        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="{{ $brands_edit->name }}">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10">{{ $brands_edit->description }}</textarea>
        </div>


        <div class="form-group">
            <label>Old image</label><br>
            <img src="{{ asset('images/brands/'. $brands_edit->image) }}" width="100"><br>
            <label>Image</label>
            <input type="file" name="image" class="form-control">

        </div>
        <button type="submit" class="btn btn-primary">Update Product</button>
      </form>
 </div>
</div>
@endsection
