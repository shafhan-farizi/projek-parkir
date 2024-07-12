<!DOCTYPE html>
<html lang="en" class="">
<head>
  @include('layouts_admin._header')
  @yield('data-table-css')
  @yield('style')
  <title>@yield('title') - Parking Campus</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

<div id="app">

@include('layouts_admin._navbar')

@include('layouts_admin._sidebar')

<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    @yield('breadcrumb')
  </div>
</section>

<section class="is-hero-bar">
    @yield('content')
</section>
@include('layouts_admin._footer')
</div>
@include('layouts_admin._scripts')
@yield('data-table-js')
@yield('other-script')
</body>
</html>
