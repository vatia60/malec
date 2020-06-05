@extends('frontend.layouts.master')
@section('content')
<h2>Category Name: {{ $category->name }}</h2>
<div class="row">

    @php $products = $category->product()->paginate(9)  @endphp

    @if($products->count() > 0)

    @foreach ($products as $product)

    <div class="col-md-4">
     <div class="card">

    @php $i = 1;  @endphp

    @foreach ($product->images as $image)

    @if( $i > 0 )

    <a href="{{ route('products.show', $product->slug) }}"><img class="card-img-top" src="{{ asset('images/products/'. $image->image) }}" alt="Card image cap"></a>

    @endif

    @php $i--;  @endphp

    @endforeach

      <div class="card-body">
        <h5 class="card-title"><a href="{{ route('products.show', $product->slug) }}">{{ $product->title }}</a></h5>
        <p class="card-text">{{ $product->description }}</p>
        <p class="card-text">{{ $product->price }}</p>
        <a href="#" class="btn btn-primary">Add To Cart</a>
     </div>
     </div>
    </div>

   @endforeach

</div>
@else
   <div class="alert alert-danger">
   <p>No product this category</p>
   </div>
   @endif
<div class="pt-5">
    {{ $products->links() }}
</div>
@endsection
