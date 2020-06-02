@extends('admin.layouts.master')
@section('content')
<div class="product-table">
    @include('admin.partials.errormessage')
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Slug</th>
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @php $i = 1; @endphp
        @foreach ($products as $product)
          <tr>
            <th scope="row">{{ $i++ }}</th>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>Image</td>
            <td>{{ $product->slug }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('admin.products.edit', $product->id) }}">Edit</a> |
                <a href="#deletemodal" data-toggle="modal">Delete</a>

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <form action="{{ route('admin.products.delete', $product->id) }}" method="post">
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
