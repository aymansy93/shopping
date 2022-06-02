<header class="header_area">

    <div class="main_menu">
      <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand logo_h" href="{{route('products')}}">
                    <img src="{{asset('asset/img/logo.png')}}" alt="" />
                  </a>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('products')}}">الرئيسية</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('products','#pro')}}">المنتجات</a>
                  </li>
                  
                  
                  
                  

                </ul>
                <div class="col-lg-5 pr-0">
                    <ul class="nav navbar-nav navbar-right right_nav pull-right">


                      @livewire('cartcounter')

                      <div class="btn-group">
                        <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="ti-user" aria-hidden="true"></i>
                        </button>

                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item btn btn-success" href="{{route('profil')}}">الملف الشخصي</a></li>
                          <li>
                            <form class="dropdown-item" href="#"
                            action="/logout" method="post">@csrf 
                            <button class="btn btn-danger" type="submit" > تسجيل الخروج</button>
                          </form></li>
                        </ul>
                      </div>

                      

                      <li class="nav-item">
                        <a href="#" class="icons">
                          <i class="ti-heart" aria-hidden="true"></i>
                        </a>
                      </li>
                    </ul>
                  </div>

                <form class="d-flex p-4">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </div>
          </nav>
          
            
      </div>
    </div><br><br>
  </header>
