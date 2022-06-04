
<!--================ Feature Product Area =================-->
<section class="feature_product_area section_gap_bottom_custom" id="prodect">
    <div class="container">
      @if (session('success'))
            <h6 class="alert alert-info">
              {{session("success")}}</h6>

      @endif
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="main_title"><br><br>
            <h2><span>افضل المنتجات</span></h2>
            <p>تسوق الان مع افضل المنتجات</p>
            <p>نسعى لكي نكون الافضل</p>
          </div>
        </div>
      </div>


      <div class="row">
        

        @foreach ($products as $product)
        <div class="col-lg-4 col-md-6" id="pro">
          <div class="single-product">
            <div class="product-img">
                {{-- {{asset('asset/img/product/feature-product/f-p-1.jpg')}} --}}
              <img class="img-fluid w-100" src="{{route('products') . "/storage/product/$product->type_products" . "/" . $product->image_path }}" alt="{{$product->image_path}}" />
              <div class="p_icon">
                <a href="/{{$product->id}}" class="text-decoration-none">
                  <i class="ti-eye"></i>
                </a>
                
                
                <a href="{{route('like',[$product->id])}}" class="text-decoration-none">
                  <i class='bx bxs-heart bx-rotate-90 bx-tada' style='color:#d40c72'>2</i>
                </a>
                <a href="{{route('dislike',[$product->id])}}" class="text-decoration-none">
                  <i class='bx bx-heart bx-flip-horizontal' style='color:rgba(12,10,11,0.94)' >0</i>
                </a>
                  
                  
                <a href="{{route('add.to.cart',[$product->id])}}" class="text-decoration-none">
                  <i class="ti-shopping-cart"></i>
                </a>
              </div>
            </div>
            <div class="product-btm">
              <a href="/{{$product->id}}" class="d-block">
                <h4>{{$product->name}}</h4>
              </a>
              <div class="mt-3">
                <span class="mr-4">${{$product->price}}</span>
                <del>$35.00</del>
              </div>
            </div>
          </div>
        </div>
    @endforeach
      </div>
    </div>
</section>
  <!--================ End Feature Product Area =================-->


  <!--================ New Product Area =================-->


  <!--================ End New Product Area =================-->

  <!--================ Inspired Product Area =================-->
