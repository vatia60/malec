@extends('frontend.layouts.master')
@section('title')
{{ $products->title }} - Ecommerce
@endsection
@section('content')
 <div class="container">
     <div class="row">

         <div class="col-md-6">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

            @php $i = 1;  @endphp

            @foreach ($products->images as $image)

                  <div class="carousel-item active">
                    <img class="card-img-top" src="{{ asset('images/products/'. $image->image) }}" alt="Card image cap">
                  </div>

            @php $i++;  @endphp

            @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
         </div>
         <div class="col-md-6">
             <div class="card">

              <div class="card-body">
                <h5 class="card-title">{{ $products->title }}</h5>
                <p class="card-text">{{ $products->description }}</p>
                <p class="card-text">{{ $products->price }}</p>
                <p class="card-text">{{ $products->quantity < 1 ? 'No Item' : $products->quantity .' - '.'Item in stock' }}</p>
                <a href="#" class="btn btn-primary">Add To Cart</a>
             </div>
             </div>


         </div>
     </div>

 </div>
@endsection
