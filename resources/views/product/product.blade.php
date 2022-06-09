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


                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="row total_rate">
                                    <div class="col-6">
                                        <div class="box_total">
                                            <h5>التقييم الكلي</h5>
                                            <h4>4.0</h4>
                                            <h6>(03 Reviews)</h6>
                                        </div>
                                    </div>
                                    <div class="col-6">

                                    </div>
                                </div><!-- row total_rate-->
                                <div class="review_list">
                                    @foreach ($comments as $x)
                                        <div class="review_item">
                                            <div>
                                                {{-- Be like water. --}}
                                            </div>

                                            <div class="media">
                                                <div class="d-flex">
                                                    <img src="{{ asset('asset/img/product/single-product/review-3.png') }}"
                                                        alt="" />
                                                </div>
                                                <div class="media-body">
                                                    <h4>{{ $x->user()->get()[0]->name }}</h4>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <p>
                                                {{ $x->comment }}
                                            </p>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="review_box">
                                    <h4>Add a Review</h4>
                                    <p>Your Rating:</p>
                                    <ul class="list">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-star"></i>
                                            </a>
                                        </li>
                                    </ul>

                                    <form class="row contact_form"
                                        action="{{ route('comment', ['id' => $product->id]) }}" method="post"
                                        id="contactForm" novalidate="novalidate">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                                                <input type="hidden" name="id" value="{{ $product->id }}">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" value="submit" class="btn btn-success m-3">
                                                اضافة تعليق
                                            </button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
    {{abort(404)}}
    @endif
    @include('layouts.footer')
    {{-- @include('layouts.footer-scripts') --}}
@endsection
