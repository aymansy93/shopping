<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    @yield('css-footer')
    @include('layouts.head')
    
    @yield('css')


</head>

<body>

    <!--================Header Menu Area =================-->
    @include('layouts.main-headerbar')
    <!--================Header Menu Area =================-->

    @yield('homebanner')
  <!--================Home Banner Area =================-->


  <!--================contant =================-->
    @yield('contant')
    @yield('sidebar')



  <!--================ End Blog Area =================-->

  {{-- @include('layouts.footer') --}}
  @yield('footer')
  @include('layouts.footer-scripts')
  @yield('script-cart')
</body>

</html>
