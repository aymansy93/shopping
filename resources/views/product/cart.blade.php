@extends('layouts.master')
@section('title')
سلة المشتريات
@endsection

@section('contant')

      <!--================Cart Area =================-->

                <section class="cart_area">
                <div class="container">
                    <div class="cart_inner">
                      @if (session('success'))
                          <h6 class="alert alert-info">
                            {{session('success')}}
                              </h6>

                      @endif
                      <div class="table-responsive">
                        @livewire('updatecart') 
                            </div>
                          </div>
                        </div>
                      </section>
                @include('layouts.footer')

                {{-- @include('layouts.footer-scripts') --}}
@endsection