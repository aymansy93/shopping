<div class="d-flex flex-column">

    <div class="profile">
      <img src="{{asset('images/profil/images/images.png')}}" alt="" class="img-fluid rounded-circle">
      <h1 class="text-light"><a href="#">{{Auth::user()->name}}</a></h1>
      {{-- <div class="social-links mt-3 text-center">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> --}}
    </div>

    <nav class="nav-menu">
      <ul>
        @if (Auth::user()->role == 1 )
        <li class="active"><a href="{{route('admin.index')}}"><i class="bx bx-home"></i> <span>الصفحة الرئيسية</span></a></li>
        <li class="active"><a href="{{route('typeproduct')}}"><i class='bx bx-add-to-queue' ></i> <span>اضافة نوع منتج جديد</span></a></li>
        <li><a href="{{route('admin.create')}}"><i class='bx bx-add-to-queue' ></i><span>اضافة منتج جديد</span></a></li>
        <li><a href="{{route('admin.order')}}"><i class="bx bx-file-blank"></i> <span>الطلبات</span></a></li>
        <li><a href="#portfolio"><i class="bx bx-user"></i> المستخدمين</a></li>
        <li><a href="#portfolio"><i class='bx bxs-image'></i> الصور</a></li>
        @else
        <li class="active"><a href="{{route('profil')}}"><i class="bx bx-home"></i> <span>الصفحة الرئيسية</span></a></li>
        <li class="active"><a href="{{route('myorder')}}"><i class='bx bx-receipt'></i> <span> مشترياتي</span></a></li>
        @endif

      </ul>
    </nav><!-- .nav-menu -->
    <button type="button" class="mobile-nav-toggle d-xl-none"><i class="icofont-navigation-menu"></i></button>
    

  </div>