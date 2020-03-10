<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <title>@yield('title')</title>
  
  @stack('prepend-style')
  @include('includes.auth.style')
  @stack('addon-style')

</head>

<body>

@yield('content')

@stack('prepend-script')
@include('includes.auth.script')
@stack('addon-script')

</body>

</html>