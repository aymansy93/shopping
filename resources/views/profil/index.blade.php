@extends('admin.master')
@section('title-profil')
الملف الشخصي
@endsection
@section('index')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>اسم المستخدم</p>
            <h2>{{Auth::user()->profil->username}}</h2>
            <p> السيرة الذاتية</p>
            <h2>{{Auth::user()->profil->title}}</h2>
        </div>
    </div>
   
  
  
 

</div>
@endsection
