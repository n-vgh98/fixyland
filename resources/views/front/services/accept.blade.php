@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        نحوه پیدا کردن متخصص
    @else
        finding technician method
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <div
            class="black-div-bg vw-100 h-100 pt-5 pb-5 position-absolute top-0 start-0 d-flex justify-content-center align-items-center">

            <div class="overflow-auto pt-3 ps-md-5 pe-md-5 pb-3 text-center">
                <a href="{{ route('user.service.form.find.custom', $order->id) }}"
                    class="btn w-75 text-decoration-none white-background text-black darkYellowOnHover p-2 mb-3"> انتخاب
                    متخصص به صورت دستی </a>
                <a href="{{ route('user.service.form.find.auto', $order->id) }}"
                    class="btn w-75 text-decoration-none white-background text-black darkYellowOnHover p-2"> انتخاب متخصص
                    توسط سایت </a>
            </div>

        </div>
    @else
        <div
            class="black-div-bg vw-100 h-100 pt-5 pb-5 position-absolute top-0 start-0 d-flex justify-content-center align-items-center">

            <div class="overflow-auto pt-3 ps-md-5 pe-md-5 pb-3 text-center">
                <a href="{{ route('user.service.form.find.custom', $order->id) }}"
                    class="btn w-75 text-decoration-none white-background text-black darkYellowOnHover p-2 mb-3"> انتخاب
                    متخصص به صورت دستی </a>
                <a href="{{ route('user.service.form.find.auto', $order->id) }}"
                    class="btn w-75 text-decoration-none white-background text-black darkYellowOnHover p-2"> انتخاب متخصص
                    توسط سایت </a>
            </div>

        </div>
    @endif
@endsection


@section('script')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <script src="{{ asset('frontend/fixy-land-fa-main/script/submit-a-req.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('frontend/fixy-land-en-main/script/submit-a-req.js') }}" type="text/javascript"></script>
    @endif
@endsection
