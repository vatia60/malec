@extends('backend.layouts.master')
@section('content')
<div class="product-table">
    @include('backend.partials.errormessage')
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Division Name</th>
            <th scope="col">Priority ID</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
        @foreach ($divisions as $division)
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $division->name }}</td>
            <td>{{ $division->priority_id }}</td>
            <td>
                <a href="{{ route('admin.divisions.edit', $division->id) }}">Edit</a> |
                <a href="#deletemodal{{ $division->id }}" data-toggle="modal">Delete</a>

<div class="modal fade" id="deletemodal{{ $division->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you want to delete this product
        </div>
        <div class="modal-footer">
        <form action="{{ route('admin.divisions.delete', $division->id) }}" method="post">
            @csrf
         <button type="submit" class="btn btn-primary">Delete</button>
        </form>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        </div>
      </div>
    </div>
  </div>
</td>
  <!-- Modal -->

          </tr>
        @endforeach
        </tbody>
      </table>
 </div>
@endsection
