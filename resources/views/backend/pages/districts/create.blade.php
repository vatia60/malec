@extends('backend.layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
      @include('backend.partials.errormessage')
    <form action="{{ route('admin.districts.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label>District Name</label>
          <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>Division</label>
        <select name="division_id" class="form-control">
            <option value="">Please select a division</option>
            @foreach ($divisionse as $divi)
            <option value="{{ $divi->id }}" id="">{{ $divi->name }}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Districts</button>
      </form>
 </div>
</div>
@endsection
