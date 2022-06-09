@extends('layouts.master')
@section('contant')
<div class="position-relative">
    <img class="img-responsive center-block d-block mx-auto" src="{{asset('images/500.png')}}" width="400px" alt="404">
    <h1 class="text-center fw-bolder text-primary"> internal server error 500</h1>

</div>

@endsection
@section('footer')
@include('layouts.footer')
@include('layouts.footer-scripts')
@endsection