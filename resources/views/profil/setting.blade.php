@extends('admin.master')
@section('title-profil')
    الملف الشخصي
@endsection
@section('index')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('update.profil') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label class="form-label"> الاسم</label>
                        <input class="form-control" type="text" name="name" value="{{ Auth::user()->name }}" id="">

                    </div>
                    <div class="mb-3">
                        <label class="form-label"> اسم المستخدم</label>
                        <input class="form-control" type="text" disabled value="{{ Auth::user()->profil->username }}" id="">

                    </div>
                    <div class="mb-3">
                        <label class="form-label"> !السيرة الذاتية</label>
                        <input class="form-control" type="text" name="title" value="{{ Auth::user()->profil->title }}" id="">

                    </div>
                    <div class="mb-3">
                        <label class="form-label"> تغيير صورة الملف الشخصي</label>
                        <input class="form-control" type="file" name="image" id="">

                    </div>
                    <div class="mb-3">
                        <input class="btn btn-info" type="submit" value="تحديث">
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
                @if (session('status'))
                    <h6 class="alert alert-info">
                        {{ session('status') }}</h6>
                @endif
            </div>
        </div>
    </div>
@endsection
