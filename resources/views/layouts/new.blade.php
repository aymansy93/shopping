<!DOCTYPE html>
<html lang="en">

<head>
    @section('title')
    الرئيسية
    @endsection
    @include('layouts.head')

</head>

<body>

    <!--================Header Menu Area =================-->
    @include('layouts.main-headerbar')
    <!--================Header Menu Area =================-->
    {{-- @include('layouts.homebanner') --}}
  <!--================Home Banner Area =================-->


  <!--================End Home Banner Area =================-->


  {{-- @include('layouts.app') --}}

  <!--================ End Blog Area =================-->

  @include('layouts.footer')
  @include('layouts.footer-scripts')
</body>

</html>
