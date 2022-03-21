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

                <form>
                    <div class="row mb-2">
                        <div class="col-md-6 col-12 mb-3">
                            <label for="name-register-cutomer" class="form-label">نام</label>
                            <input type="text" class="form-control" id="name-register-cutomer">
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label for="fname-register-cutomer" class="form-label">نام خانوادگی</label>
                            <input type="text" class="form-control" id="fname-register-cutomer">
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
                        <input type="email" class="form-control" id="email-register-cutomer">
                    </div>

                    <div class="mb-3">
                        <label for="password-register-cutomer" class="form-label">رمز</label>
                        <input type="password" class="form-control" id="password-register-cutomer">
                    </div>


                    <!--استان-->
                    <div class="mb-3">
                        <label for="state-register-customer" class="form-label"> استان </label>
                        <select class="form-select" id="state-register-customer">
                            <option id="state_0" value="0" selected>فارس</option>
                            <option id="state_1" value="1">تهران</option>
                            <option id="state_2" value="2">اصفهان</option>
                        </select>
                    </div>

                    <!--شهرهای مرتبط به هر استان   --  start -->
                    <!--فارس-->
                    <div class="cities mb-3">
                        <label for="city-register-customer-fars" class="form-label">شهر </label>
                        <select class="form-select" id="city-register-customer-fars">
                            <option value="shiraz">شیراز</option>
                            <option value="tehran">فسا</option>
                            <option value="esfahan">اقلید</option>
                        </select>
                    </div>

                    <!--تهران-->
                    <div class="cities mb-3 d-none">
                        <label for="city-register-customer-tehran" class="form-label">شهر </label>
                        <select class="form-select" id="city-register-customer-tehran">
                            <option value="shiraz">تهران</option>
                            <option value="tehran">تهران</option>
                            <option value="esfahan">تهران</option>
                        </select>
                    </div>

                    <!--اصفهان-->
                    <div class="cities mb-3 d-none">
                        <label for="city-register-customer-esfahan" class="form-label">شهر </label>
                        <select class="form-select" id="city-register-customer-esfahan">
                            <option value="shiraz">اصفهان</option>
                            <option value="tehran">اصفهان</option>
                            <option value="esfahan">اصفهان</option>
                        </select>
                    </div>
                    <!--شهرهای مرتبط به هر استان   --  end -->


                    <div class="mb-3">
                        <label for="address-register-cutomer" class="form-label">آدرس</label>
                        <textarea class="form-control" id="address-register-cutomer"></textarea>
                    </div>


                    <div class="mb-3 ">
                        <input type="checkbox" required="required" class="form-check-input" id="check-register-cutomer">
                        <label class="form-check-label" for="check-register-cutomer">قوانین و مقررات را مطالعه و قبول دارم.
                        </label>
                    </div>

                    <div class="mb-3 ">
                        <label for="identifierCode-register-cutomer" class="form-label">کد معرف</label>
                        <input class="form-control" id="identifierCode-register-cutomer" type="text"
                            placeholder="در صورت داشتن کد معرف آن را وارد نمایید.">
                    </div>

                    <button type="submit" class="w-100 mt-4 darkYellow border-redius-20 font-size32">تایید</button>

                    <div class="border-redius-20 mt-4 p-1">
                        <a href="#" class="text-decoration-none text-dark d-flex justify-content-center align-items-center">
                            ثبت نام / ورود با گوگل
                            <img src="image/icon-google.svg" alt="">
                        </a>
                    </div>
                </form>

            </div>

            <div class="col-md-4 border-start d-none d-md-block m-0 lightblue">
                <img src="image/GroupPhoto.png" class=" pt-2 w-100 h-auto sticky-top " alt="" id="imageSignup">
            </div>

        </section>
    @else
        <section class="row">
            <div
                class="col-12 border border-2 border-dark rounded-3 col-md-8 d-flex flex-column justify-content-center p-5 align-items-center">

                <h1 class="mb-4"> user sign-up </h1>

                <form>

                    <div class="row mb-2">
                        <div class="col-6 mb-3">
                            <label for="name-register-cutomer" class="form-label"> fname </label>
                            <input type="text" class="form-control" id="name-register-cutomer">
                        </div>
                        <div class="col-6 mb-3">
                            <label for="fname-register-cutomer" class="form-label"> lname </label>
                            <input type="text" class="form-control" id="fname-register-cutomer">
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
                        <input type="email" class="form-control" id="email-register-cutomer">
                    </div>

                    <div class="mb-3">
                        <label for="password-register-cutomer" class="form-label"> password </label>
                        <input type="password" class="form-control" id="password-register-cutomer">
                    </div>

                    <!--استان محل سکونت-->
                    <div class="mb-3">
                        <label for="state-register-customer" class="form-label"> province</label>
                        <select class="form-select" id="state-register-customer">
                            <option id="state_0" value="0" selected>fars</option>
                            <option id="state_1" value="1">tehran</option>
                            <option id="state_2" value="2">esfahan</option>
                        </select>
                    </div>

                    <!--شهرهای مرتبط به هر استان   --  start -->
                    <!--فارس-->
                    <div class="cities mb-3">
                        <label for="city-register-customer-fars" class="form-label">city </label>
                        <select class="form-select" id="city-register-customer-fars">
                            <option value="shiraz">shiraz</option>
                            <option value="tehran">fasa</option>
                            <option value="esfahan">eghlid</option>
                        </select>
                    </div>

                    <!--تهران-->
                    <div class="cities mb-3 d-none">
                        <label for="city-register-customer-tehran" class="form-label">city</label>
                        <select class="form-select" id="city-register-customer-tehran">
                            <option value="shiraz">tehran</option>
                            <option value="tehran">rey</option>
                            <option value="esfahan">golpayegan</option>
                        </select>
                    </div>

                    <!--اصفهان-->
                    <div class="cities mb-3 d-none">
                        <label for="city-register-customer-esfahan" class="form-label">city </label>
                        <select class="form-select" id="city-register-customer-esfahan">
                            <option value="shiraz">esfahan</option>
                            <option value="tehran">esfahan</option>
                            <option value="esfahan">esfahan</option>
                        </select>
                    </div>
                    <!--شهرهای مرتبط به هر استان   --  end -->



                    <div class="mb-3">
                        <label for="address-register-cutomer" class="form-label"> addr. </label>
                        <textarea class="form-control" id="address-register-cutomer"></textarea>
                    </div>


                    <div class="mb-3">
                        <input type="checkbox" required="required" class="form-check-input" id="check-register-cutomer">
                        <label class="form-check-label ms-1" for="check-register-cutomer">Ghavanin ra ghabool daram.
                        </label>
                    </div>

                    <div class="mb-3 ">
                        <label for="identifierCode-register-cutomer" class="form-label">code moaref:</label>
                        <input class="form-control" id="identifierCode-register-cutomer" type="text"
                            placeholder="add code">
                    </div>

                    <button type="submit" class="w-100 mt-4 darkYellow border-redius-20 font-size32"> submit </button>

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
@endsection
