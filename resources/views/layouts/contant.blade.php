<!--================ Feature Product Area =================-->
<section class="feature_product_area section_gap_bottom_custom" id="prodect">
    <div class="container">
        @if (session('success'))
            <h6 class="alert alert-info">
                {{ session('success') }}</h6>
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
        <div class="">
          <div class="col-4">
            <div class="form-group">
                <p class="fw-bolder fs-4 text">
                    <i class='bx bx-sort-alt-2 bx-rotate-90 bx-fade-down' style='color:#ef0000'></i> فرز المنتجات
                </p>
                    <form id="form" action="{{route('products')}}" method="get">
                      @if (isset($GET['type']))
                      <script type="text/javascript">
                        document.getElementById('form').submit(); // SUBMIT FORM
                      </script>
                      @endif
                      
                      @csrf
                        <h5  class="row">اختر صنف</h5>
                        <select name="type" onchange="this.form.submit();">
                          <h5 class="" > <option value="">جميع المنتجات</option><br></h5>


                        @foreach ($type as $row)

                      <h5 class="" > <option value="{{$row->type_product}}">{{$row->type_product}}</option><br></h5>
                      
                        @endforeach
                      </select>
                      </ul>
                    </form>
            </div>
        </div>
        
        </div>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-lg-4 col-md-6" id="pro">
                    <div class="single-product">
                        <div class="product-img">
                            {{-- {{asset('asset/img/product/feature-product/f-p-1.jpg')}} --}}
                            <img class="img-fluid w-100"
                                src="{{ route('products') . "/storage/product/$product->type_products" . '/' . $product->image_path }}"
                                alt="{{ $product->image_path }}" />
                            <div class="p_icon">
                                <a href="/{{ $product->id }}" class="text-decoration-none">
                                    <i class="ti-eye"></i>
                                </a>
                                @php
                                    $like = 0;
                                    $dislike = 0;
                                    $like_status = 'bx bx-heart';
                                    $dislike_status = 'bx bx-heart';
                                    
                                @endphp
                                @foreach ($likes as $l)
                                    @php
                                        
                                        if ($l->like == 1 && $l->product_id == $product->id) {
                                            $like++;
                                        }
                                        if ($l->like == 0 && $l->product_id == $product->id) {
                                            $dislike++;
                                        }
                                        if (Auth::check()) {
                                            // dd($l->like == '1' && $l->product_id == $product->id);
                                        
                                            if ($l->like == 1 && $l->user_id == Auth::user()->id && $l->product_id == $product->id) {
                                                $like_status = 'bx bxs-heart bx-rotate-90 bx-tada ';
                                            }
                                            if ($l->like == 0 && $l->user_id == Auth::user()->id && $l->product_id == $product->id) {
                                                $dislike_status = 'bx bxs-heart bx-flip-horizontal ';
                                            }
                                        }
                                    @endphp
                                @endforeach
                                {{-- @livewire('like') --}}
                                <a href="{{ route('like', [$product->id]) }}" class="text-decoration-none">
                                    <i class="{{ $like_status }}" style='color:#d40c72'>{{ $like }}</i>

                                </a>
                                <a href="{{ route('dislike', [$product->id]) }}" class="text-decoration-none">
                                    <i class="{{ $dislike_status }}"
                                        style='color:rgba(12,10,11,0.94)'>{{ $dislike }}</i>
                                </a>







                                <a href="{{ route('add.to.cart', [$product->id]) }}" class="text-decoration-none">
                                    <i class="ti-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="product-btm">
                            <a href="/{{ $product->id }}" class="d-block">
                                <h4>{{ $product->name }}</h4>
                            </a>
                            <div class="mt-3">
                                <span class="mr-4">${{ $product->price }}</span>
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
