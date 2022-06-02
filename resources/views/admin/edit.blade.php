@extends('admin.master')
@section('index')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            @if (session('status'))
            <h6 class="alert alert-info">
                {{session("status")}}</h6>

            @endif
            <form action="/admin/{{$product->id}}" method="post" enctype="multipart/form-data">

                @csrf
                {{method_field('PUT')}}
                <div class="mb-3">
                    <label class="form-label">الاسم</label>
                    <input class="form-control" type="text" value="{{$product->name}}" name="name">

                </div>
                <div class="mb-3">
                    <label class="form-label">الوصف</label>
                    <input class="form-control" type="text" value="{{$product->title}}" name="title">
                </div>
                <div class="mb-3">
                    <label class="form-label">السعر</label>
                    <input class="form-control" type="numper" value="{{$product->price}}" name="price">
                </div>
                
                
                <div class="mb-3">
                        <label class="form-label">اختيار صنف للمنتج:</label><br>
                        <select class="from-select" name="type" id="cars">

                        @foreach ( $type_pro as $t )
                        <option value="{{$t->type_product}}">{{$t->type_product}}</option>


                        @endforeach
                        </select>
                    <div class="mb-3">
                        <label class="form-label">لتحديث الصورة يمكن اضافتها هنا</label>
                        <input class="form-control" type="file" name="image" id="">
                    </div>
                    <div class="mb-3">
                        <div class="mb-3 d-inline-flex p-2 bd-highlight">
                        <img src="http://127.0.0.1:8000/storage/product/{{$product->type_products}}/{{$product->image_path}}" width="60px" name="image_path"><br>
                        </div>

                    </div>
                    <div class="mb-3 d-inline-flex p-2 bd-highlight">
                        <input class="btn btn-primary" type="submit">
                    </div>

                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    @error('title')
                    <div class="alert alert-danger">لم تقم باجراء تعديلات عليك الرجوع الى<a href="{{route('admin.index')}}">الصفحة الرئيسية</a></div>

                    @enderror




                </form>



        </div>
    </div>
</div>
@endsection
