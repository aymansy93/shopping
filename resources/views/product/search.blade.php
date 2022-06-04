@extends('layouts.master')
@section('contant')
    <div class="container">
        <div class="row">

            @if ($products->count())
                @foreach ($products as $product)
                    <div class="col-lg-6 col-md-6" id="pro">
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

                                    <a href="{{ route('like', [$product->id]) }}" class="text-decoration-none">
                                        <i class='bx bxs-heart bx-rotate-90 bx-tada' style='color:#d40c72'>2</i>
                                    </a>
                                    <a href="{{ route('dislike', [$product->id]) }}" class="text-decoration-none">
                                        <i class='bx bx-heart bx-flip-horizontal' style='color:rgba(12,10,11,0.94)'>0</i>
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
            @else
                    <img src="{{asset('images/search.png')}}" height="350px" alt="">
                    <h3 class="alert alert-info">لايوجد منتجات بهذا الاسم </h3>
                    <a class="text-decoration-none fs-3 text" href="{{route('products')}}">يمكنك العثور على منتجات اخرى من هنا</a>
            @endif
        </div>
    </div>


@endsection
