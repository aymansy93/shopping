@extends('layouts.master')
@section('title')
    الدفع
@endsection

@section('contant')
    @if (session('success'))
        <h6 class="alert alert-info">
            {{ session('success') }}</h6>
    @endif
    @if ($errors->all())
                                <div class="alert alert-info">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
    @endif

    <section class="checkout_area section_gap">
        <div class="container">

            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>تفاصيل الفاتورة</h3>
                        <form class="row contact_form" action="{{ route('checkout.payment') }}" method="post"
                            novalidate="novalidate">
                            <input type="hidden" name="total" value="{{ Cart::initial() }}">
                            <input type="hidden" name="count" value="{{ Cart::content()->count() }}">
                            @csrf
                            <div class="form-group p_star">
                                <label for="ccnum"> card name</label>
                                <input type="text" class="form-control" id="cart" name="cardname"
                                    placeholder="name name">
                            </div>
                            <div class="form-group p_star">
                                <label for="ccnum">Credit card number</label>
                                <input type="text" class="form-control" id="cart" name="cardnumber"
                                    placeholder="1111-2222-3333-4444">
                            </div>
                            <div class="form-group p_star">
                                <label for="cvv">CVV</label>
                                <input type="text" class="form-control" id="cvv" placeholder="123" name="cvv">

                            </div>
                            <div class="form-group p_star">
                                <label for="ccnum">Expiry</label>
                                <input type="date" class="form-control" id="date-c" placeholder="123" name="datecard">

                            </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="">
                            <div class="order_box">
                                <h2>الطلب رقم </h2>
                                <ul class="list">
                                    <li>
                                        {{ Cart::initial() }} <span class="text-danger">السعر الاجمالي</span>

                                    </li>
                                </ul>
                                <hr>
                                <ul class="list">
                                    <li>
                                        {{ Cart::content()->count() }} <span class="text-danger"> عدد المنتجات</span>
                                    </li>
                                </ul>
                                <hr>
                                <ul class="list">
                                    <li>
                                        {{ Cart::initial() }} <span class="text-danger">السعر الاجمالي مع اجور الشحن
                                        </span>
                                    </li>
                                </ul>
                                <hr>


                                <div class="creat_account">
                                    <input type="checkbox" id="f-option4" name="selector" />
                                    <label for="f-option4">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                </div>
                                <input class="main_btn" type="submit" value="الدفع الان">
                            </div>

                        </div>

                    </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    @include('layouts.footer')
    @include('layouts.footer-scripts')
@endsection
