<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title-profil')</title>
    @include('admin.head')
</head>
<body>
    <div class="container-fluid">
        @include('layouts.master')
    </div>
    

    <header id="header">
    @include('admin.sidebar')
  </header><!-- End Header -->
  <main id="main">
      @yield('index')
  </main>
</body>
</html>