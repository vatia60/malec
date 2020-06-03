@extends('backend.layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
      @include('backend.partials.errormessage')
    <form action="{{ route('admin.categories.store') }}" method="post" enctype='multipart/form-data'>
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
            <label>Parent Category</label>
            <select name="parent_id" class="form-control">
                <option value="">Please select a category</option>
                @foreach ($main_categories as $category)
               <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
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
