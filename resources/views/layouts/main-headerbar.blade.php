<header class="header_area">

    <div class="main_menu">
        <div class="container">
            <div class="alert alert-primary" role="alert">
                admin account : a@admin.com | 12345678
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbarToggleExternalContent">
                <div class="container-fluid">
                    <a class="navbar-brand logo_h" href="{{ route('products') }}">
                        <img src="{{ asset('asset/img/logo.png') }}" alt="" />
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse offset w-100" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" 
                                    href="{{ route('products') }}">الرئيسية</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" 
                                    href="{{ route('products', '#pro') }}">المنتجات</a>
                            </li>





                        </ul>
                        <div class="col-lg-5 pr-0">
                            <ul class="nav navbar-nav navbar-right right_nav pull-right">


                                @livewire('cartcounter')

                                <div class="btn-group">
                                    <button type="button" class="btn" data-bs-toggle="dropdown"
                                    role="button" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="ti-user" aria-hidden="true"></i>
                                    </button>

                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item btn btn-success" href="{{ route('profil') }}">الملف
                                                الشخصي</a></li>
                                        <li>
                                            @if (Auth::check())
                                            <form class="dropdown-item" href="#" action="/logout" method="post">@csrf
                                                <button class="btn btn-danger" type="submit"> تسجيل الخروج</button>
                                            </form>
                                            @endif
                                            @if (!Auth::check())
                                            <a href="{{route('login')}}" class="btn btn-danger">تسجيل الدخول</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>



                                <li class="nav-item">
                                    <a href="#" class="icons">
                                        <i class="ti-heart" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <form action="{{route('search')}}" method="get" class="d-flex p-4">
                            @csrf
                            <input class="form-control me-2" type="search" name="q" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>


        </div>
    </div><br><br>
</header>
