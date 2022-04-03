@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        تغییر پسورد
    @else
        Change Password
    @endif
@endsection

@section('head')
    <!--croppie styles and scripts cdn (crop image)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
@endsection

@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <div class="container-fluid p-0">
            <div class="row ms-0 me-0 position-relative">

                <!--profile panel-->
                @include('front.User.menu')


                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5 ">
                    <h1 class="mb-4"> تغییر رمز عبور </h1>
                    <div class="w-100 h-100 border-gray pt-3 mb-5 d-flex flex-column align-items-center padding-bottom">

                        <form class="w-75" action="{{ route('user.panel.passchange.store') }}" method="POST">
                            @csrf

                            <div class="mb-3 w-100">
                                <label for="new-pass" class="form-label"> رمز عبور جدید </label>
                                <input type="password" name="password" class="form-control form-bg-color border-0 pt-2 pb-2"
                                    id="new-pass">
                            </div>

                            <div class="mb-3 w-100">
                                <label for="repeat-new-pass" class="form-label"> تکرار رمز عبور جدید </label>
                                <input type="password" name="password_confirm"
                                    class="form-control form-bg-color border-0 pt-2 pb-2" id="repeat-new-pass">
                            </div>

                            <button type="submit"
                                class="fw-bold w-100 mt-3 pt-2 pb-2 darkYellow border-0 rounded-3">تایید</button>

                        </form>

                    </div>
                </div>


            </div>
        </div>
    @else
        <div class="container-fluid p-0">
            <div class="row ms-0 me-0 position-relative">

                <!--profile panel-->
                @include('front.User.menu')


                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5 ">
                    <h1 class="mb-4"> change password </h1>
                    <div class="w-100 h-100 border-gray pt-3 mb-5 d-flex flex-column align-items-center padding-bottom">

                        <form class="w-75" action="{{ route('user.panel.passchange.store') }}" method="post">
                            @csrf

                            <div class="mb-3 w-100">
                                <label for="new-pass" class="form-label"> new password </label>
                                <input type="password" name="password" class="form-control form-bg-color border-0 pt-2 pb-2"
                                    id="new-pass">
                            </div>

                            <div class="mb-3 w-100">
                                <label for="repeat-new-pass" class="form-label"> repeat new password </label>
                                <input type="password" name="password_confirm"
                                    class="form-control form-bg-color border-0 pt-2 pb-2" id="repeat-new-pass">
                            </div>

                            <button type="submit" class="fw-bold w-100 mt-3 pt-2 pb-2 darkYellow border-0 rounded-3">
                                submit </button>

                        </form>

                    </div>
                </div>


            </div>
        </div>
    @endif

@section('script')
    <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
@endsection
