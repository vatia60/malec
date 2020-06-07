@extends('backend.layouts.master')
@section('content')
<div class="card">
  <div class="card-body">
      @include('backend.partials.errormessage')
    <form action="{{ route('admin.districts.update', $district->id) }}" method="post">
        @csrf

        <div class="form-group">
          <label>District Name</label>
          <input type="text" name="name" class="form-control" value="{{ $district->name }}">
        </div>
        <div class="form-group">
            <label>Division</label>
        <select name="division_id" class="form-control">
            @foreach ($divisionse as $divi)
            <option value="{{ $divi->id }}" {{ $district->division->id == $divi->id ? 'selected' : '' }}>{{ $divi->name }}</option>
            @endforeach
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Update District</button>
      </form>
 </div>
</div>
@endsection
