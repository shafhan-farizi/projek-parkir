<!doctype html>
<html lang="en">

  <head>
    @include('layouts._header')
    @yield('style')
    <title>@yield('title') - Parking Campus</title>
  </head>

  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    @include('layouts._navbar')

    @yield('content')

    @include('layouts._footer')

    @include('layouts._scripts')

  </body>

</html>