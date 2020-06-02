<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body>
        @include('partials.header')

          <div class="test-body pt-5">
           <div class="container">
            <div class="row">
                <div class="col-md-3">
                    @include('admin.partials.left-sidebar')
                </div>
                <div class="col-md-9">
                   @yield('content')
                </div>
            </div>
           </div>
          </div>


       @include('partials.footer')
