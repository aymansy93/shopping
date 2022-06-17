@extends('layouts.master')
@section('title')
    {{ $product->name }}
@endsection
@section('contant')
    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    @if (session('success'))
                        <h6 class="alert alert-info">
                            {{ session('success') }}</h6>
                    @endif
                    <div class="s_product_img">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <img src="{{ route('products') . "/storage/product/$product->type_products" . '/' . $product->image_path }}"
                                alt="{{ $product->image_path }}" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        <h2>${{ $product->price }}</h2>
                        <ul class="list">
                            <li>
                                <a class="active" href="#">
                                    <span>Category</span> {{ $product->type_products }}</a>
                            </li>
                            <li>
                                <a href="#"> <span>Availibility</span> : In Stock</a>
                            </li>
                        </ul>
                        <p>
                            {{ $product->title }}
                        </p>
                        <div class="product_count">
                            {{-- ////////////////////////////////////////////////////////////////// --}}

                            <form action="{{ route('add.to.cart', ['id' => $product->id]) }}" method="get">
                                @csrf
                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="title" value="{{ $product->title }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">




                        </div>
                        <div class="card_area">
                            <input class="main_btn" type="submit" name="add" value="Add to Card">
                            {{-- <a  href="{{route('products.cart',['id'=>$product->id])}}">Add to Cart</a> --}}
                        </div>


                        </form>




                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    @if ($product->id)
        <section class="product_description_area">
            <div class="container">
                

                @include('product.comments')
            </div>
        </section>
    @else
    {{abort(404)}}
    @endif
    @include('layouts.footer')
    {{-- @include('layouts.footer-scripts') --}}
@endsection
