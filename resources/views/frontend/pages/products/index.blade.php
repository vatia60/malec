@extends('frontend.layouts.master')
@section('content')
<div class="row">
    @foreach ($products as $product)
        <div class="col-md-4">
        <div class="card">

            @php $i = 1; @endphp

            @foreach ($product->images as $image)

                @if ($i > 0)

                <img class="card-img-top" src="{{ asset('images/products/'. $image->image) }}" alt="Card image cap">

                @endif

                @php $i--; @endphp

            @endforeach

            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="card-text">{{ $product->description }}</p>
                <p class="card-text">BDT: {{ $product->price }}</p>
                <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
        </div>

    @endforeach

</div>
@endsection
