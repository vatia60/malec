@extends('backend.layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
      @include('backend.partials.errormessage')
    <form action="{{ route('admin.brands.store') }}" method="post" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control">

        </div>

        <button type="submit" class="btn btn-primary">Add Category</button>
      </form>
 </div>
</div>
@endsection
