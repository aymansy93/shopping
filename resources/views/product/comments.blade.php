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
                                    
                                    {{-- {{ asset(Auth::user()->profil->profil_photo) }} --}}
                                    <img src="{{asset('asset/img/product/single-product/review-3.png')}}"
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