@extends('backend.layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
      @include('backend.partials.errormessage')
    <form action="{{ route('admin.divisions.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label>Division Name</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Priority ID</label>
            <input type="text" name="priority_id" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Add Category</button>
      </form>
 </div>
</div>
@endsection
