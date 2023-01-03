@extends('admin.master')

@if (session('status'))
    <h6 class="alert alert-info">
        {{ session('status') }}</h6>
@endif
@section('index')
    <div class="col-md-12">
        
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">اسم المنتج</th>
                    <th scope="col">وصف المنتج</th>
                    <th scope="col">سعر المنتج</th>
                    <th scope="col">نوع المنتج</th>
                    <th scope="col"> صورة</th>
                    <th scope="col"></th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->type_products }}</td>
                        <td>
                            <img src="{{Storage::disk('images_uploads')->url("product/$product->type_products/$product->image_path")}}"
                             width="30px" alt="test">
                        </td>
                        <td><a href="/admin/{{ $product->id }}/edit">update</a></td>
                        <td>
                            <form method="post" action="/admin/{{ $product->id }}">

                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input class="btn btn-primary" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection
