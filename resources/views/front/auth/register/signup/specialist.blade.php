@extends("front.layouts.master")
@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        ثبت نام متخصص
    @else
        Specialist Sign Up
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
                class="col-12 col-md-8 border border-2 border-dark rounded-3 d-flex flex-column justify-content-center p-5 align-items-center">
                <h1 class="mb-4">ثبت نام متخصص</h1>

                <form class="col-12" action="{{ route('user.register.signup.specialist.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label for="name-register-specialist" class="form-label">نام</label>
                            <input type="text" class="form-control" name="firstname" id="name-register-specialist">
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label for="fname-register-specialist" class="form-label">نام خانوادگی</label>
                            <input type="text" class="form-control" name="lastname" id="fname-register-specialist">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email-register-specialist" class="form-label">ایمیل</label>
                        <input type="email" class="form-control" name="email" id="email-register-specialist">
                    </div>


                    <!--mobile,birthdate,gender-->
                    <div class="container-fluid p-0 mb-3">
                        <div class="row gap-md-1 gap-lg-0 gy-3 ">

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="gender-register-specialist" class="form-label">جنسیت</label>
                                <div class="border border-1 rounded-3 pt-1 ps-3 pe-3 text-center">
                                    <label for="men-register-specialist" class="form-label">مرد</label>
                                    <input type="radio" name="gender[]" value="0" class=""
                                        id="men-register-specialist">
                                    <label for="woman-register-specialist" class="form-label me-5">زن</label>
                                    <input type="radio" class="" value="1" name="gender[]"
                                        id="woman-register-specialist">
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="date-register-specialist" class="form-label w-50">تاریخ تولد</label>
                                <input type="date" class="form-control" name="birth" id="date-register-specialist">
                            </div>

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="phone" class="form-label">شماره موبایل</label><br>
                                <div class="w-100">
                                    <input name="phone" type="text" name="phone" id="phone"
                                        class="border-gray border-1 rounded-3 pt-2 pb-1 w-100" />
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="mb-4">
                        <label for="pass-register-specialist" class="form-label">رمز عبور</label>
                        <input type="password" name="password" class="form-control" id="pass-register-specialist">
                    </div>

                    <div class="mb-3 d-flex justify-content-around flex-column flex-md-row">
                        <div>
                            <label for="healthy-register-specialist" class="form-label">سالم هستم</label>
                            <input type="radio" class="" name="health[]" value="yes"
                                id="healthy-register-specialist">
                        </div>
                        <div>
                            <label for="patient-register-specialist" class="form-label">بیمار هستم</label>
                            <input type="radio" class="" name="health[]" value="no"
                                id="patient-register-specialist">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="about-register-specialist" class="form-label">در صورتی که بیماری یا معلولیت خاصی
                            دارید وارد نمایید.</label>
                        <textarea name="health_description" class="form-control form-bg-color bg-white" id="about-register-specialist"
                            placeholder="توضیحات"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="identificationCard-register-specialist" class="form-label">آپلود تصویر کارت
                            شناسایی</label>
                        <input type="file" name="idenity_photo" class="form-control"
                            id="identificationCard-register-specialist" placeholder="اضافه کردن نمونه کار">
                    </div>

                    <div class="mb-3">
                        <label for="citizenshipCode-register-specialist" class="form-label">کد شهروندی</label>
                        <input type="text" name="citizen_code" class="form-control"
                            id="citizenshipCode-register-specialist">
                    </div>

                    <div class="mb-3">
                        <label for="date-register-doc" class="form-label">تصویر گوایی مهارت خود را وارد کنید.</label>
                        <input type="file" name="govahi_photo" class="form-control" id="date-register-doc"
                            placeholder="اضافه کردن نمونه کار">
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
                        <label for="city-register-specialist-nothing1" class="form-label">شهر </label>
                        <select class="form-select" id="select-city">

                        </select>
                    </div>




                    <div class="mb-3">
                        <label for="address-register-specialist" class="form-label ">آدرس</label>
                        <textarea class="form-control bg-white" name="address_description" id="address-register-specialist"
                            placeholder="آدرس"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="houseNumber-register-specialist" class="form-label">پلاک</label>
                        <input type="text" class="form-control" name="pelak" id="houseNumber-register-specialist">
                    </div>

                    <div class="mb-3">
                        <label for="houseNumberCode-register-specialist" class="form-label">کد پستی</label>
                        <input type="text" name="postal_code" class="form-control"
                            id="houseNumberCode-register-specialist">
                    </div>


                    <!--استان محل خدمت-->

                    <div class="mb-3">
                        <label for="state-register-specialist" class="form-label"> استان </label>
                        <select class="form-select" name="state_id_expert" id="state-register-specialist-expert">
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
                    <div class="cities mb-3" id="maincitydivexpert">
                        <label for="city-register-specialist-nothing" class="form-label">شهر </label>
                        <select class="form-select" id="city-register-specialist-nothing">
                            <option selected>ابتدا استان خود را انتخاب کنید</option>
                        </select>
                    </div>

                    <div class="cities mb-3 mi2" id="maincitydivexpert">
                        <select class="form-select" id="city-expert">
                        </select>
                    </div>




                    <h2>انتخاب مهارت</h2>


                    <div class="mt-2 form-control-register-specialist-div ">

                        <div class="row d-flex gap-2 justify-content-center mb-2  ">
                            @foreach ($categorylangs as $categorylang)
                                @php
                                    $category = $categorylang->langable;
                                @endphp
                                <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">{{ $category->name }}
                                </div>
                            @endforeach

                        </div>

                    </div>

                    @foreach ($categorylangs as $categorylang)
                        @php
                            $category = $categorylang->langable;
                            $i = 0;
                        @endphp


                        <div class="mt-2 form-control-register-specialist-div2 d-none">

                            <div class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                                <p>{{ $category->name }}</p>

                                <button
                                    class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                    onClick="backToCategories()">بازگشت به دسته</button>

                            </div>


                            <div class="mb-3 row">
                                @foreach ($category->subcategories as $subcategory)
                                    <div class="col-4">
                                        <label for="idSkill{{ $subcategory->id }}"
                                            class="form-label">{{ $subcategory->name }}</label>
                                        <input name="skill_id[]" value="{{ $subcategory->id }}" type="checkbox"
                                            class="checkclass cat{{ $i }}"
                                            id="idSkill{{ $subcategory->id }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                    <div class="w-100 mt-5">
                        <div class="mb-3">
                            <label for="bank-account-number" class="form-label">شماره حساب</label>
                            <input type="text" class="form-control" name="account_number" id="bank-account-number">
                        </div>
                        <div class="mb-3">
                            <label for="credit-card" class="form-label">کارت اعتباری</label>
                            <input type="text" class="form-control" name="credit_card" id="credit-card">
                        </div>

                        <div class="mb-3 ">
                            <label for="identifierCode-register-cutomer" class="form-label">code moaref:</label>
                            <input class="form-control" name="moaref_code" id="identifierCode-register-cutomer"
                                type="text" placeholder="add code">
                        </div>

                        <div class="mb-3 ">
                            <input type="checkbox" required="required" class="form-check-input"
                                id="check-register-specialist">
                            <label class="form-check-label" for="check-register-specialist">قوانین و مقررات را مطالعه و
                                قبول دارم.</label>
                        </div>


                        <div class="d-flex mb-3 gap-3">
                            <a href="index.html"
                                class="btn text-decoration-none btn-outline-dark w-100 mt-4 border-redius-20 font-size32">لغو</a>
                            <button type="submit"
                                class=" w-100  mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                        </div>

                    </div>
                    <input type="hidden" name="city_id" value="" id="city_id">
                    <input type="hidden" name="city_id_expert" value="" id="city_id_expert">
                </form>




            </div>

            <div class="col-md-4 border-start d-none d-md-block m-0 lightblue">
                <img src="{{ asset('frontend/fixy-land-en-main/image/GroupPhoto.png') }}"
                    class=" pt-2 w-100 h-auto sticky-top" alt="">
            </div>

        </section>
    @else
        <section class="row">
            <div
                class="col-12 col-md-8 border border-2 border-dark rounded-3 d-flex flex-column justify-content-center p-5 align-items-center">
                <h1 class="mb-4"> specialist sign-up </h1>

                <form class="col-12" action="{{ route('user.register.signup.specialist.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label for="name-register-specialist" class="form-label">firstname</label>
                            <input type="text" class="form-control" name="firstname" id="name-register-specialist">
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label for="fname-register-specialist" class="form-label">Lastname</label>
                            <input type="text" class="form-control" name="lastname" id="fname-register-specialist">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email-register-specialist" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email-register-specialist">
                    </div>


                    <!--mobile,birthdate,gender-->
                    <div class="container-fluid p-0 mb-3">
                        <div class="row gap-md-1 gap-lg-0 gy-3 ">

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="gender-register-specialist" class="form-label">Gender</label>
                                <div class="border border-1 rounded-3 pt-1 ps-3 pe-3 text-center">
                                    <label for="men-register-specialist" class="form-label">Male</label>
                                    <input type="radio" name="gender[]" value="0" class=""
                                        id="men-register-specialist">
                                    <label for="woman-register-specialist" class="form-label me-5">Femail</label>
                                    <input type="radio" class="" value="1" name="gender[]"
                                        id="woman-register-specialist">
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="date-register-specialist" class="form-label w-50">Birth</label>
                                <input type="date" class="form-control" name="birth" id="date-register-specialist">
                            </div>

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="phone" class="form-label">Phone Number</label><br>
                                <div class="w-100">
                                    <input name="phone" type="text" name="phone" id="phone"
                                        class="border-gray border-1 rounded-3 pt-2 pb-1 w-100" />
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="mb-4">
                        <label for="pass-register-specialist" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="pass-register-specialist">
                    </div>

                    <div class="mb-3 d-flex justify-content-around flex-column flex-md-row">
                        <div>
                            <label for="healthy-register-specialist" class="form-label">Healthy</label>
                            <input type="radio" class="" name="health[]" value="yes"
                                id="healthy-register-specialist">
                        </div>
                        <div>
                            <label for="patient-register-specialist" class="form-label">Not Healthy</label>
                            <input type="radio" class="" name="health[]" value="no"
                                id="patient-register-specialist">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="about-register-specialist" class="form-label">Please write your problem is you are
                            not healthy</label>
                        <textarea name="health_description" class="form-control form-bg-color bg-white" id="about-register-specialist"
                            placeholder="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="identificationCard-register-specialist" class="form-label">Id Card image</label>
                        <input type="file" name="idenity_photo" class="form-control"
                            id="identificationCard-register-specialist" placeholder="اضافه کردن نمونه کار">
                    </div>

                    <div class="mb-3">
                        <label for="citizenshipCode-register-specialist" class="form-label">Citizen Code</label>
                        <input type="text" name="citizen_code" class="form-control"
                            id="citizenshipCode-register-specialist">
                    </div>

                    <div class="mb-3">
                        <label for="date-register-doc" class="form-label">
                            Certificate of proficiency Image</label>
                        <input type="file" name="govahi_photo" class="form-control" id="date-register-doc">
                    </div>



                    <!--استان محل سکونت-->
                    <div class="mb-3">
                        <label for="state-register-specialist" class="form-label"> State </label>
                        <select class="form-select" name="state_id" id="state-register-specialist">
                            <option selected id="state_0">Please choose your State</option>
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
                        <label for="city-register-specialist-nothing" class="form-label">City </label>
                        <select class="form-select" id="city-register-specialist-nothing">
                            <option selected>Choose your State first</option>
                        </select>
                    </div>


                    <div class="cities mb-3" id="maincitydiv">
                        <label for="city-register-specialist-nothing1" class="form-label">City </label>
                        <select class="form-select" id="select-city">

                        </select>
                    </div>




                    <div class="mb-3">
                        <label for="address-register-specialist" class="form-label ">Address</label>
                        <textarea class="form-control bg-white" id="address-register-specialist" placeholder="آدرس"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="houseNumber-register-specialist" class="form-label">
                            House number</label>
                        <input type="text" class="form-control" name="pelak" id="houseNumber-register-specialist">
                    </div>

                    <div class="mb-3">
                        <label for="houseNumberCode-register-specialist" class="form-label">Postal Code</label>
                        <input type="text" name="postal_code" class="form-control"
                            id="houseNumberCode-register-specialist">
                    </div>


                    <!--استان محل خدمت-->

                    <div class="mb-3">
                        <label for="state-register-specialist" class="form-label"> State </label>
                        <select class="form-select" name="state_id_expert" id="state-register-specialist-expert">
                            <option selected id="state_0">Please Choose your state</option>
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
                    <div class="cities mb-3" id="maincitydivexpert">
                        <label for="city-register-specialist-nothing" class="form-label">City </label>
                        <select class="form-select" id="city-register-specialist-nothing">
                            <option selected>Please Choose your State first</option>
                        </select>
                    </div>

                    <div class="cities mb-3 mi2" id="maincitydivexpert">
                        <select class="form-select" id="city-expert">
                        </select>
                    </div>




                    <h2>Choose your Skill</h2>


                    <div class="mt-2 form-control-register-specialist-div ">

                        <div class="row d-flex gap-2 justify-content-center mb-2  ">
                            @foreach ($categorylangs as $categorylang)
                                @php
                                    $category = $categorylang->langable;
                                @endphp
                                <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">{{ $category->name }}
                                </div>
                            @endforeach

                        </div>

                    </div>

                    @foreach ($categorylangs as $categorylang)
                        @php
                            $category = $categorylang->langable;
                            $i = 0;
                        @endphp

                        <div class="mt-2 form-control-register-specialist-div2 d-none">

                            <div class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                                <p>{{ $category->name }}</p>

                                <button
                                    class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                    onClick="backToCategories()">Back To Category</button>

                            </div>


                            <div class="mb-3 row">
                                @foreach ($category->subcategories as $subcategory)
                                    <div class="col-4">
                                        <label for="idSkill{{ $subcategory->id }}"
                                            class="form-label">{{ $subcategory->name }}</label>
                                        <input name="skill_id[]" value="{{ $subcategory->id }}" type="checkbox"
                                            class="checkclass cat{{ $i }}"
                                            id="idSkill{{ $subcategory->id }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach

                    <div class="w-100 mt-5">
                        <div class="mb-3">
                            <label for="bank-account-number" class="form-label">Bank Account Number</label>
                            <input type="text" class="form-control" name="account_number" id="bank-account-number">
                        </div>
                        <div class="mb-3">
                            <label for="credit-card" class="form-label">Credit Card</label>
                            <input type="text" class="form-control" name="credit_card" id="credit-card">
                        </div>

                        <div class="mb-3 ">
                            <label for="identifierCode-register-cutomer" class="form-label">code moaref:</label>
                            <input class="form-control" name="moaref_code" id="identifierCode-register-cutomer"
                                type="text" placeholder="add code">
                        </div>

                        <div class="mb-3 ">
                            <input type="checkbox" required="required" class="form-check-input"
                                id="check-register-specialist">
                            <label class="form-check-label" for="check-register-specialist">Agree With Site Rules.</label>
                        </div>




                        <div class="d-flex mb-3 gap-3">
                            <a href="index.html"
                                class="btn text-decoration-none btn-outline-dark w-100 mt-4 border-redius-20 font-size32">cansel</a>
                            <button type="submit"
                                class=" w-100  mt-4 darkYellow border-redius-20 font-size32">Confirm</button>
                        </div>

                    </div>
                    <input type="hidden" name="city_id" value="" id="city_id">
                    <input type="hidden" name="city_id_expert" value="" id="city_id_expert">
                </form>




            </div>

            <div class="col-md-4 border-start d-none d-md-block m-0 lightblue">
                <img src="{{ asset('frontend/fixy-land-en-main/image/GroupPhoto.png') }}"
                    class=" pt-2 w-100 h-auto sticky-top" alt="">
            </div>

        </section>
    @endif
@endsection


@section('script')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <script src="{{ asset('frontend/fixy-land-fa-main/script/signup_specialist.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/country_code.js') }}" type="text/javascript">
        </script>
    @else
        <script src="{{ asset('frontend/fixy-land-en-main/script/signup_specialist.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/country_code.js') }}" type="text/javascript">
        </script>
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
                var expertdiv = $("#maincitydivexpert")
                expertdiv.removeClass("d-none")
            });
            $("#select-city").change(function() {
                var value = $("#select-city").val();
                $("#city_id").attr("value", value);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            function getcityforservice(cityid) {
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
                        var maindiv = $("#maincitydivexpert")
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
                        var select = $("#city-expert")
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

            $("#state-register-specialist-expert").change(function() {
                var input = $("#state-register-specialist-expert")
                getcityforservice(input.val())
                var maindiv = $(".mi2")
                maindiv.removeClass("d-none")
                $("#city_id_expert").attr("value", input.val());
            });


            $("#city-expert").change(function() {
                var value = $("#city-expert").val();
                $("#city_id_expert").attr("value", value);
            });
        });
    </script>
@endsection
