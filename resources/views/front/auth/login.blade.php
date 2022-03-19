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
        <section class="row m-0">
            <div
                class="col-12 border border-2 border-dark rounded-3 col-md-8 d-flex flex-column justify-content-center p-5 align-items-center">

                <h1>خوش آمدید</h1>
                <p>به حساب کاربری خود وارد شوید</p>

                <form class="w-75" action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="mobile-number-register-cutomer" class="form-label">شماره موبایل</label>
                        <input name="phone" type="text" class="form-control" id="mobile-number-register-cutomer">
                    </div>

                    <div class="mb-1">
                        <label for="password-register-cutomer" class="form-label">رمز</label>
                        <input name="password" type="text" class="form-control" id="password-register-cutomer">
                    </div>


                    <a class="mb-3 text-decoration-none text-black-no-hover darkYellow-text_onHover" href="#">
                        رمز عبور خود را فراموش کرده اید؟
                    </a>

                    <br>

                    <button type="submit" class=" w-100 mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                </form>

            </div>

            <div class="col-md-4 border-start d-none d-md-block m-0 lightblue">
                <img src="{{ asset('frontend/fixy-land-fa-main/image/GroupPhoto.png') }}"
                    class=" pt-2 w-100 h-auto sticky-top" alt="">
            </div>

        </section>
    @else
        <section class="row m-0">
            <div
                class="col-12 border border-2 border-dark rounded-3 col-md-8 d-flex flex-column justify-content-center p-5 align-items-center">

                <h1>welcome</h1>
                <p>log in to ur account</p>

                <form class="w-75">
                    <div class="mb-3">
                        <label for="mobile-number-register-cutomer" class="form-label">mobile</label>
                        <input name="phone" type="text" class="form-control" id="mobile-number-register-cutomer">
                    </div>

                    <div class="mb-1">
                        <label for="password-register-cutomer" class="form-label">password</label>
                        <input name="password" type="text" class="form-control" id="password-register-cutomer">
                    </div>


                    <a class="mb-3 text-decoration-none text-black-no-hover darkYellow-text_onHover" href="#">forgot ur
                        pass?</a>

                    <br>

                    <button type="submit" class=" w-100 mt-4 darkYellow border-redius-20 font-size32">submit</button>

                </form>

            </div>

            <div class="col-md-4 border-start d-none d-md-block m-0 lightblue">
                <img src="{{ asset('frontend/fixy-land-fa-main/image/GroupPhoto.png') }}"
                    class=" pt-2 w-100 h-auto sticky-top" alt="">
            </div>

        </section>
    @endif
@endsection
