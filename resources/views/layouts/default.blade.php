<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Web 应用') - Laravel学习</title>
  <link rel="stylesheet" href="{{ mix('css/app.css') }}"></link>
</head>
<body>
  @include('layouts._header')
  <div class="container">
     <div class="offset-md-1 col-md-8">
        @include('shared._messages')
        @yield('content')
        @include('layouts._footer')
    </div>
  </div>
  </body>
</html>
