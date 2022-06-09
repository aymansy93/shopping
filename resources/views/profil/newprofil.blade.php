@extends('layouts.master')
@section('footer')
@include('layouts.footer')
@include('layouts.footer-scripts')
@endsection
@section('contant')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center fw-bolder text-primary">مرحبا بك<i class='bx bxs-check-shield bx-flashing'
                    style='color:#2c1ed6'></i> {{ Auth::user()->name }} </h1>
            <h3 class="text-center fw-bolder text-primary">يرجى اكمال ملفك الشخصي</h3>
            <form action="{{ route('new.store.profil') }}" method="post" enctype="multipart/form-data">
                @csrf
                
               
                <div class="mb-3">
                    <label class="form-label"> اسم المستخدم</label>
                    <input class="form-control" type="text" name="username" value="" id="">

                </div>
                <div class="mb-3">
                    <label class="form-label"> !السيرة الذاتية</label>
                    <input class="form-control" type="text" name="title" value="" id="">

                </div>
                <div class="mb-3">
                    <label class="form-label"> تغيير صورة الملف الشخصي</label>
                    <input class="form-control" type="file" name="image" id="">

                </div>
                <div class="mb-3">
                    <input class="btn btn-info" type="submit" value="انشاء">
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
