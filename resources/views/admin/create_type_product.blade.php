@extends('admin.master')
@section('index')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>انشاء صنف منتج جديد</h2>
            <form action="/admin/type-product " method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label"> نوع المنتج</label>
                    <input class="form-control" type="text" name="type_product" id="">

                </div>
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
