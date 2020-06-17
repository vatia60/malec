<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('backend.partials.header')

          <div class="test-body pt-5">
           <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('backend.partials.left-sidebar')
                </div>
                <div class="col-md-9">
                   @yield('content')
                </div>
            </div>
           </div>
          </div>


       @include('backend.partials.footer')
