@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        تغیر مشخصات
    @else
        edit profile
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


                @include('front.User.menu')

                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-2 p-md-5">
                    <h1 class="mb-4"> ویرایش مشخصات </h1>
                    <div class="w-100 h-100 border-gray pt-3 mb-5 d-flex flex-column align-items-center padding-bottom">

                        <form class="" action="{{ route('user.panel.profile.update') }}" method="post">
                            @csrf
                            <div class="mb-3 w-100">
                                <label for="user-first-name" class="form-label"> نام </label>
                                <input value="{{ auth()->user()->firstname }}" name="firstname" type="text"
                                    placeholder="abc" class="form-control form-bg-color border-0 pt-2 pb-2"
                                    id="user-first-name">
                            </div>

                            <div class="mb-4 w-100">
                                <label for="user-last-name" class="form-label"> نام خانوادگی </label>
                                <input type="text" name="lastname" value="{{ auth()->user()->lastname }}" t
                                    placeholder="abc" class="form-control form-bg-color border-0 pt-2 pb-2"
                                    id="user-last-name">
                            </div>



                            <div class="mb-3 d-flex justify-content-between w-100 flex-column flex-md-row">
                                <label for="phone" class="form-label w-50 mt-md-1">شماره موبایل</label>
                                <div class="w-100">
                                    <input name="phone" value="{{ auth()->user()->phone }}" t type="text" id="phone"
                                        class="border-gray border-1 rounded-3 pt-2 pb-1 w-100 form-bg-color" />
                                </div>
                            </div>


                            <div class="mb-3 w-100">
                                <label for="user-email" class="form-label"> ایمیل </label>
                                <input type="email" value="{{ auth()->user()->email }}" name="email"
                                    placeholder="abc@gmail.com" class="form-control form-bg-color border-0 pt-2 pb-2"
                                    id="user-email">
                            </div>



                            <div class="mb-3">
                                <label for="state-register-specialist" class="form-label"> استان </label>
                                <select class="form-select" name="state_id" id="state-register-specialist">
                                    <option selected id="state_0" value="{{ auth()->user()->address->state_id }}">
                                        {{ auth()->user()->address->state->name }}</option>
                                    @foreach ($languages as $language)
                                        @php
                                            $state = $language->langable;
                                            $number = 1;
                                        @endphp
                                        <option name="state_id" id="state_{{ $number }}" value="{{ $state->id }}">
                                            {{ $state->name }}</option>
                                        @php
                                            $number++;
                                        @endphp
                                    @endforeach

                                </select>
                            </div>

                            <!--شهرهای مرتبط به هر استان   --  start -->
                            <div class="cities mb-3" id="maincitydiv">
                                <label for="city-register-specialist-nothing" class="form-label">شهر </label>
                                <select class="form-select" id="city-register-specialist-nothing">
                                    <option value="{{ auth()->user()->address->city->name }}">
                                        {{ auth()->user()->address->city->name }}
                                    </option>
                                </select>
                            </div>


                            <div class="cities mb-3" id="maincitydiv">
                                <select class="form-select" id="select-city">

                                </select>
                            </div>



                            <div class="mb-3 w-100">
                                <label for="user-address" class="form-label"> آدرس </label>
                                <input value="{{ auth()->user()->address->description }}" type="text"
                                    placeholder="شیراز/ملاصدرا" name="description"
                                    class="form-control form-bg-color border-0 pt-2 pb-2" id="user-address">
                            </div>

                            <button type="submit"
                                class="fw-bold w-100 mt-3 p-5 pt-2 pb-2 darkYellow border-0 rounded-3 mb-5">ثبت</button>
                            <input type="hidden" name="city_id" value="{{ auth()->user()->address->city->name }}"
                                id="city_id">

                        </form>

                    </div>
                </div>


            </div>
        </div>
    @else
        <div class="container-fluid p-0">
            <div class="row ms-0 me-0 position-relative">


                @include('front.User.menu')

                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5 p-2">
                    <h1 class="mb-4"> edit profile </h1>
                    <div class="w-100 h-100 border-gray pt-3 mb-5 d-flex flex-column align-items-center padding-bottom">

                        <form class="" action="{{ route('user.panel.profile.update') }}" method="post">
                            @csrf
                            <div class="mb-3 w-100">
                                <label for="user-first-name" class="form-label"> fname: </label>
                                <input type="text" value="{{ auth()->user()->firstname }}" name="firstname"
                                    placeholder="abc" class="form-control form-bg-color border-0 pt-2 pb-2"
                                    id="user-first-name">
                            </div>

                            <div class="mb-3 w-100">
                                <label for="user-last-name" class="form-label"> lname: </label>
                                <input type="text" value="{{ auth()->user()->firstname }}" name="lastname"
                                    placeholder="abc" class="form-control form-bg-color border-0 pt-2 pb-2"
                                    id="user-last-name">
                            </div>

                            <div class="mb-4 d-flex justify-content-between w-100 flex-column flex-md-row">
                                <label for="phone" class="form-label w-50 mt-md-1">mobile: </label>
                                <div class="w-100">
                                    <input name="phone" value="{{ auth()->user()->phone }}" type="text" id="phone"
                                        class="border-gray border-1 rounded-3 pt-2 pb-1 w-100 form-bg-color" />
                                </div>
                            </div>

                            <div class="mb-3 w-100">
                                <label for="user-email" class="form-label"> email: </label>
                                <input type="email" value="{{ auth()->user()->email }}" name="email"
                                    placeholder="abc@gmail.com" class="form-control form-bg-color border-0 pt-2 pb-2"
                                    id="user-email">
                            </div>


                            <!--استان محل سکونت-->
                            <div class="mb-3">
                                <label for="state-register-specialist" class="form-label"> استان </label>
                                <select class="form-select" name="state_id" id="state-register-specialist">
                                    <option selected id="state_0" value="{{ auth()->user()->address->state_id }}">
                                        {{ auth()->user()->address->state->name }}</option>
                                    @foreach ($languages as $language)
                                        @php
                                            $state = $language->langable;
                                            $number = 1;
                                        @endphp
                                        <option name="state_id" id="state_{{ $number }}"
                                            value="{{ $state->id }}">
                                            {{ $state->name }}</option>
                                        @php
                                            $number++;
                                        @endphp
                                    @endforeach

                                </select>
                            </div>

                            <!--شهرهای مرتبط به هر استان   --  start -->
                            <div class="cities mb-3" id="maincitydiv">
                                <label for="city-register-specialist-nothing" class="form-label">شهر </label>
                                <select class="form-select" id="city-register-specialist-nothing">
                                    <option value="{{ auth()->user()->address->city->name }}">
                                        {{ auth()->user()->address->city->name }}
                                    </option>
                                </select>
                            </div>


                            <div class="cities mb-3" id="maincitydiv">
                                <select class="form-select" id="select-city">

                                </select>
                            </div>



                            <div class="mb-3 w-100">
                                <label for="user-address" class="form-label"> addr: </label>
                                <input type="text" name="description" value="{{ auth()->user()->address->description }}"
                                    placeholder="shiraz-jamali" class="form-control form-bg-color border-0 pt-2 pb-2"
                                    id="user-address">
                            </div>

                            <button type="submit"
                                class="fw-bold w-100 mt-3 p-5 pt-2 pb-2 darkYellow border-0 rounded-3 mb-5"> submit
                            </button>
                            <input type="hidden" name="city_id" value="{{ auth()->user()->address->city->name }}"
                                id="city_id">

                        </form>

                    </div>
                </div>


            </div>
        </div>
    @endif
