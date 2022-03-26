@extends("front.layouts.master")
@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        ثبت نام کاربر
    @else
        User Sign Up
    @endif
@endsection
@section('head')
    <!--country code css and scripts cdn-->
    <link rel="stylesheet" href="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdn.tutorialjinni.com/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
@endsection

@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <section class="row">
            <div
                class="col-12 border border-2 border-dark rounded-3 col-md-8 d-flex flex-column justify-content-center p-5 align-items-center">

                <h1 class="mb-4">ثبت نام مشتری</h1>

                <form action="{{ route('user.register.store') }}" method="post">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-md-6 col-12 mb-3">
                            <label for="name-register-cutomer" class="form-label">نام</label>
                            <input type="text" class="form-control" name="first_name" id="name-register-cutomer">
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label for="fname-register-cutomer" class="form-label">نام خانوادگی</label>
                            <input type="text" class="form-control" name="last_name" id="fname-register-cutomer">
                        </div>
                    </div>


                    <div class="mb-3 d-flex justify-content-between w-100 flex-column flex-md-row">
                        <label for="phone" class="form-label w-50 mt-md-1">شماره موبایل</label>
                        <div class="w-100">
                            <input name="phone" type="text" id="phone"
                                class="border-gray border-1 rounded-3 pt-2 pb-1 w-100" />
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="email-register-cutomer" class="form-label">ایمیل</label>
                        <input type="email" name="email" class="form-control" id="email-register-cutomer">
                    </div>

                    <div class="mb-3">
                        <label for="password-register-cutomer" class="form-label">رمز</label>
                        <input type="password" name="password" class="form-control" id="password-register-cutomer">
                    </div>



                    <!--استان محل سکونت-->
                    <div class="mb-3">
                        <label for="state-register-specialist" class="form-label"> استان </label>
                        <select class="form-select" name="state_id" id="state-register-specialist">
                            <option selected id="state_0">لطفا استان خود را انتخاب کنید</option>
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
                            <option selected>ابتدا استان خود را انتخاب کنید</option>
                        </select>
                    </div>


                    <div class="cities mb-3" id="maincitydiv">
                        <select class="form-select" id="select-city">

                        </select>
                    </div>



                    <div class="mb-3">
                        <label for="address-register-cutomer" class="form-label">آدرس</label>
                        <textarea class="form-control" name="address" id="address-register-cutomer"></textarea>
                    </div>


                    <div class="mb-3 ">
                        <input type="checkbox" required="required" name="ghavanin" class="form-check-input"
                            id="check-register-cutomer">
                        <label class="form-check-label" for="check-register-cutomer">قوانین و مقررات را مطالعه و قبول دارم.
                        </label>
                    </div>

                    <div class="mb-3 ">
                        <label for="identifierCode-register-cutomer" class="form-label">کد
                            معرف</label>
                        <input class="form-control" name="moaref_code" id="identifierCode-register-cutomer" type="text"
                            placeholder="در صورت داشتن کد معرف آن را وارد نمایید.">
                    </div>

                    <button type="submit" class="w-100 mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                    <input type="hidden" name="city_id" value="" id="city_id">
                </form>

            </div>

            <div class="col-md-4 border-start d-none d-md-block m-0 lightblue">
                <img src="{{ asset('frontend/fixy-land-fa-main/image/GroupPhoto.png') }}"
                    class=" pt-2 w-100 h-auto sticky-top " alt="" id="imageSignup">
            </div>

        </section>
    @else
        <section class="row">
            <div
                class="col-12 border border-2 border-dark rounded-3 col-md-8 d-flex flex-column justify-content-center p-5 align-items-center">

                <h1 class="mb-4"> user sign-up </h1>

                <form action="{{ route('user.register.store') }}" method="post">
                    @csrf
                    <div class="row mb-2">
                        <div class="col-6 mb-3">
                            <label for="name-register-cutomer" class="form-label"> fname </label>
                            <input type="text" name="first_name" class="form-control" id="name-register-cutomer">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="fname-register-cutomer" class="form-label"> lname </label>
                            <input type="text" class="form-control" name="last_name" id="fname-register-cutomer">
                        </div>
                    </div>


                    <div class="mb-4 d-flex justify-content-between w-100 flex-column flex-md-row">
                        <label for="phone" class="form-label w-50 mt-md-1">mobile: </label>
                        <div class="w-100">
                            <input name="phone" type="text" id="phone"
                                class="border-gray border-1 rounded-3 pt-2 pb-1 w-100" />
                        </div>
                    </div>


                    <div class="mb-3">
                        <label for="email-register-cutomer" class="form-label">email</label>
                        <input type="email" name="email" class="form-control" id="email-register-cutomer">
                    </div>

                    <div class="mb-3">
                        <label for="password-register-cutomer" class="form-label"> password </label>
                        <input type="password" name="password" class="form-control" id="password-register-cutomer">
                    </div>

                    <!--استان محل سکونت-->
                    <div class="mb-3">
                        <label for="state-register-customer" class="form-label"> province</label>
                        <select class="form-select" name="state_id" id="state-register-customer">
                            <option selected id="state_0">please choose your city</option>
                            @foreach ($languages as $language)
                                @php
                                    $state = $language->langable;
                                    $number = 1;
                                @endphp
                                <option id="state_{{ $number }}" value="{{ $state->id }}">
                                    {{ $state->name }}</option>
                                @php
                                    $number++;
                                @endphp
                            @endforeach
                        </select>
                    </div>

                    <div class="cities mb-3">
                        <label for="city-register-customer-nothing" class="form-label">city </label>
                        <select class="form-select" id="city-register-customer-nothing">
                            <option selected>please choose state first</option>
                        </select>
                    </div>

                    <div class="cities mb-3" id="maincitydiv">

                    </div>




                    <div class="mb-3">
                        <label for="address-register-cutomer" class="form-label"> addr. </label>
                        <textarea class="form-control" name="address" id="address-register-cutomer"></textarea>
                    </div>


                    <div class="mb-3">
                        <input type="checkbox" name="ghavanin" required="required" class="form-check-input"
                            id="check-register-cutomer">
                        <label class="form-check-label ms-1" for="check-register-cutomer">Ghavanin ra ghabool daram.
                        </label>
                    </div>

                    <div class="mb-3 ">
                        <label for="identifierCode-register-cutomer" class="form-label">code moaref:</label>
                        <input class="form-control" name="moaref_code" id="identifierCode-register-cutomer" type="text"
                            placeholder="add code">
                    </div>

                    <button type="submit" class="w-100 mt-4 darkYellow border-redius-20 font-size32"> submit </button>
                    <input type="hidden" name="city_id" value="" id="city_id">
                </form>

            </div>

            <div class="col-md-4 border-start d-none d-md-block m-0 lightblue">
                <img src="{{ asset('frontend/fixy-land-fa-main/image/GroupPhoto.png') }}"
                    class=" pt-2 w-100 h-auto sticky-top " alt="" id="imageSignup">
            </div>

        </section>
    @endif
@endsection

@section('script')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <script src="{{ asset('frontend/fixy-land-fa-main/script/country_code.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/user-addrs.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('frontend/fixy-land-en-main/script/country_code.js') }}" type="text/javascript">
        </script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/user-addrs.js') }}" type="text/javascript"></script>
    @endif

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
