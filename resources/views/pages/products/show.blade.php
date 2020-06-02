@extends('layouts.master')
@section('content')
 <div class="product-table">
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
            <th scope="col">Status</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
          <tr>
            <th scope="row">{{ $product->id }}</th>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>Image</td>
            <td>{{ $product->slug }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->status }}</td>
            <td><a href="">Edit</a> | <a href="">Delete</a></td>
          </tr>
        @endforeach
        </tbody>
      </table>
 </div>
@endsection
