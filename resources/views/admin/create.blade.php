@extends('admin.master')

@section('index')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h2>اضافة منتج</h2>
            <form action="/admin" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">اسم المنتج</label>
                    <input class="form-control" type="text" name="name" id="">

                </div>
                <div class="mb-3">
                    <label class="form-label"> وصف للمنتج</label>
                    <input class="form-control" type="text" name="title" id="">
                </div>
                <div class="mb-3">
                    <label class="form-label"> تحديد سعر</label>
                    <input class="form-control" type="number" name="price" id="">
                </div>
                <div class="mb-3">
                    <label class="form-label">صور للمنتج</label>
                    <input class="form-control" type="file" name="image" id="">
                </div>
                    <div class="mb-3">
                        <label class="form-label">اختيار صنف للمنتج:</label><br>
                        <select class="form-select" name="type" id="cars">

                        @foreach ( $products as $product )
                        <option value="{{$product->type_product}}">{{$product->type_product}}</option>


                        @endforeach
                        </select>

                </div><br>
                <div class="mb-3">
                    <input class="btn btn-info" type="submit" value="ارسال">
                </div>
                @if ($errors->all())
                                <div class="alert alert-info">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                        @endif



            </form>
        </div>
    </div>
</div>
@endsection