@endsection
@section('script')
    <!--scripts from script folder	-->
    <script src="{{ asset('frontend/fixy-land-fa-main/script/country_code.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/fixy-land-fa-main/script/user-addrs.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            function getcityforsignup(cityid) {
                var cityid1 = cityid
                var _token = $("input[name='_token']").val();
                $.ajax({
                    url: "{{ route('user.register.get.city') }}",
                    type: 'POST',
                    data: {
                        _token: _token,
                        city_id: cityid1
                    },
                    success: function(data) {
                        var maindiv = $("#maincitydiv")
                        maindiv.html(" ")

                        // making label for select options
                        var label = document.createElement("label")
                        label.classList.add("form-label")
                        @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
                            var labeltext = document.createTextNode("شهر")
                        @else
                            var labeltext = document.createTextNode("city")
                        @endif

                        label.append(labeltext)
                        maindiv.append(label)

                        // making select
                        var select = $("#select-city")
                        select.html(" ")
                        // making a fake option
                        var option = document.createElement("option")
                        var optioncttext = document.createTextNode("لطفا شهر خود را انتخاب کنید")
                        option.append(optioncttext)
                        select.append(option)


                        // making option for select
                        data.cities.forEach(city => {
                            var option = document.createElement("option")
                            var optioncttext = document.createTextNode(city.name)
                            option.append(optioncttext)
                            select.append(option)
                        });


                    }
                });
            }


            $("#state-register-specialist").change(function() {
                var input = $("#state-register-specialist")
                getcityforsignup(input.val())
            });

            $("#select-city").change(function() {
                var value = $("#select-city").val();
                $("#city_id").attr("value", value);
            });
        });
    </script>
@endsection
