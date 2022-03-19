@extends('front.layouts.master')

@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        ورود
    @else
        LogIn
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <section class="row m-5 ">

            <div
                class="col-12 border border-2 border-dark rounded-3 col-md-6 d-flex flex-column justify-content-center p-5 align-items-center">
                <a href="signup - specialist.html" class="text-decoration-none btn btn-outline-dark w-50">
                    ثبت نام متخصص
                </a>
                <img class="w-100 h-auto mt-3"
                    src="{{ asset('frontend/fixy-land-fa-main/image/undraw_accept_request_re_d81h.png') }}" alt="">
            </div>

            <div
                class="col-12 border border-2 border-dark rounded-3 col-md-6 d-flex flex-column justify-content-center p-5 align-items-center">
                <a href="signup.html" class="text-decoration-none btn btn-outline-dark w-50">
                    ثبت نام مشتری
                </a>
                <img class="w-100 h-auto mt-3"
                    src="{{ asset('frontend/fixy-land-fa-main/image/undraw_accept_request_re_d81h.png') }}" alt="">
            </div>


        </section>
    @else
        <section class="row m-5 ">

            <div
                class="col-12 border border-2 border-dark rounded-3 col-md-6 d-flex flex-column justify-content-center p-5 align-items-center">
                <a href="signup - specialist.html" class="text-decoration-none btn btn-outline-dark w-50">
                    specialist sign up
                </a>
                <img class="w-100 h-auto mt-3"
                    src="{{ asset('frontend/fixy-land-en-main/image/undraw_accept_request_re_d81h.png') }}" alt="">
            </div>

            <div
                class="col-12 border border-2 border-dark rounded-3 col-md-6 d-flex flex-column justify-content-center p-5 align-items-center">
                <a href="signup.html" class="text-decoration-none btn btn-outline-dark w-50">
                    user sign up
                </a>
                <img class="w-100 h-auto mt-3"
                    src="{{ asset('frontend/fixy-land-en-main/image/undraw_accept_request_re_d81h.png') }}" alt="">
            </div>


        </section>
    @endif
@endsection
