@extends('backend.layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
      @include('backend.partials.errormessage')
    <form action="{{ route('admin.divisions.update', $division->id) }}" method="post">
        @csrf

        <div class="form-group">
          <label>Name</label>
          <input type="text" name="name" class="form-control" value="{{ $division->name }}">
        </div>
        <div class="form-group">
            <label>Priority ID</label>
            <input type="text" name="priority_id" class="form-control" value="{{ $division->priority_id }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Division</button>
      </form>
 </div>
</div>
@endsection
