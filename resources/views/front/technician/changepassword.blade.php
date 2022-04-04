@extends('front.technician.layouts.master')
@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        تغییر پسورد
    @else
        Change Password
    @endif
@endsection


@section('tec_panel')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')

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
                        <input type="password" name="password_confirm" class="form-control form-bg-color border-0 pt-2 pb-2"
                            id="repeat-new-pass">
                    </div>

                    <button type="submit" class="fw-bold w-100 mt-3 pt-2 pb-2 darkYellow border-0 rounded-3">تایید</button>

                </form>

            </div>
        
    @else
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
                        <input type="password" name="password_confirm" class="form-control form-bg-color border-0 pt-2 pb-2"
                            id="repeat-new-pass">
                    </div>

                    <button type="submit" class="fw-bold w-100 mt-3 pt-2 pb-2 darkYellow border-0 rounded-3">
                        submit </button>

                </form>

            </div>
        </div>
    @endif
@endsection
@section('script')
    <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
@endsection
