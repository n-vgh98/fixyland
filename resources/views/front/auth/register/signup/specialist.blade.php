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

                <form class="col-12">

                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label for="name-register-specialist" class="form-label">نام</label>
                            <input type="text" class="form-control" id="name-register-specialist">
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label for="fname-register-specialist" class="form-label">نام خانوادگی</label>
                            <input type="text" class="form-control" id="fname-register-specialist">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email-register-specialist" class="form-label">ایمیل</label>
                        <input type="email" class="form-control" id="email-register-specialist">
                    </div>


                    <!--mobile,birthdate,gender-->
                    <div class="container-fluid p-0 mb-3">
                        <div class="row gap-md-1 gap-lg-0 gy-3 ">

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="gender-register-specialist" class="form-label">جنسیت</label>
                                <div class="border border-1 rounded-3 pt-1 ps-3 pe-3 text-center">
                                    <label for="men-register-specialist" class="form-label">مرد</label>
                                    <input type="radio" class="" id="men-register-specialist"
                                        name="gender-register-specialist">
                                    <label for="woman-register-specialist " class="form-label me-5">زن</label>
                                    <input type="radio" class="" id="woman-register-specialist"
                                        name="gender-register-specialist">
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="date-register-specialist" class="form-label w-50">تاریخ تولد</label>
                                <input type="date" class="form-control" id="date-register-specialist">
                            </div>

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="phone" class="form-label">شماره موبایل</label><br>
                                <div class="w-100">
                                    <input name="phone" type="text" id="phone"
                                        class="border-gray border-1 rounded-3 pt-2 pb-1 w-100" />
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="mb-4">
                        <label for="pass-register-specialist" class="form-label">رمز عبور</label>
                        <input type="password" class="form-control" id="pass-register-specialist">
                    </div>

                    <div class="mb-3 d-flex justify-content-around flex-column flex-md-row">
                        <div>
                            <label for="healthy-register-specialist" class="form-label">سالم هستم</label>
                            <input type="radio" class="" id="healthy-register-specialist"
                                name="healthy-patient">
                        </div>
                        <div>
                            <label for="patient-register-specialist" class="form-label">بیمار هستم</label>
                            <input type="radio" class="" id="patient-register-specialist"
                                name="healthy-patient">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="about-register-specialist" class="form-label">در صورتی که بیماری یا معلولیت خاصی
                            دارید وارد نمایید.</label>
                        <textarea class="form-control form-bg-color bg-white" id="about-register-specialist" placeholder="توضیحات"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="identificationCard-register-specialist" class="form-label">آپلود تصویر کارت
                            شناسایی</label>
                        <input type="file" class="form-control" id="identificationCard-register-specialist"
                            placeholder="اضافه کردن نمونه کار">
                    </div>

                    <div class="mb-3">
                        <label for="citizenshipCode-register-specialist" class="form-label">کد شهروندی</label>
                        <input type="text" class="form-control" id="citizenshipCode-register-specialist">
                    </div>

                    <div class="mb-3">
                        <label for="date-register-doc" class="form-label">تصویر گوایی مهارت خود را وارد کنید.</label>
                        <input type="file" class="form-control" id="date-register-doc" placeholder="اضافه کردن نمونه کار">
                    </div>



                    <!--استان محل سکونت-->
                    <div class="mb-3">
                        <label for="state-register-specialist" class="form-label"> استان محل سکونت</label>
                        <select class="form-select" id="state-register-specialist">
                            <option id="state_0" value="0" selected>فارس</option>
                            <option id="state_1" value="1">تهران</option>
                            <option id="state_2" value="2">اصفهان</option>
                        </select>
                    </div>

                    <!--شهرهای مرتبط به هر استان   --  start -->
                    <!--فارس-->
                    <div class="cities mb-3">
                        <label for="city-register-specialist-fars" class="form-label">شهر محل سکونت </label>
                        <select class="form-select" id="city-register-specialist-fars">
                            <option value="shiraz">شیراز</option>
                            <option value="tehran">فسا</option>
                            <option value="esfahan">اقلید</option>
                        </select>
                    </div>

                    <!--تهران-->
                    <div class="cities mb-3 d-none">
                        <label for="city-register-specialist-tehran" class="form-label">شهر محل سکونت</label>
                        <select class="form-select" id="city-register-specialist-tehran">
                            <option value="shiraz">تهران</option>
                            <option value="tehran">تهران</option>
                            <option value="esfahan">تهران</option>
                        </select>
                    </div>

                    <!--اصفهان-->
                    <div class="cities mb-3 d-none">
                        <label for="city-register-specialis-esfahan" class="form-label">شهر محل سکونت</label>
                        <select class="form-select" id="city-register-specialist-esfahan">
                            <option value="shiraz">اصفهان</option>
                            <option value="tehran">اصفهان</option>
                            <option value="esfahan">اصفهان</option>
                        </select>
                    </div>
                    <!--شهرهای مرتبط به هر استان   --  end -->



                    <div class="mb-3">
                        <label for="address-register-specialist" class="form-label ">آدرس</label>
                        <textarea class="form-control bg-white" id="address-register-specialist" placeholder="آدرس"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="houseNumber-register-specialist" class="form-label">پلاک</label>
                        <input type="text" class="form-control" id="houseNumber-register-specialist">
                    </div>

                    <div class="mb-3">
                        <label for="houseNumberCode-register-specialist" class="form-label">کد پستی</label>
                        <input type="text" class="form-control" id="houseNumberCode-register-specialist">
                    </div>


                    <!--استان محل خدمت-->
                    <div class="mb-3">
                        <label for="work_state-register-specialist" class="form-label"> استان محل خدمت</label>
                        <select class="form-select" id="work_state-register-specialist">
                            <option id="work_state_0" value="0" selected>فارس</option>
                            <option id="work_state_1" value="1">تهران</option>
                            <option id="work_state_2" value="2">اصفهان</option>
                        </select>
                    </div>

                    <!--شهرهای مرتبط به هر استان   --  start -->
                    <!--فارس-->
                    <div class="work_cities mb-3">
                        <label for="work_city-register-specialist-fars" class="form-label">شهر محل خدمت </label>
                        <select class="form-select" id="work_city-register-specialist-fars">
                            <option value="shiraz">شیراز</option>
                            <option value="tehran">فسا</option>
                            <option value="esfahan">اقلید</option>
                        </select>
                    </div>

                    <!--تهران-->
                    <div class="work_cities mb-3 d-none">
                        <label for="work_city-register-specialist-tehran" class="form-label">شهر محل خدمت</label>
                        <select class="form-select" id="work_city-register-specialist-tehran">
                            <option value="shiraz">تهران</option>
                            <option value="tehran">تهران</option>
                            <option value="esfahan">تهران</option>
                        </select>
                    </div>

                    <!--اصفهان-->
                    <div class="work_cities mb-3 d-none">
                        <label for="work_city-register-specialis-esfahan" class="form-label">شهر محل خدمت</label>
                        <select class="form-select" id="work_city-register-specialist-esfahan">
                            <option value="shiraz">اصفهان</option>
                            <option value="tehran">اصفهان</option>
                            <option value="esfahan">اصفهان</option>
                        </select>
                    </div>
                    <!--شهرهای مرتبط به هر استان   --  end -->




                    <h2>انتخاب مهارت</h2>
                    <div class=" d-flex pe-2 ps-2 flex-row lightblue border">
                        <button class="btn" type="submit"> <i class="fa-solid fa-magnifying-glass"></i> </button>
                        <input class="form-control" id="form-control-register-specialist" type="search"
                            placeholder="Search" aria-label="Search">
                    </div>


                    <div class="mt-2 form-control-register-specialist-div ">
                        <div class="row d-flex gap-2 justify-content-center mb-2  ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-3">لوازم خانگی نصب و تعمیر</div>
                        </div>

                    </div>

                    <div class="mt-2 form-control-register-specialist-div2 d-none">

                        <div class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                            <p>باربری و جابجایی</p>

                            <button class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                onClick="backToCategories()">بازگشت به دسته</button>

                        </div>




                        <div class="mb-3 d-flex justify-content-around">



                            <div><label for="idSkill1" class="form-label">پمپ و منبع آب1</label>
                                <input type="checkbox" class="" id="idSkill1">
                            </div>

                            <div>
                                <label for="idSkill2 " class="form-label me-5">1نصب روشویی</label>
                                <input type="checkbox" class="" id="idSkill2 ">
                            </div>


                            <div>
                                <label for="idSkill3" class="form-label me-5">تعمییر</label>
                                <input type="checkbox" class="" id="idSkill3">
                            </div>


                        </div>

                        <div class="mb-3 d-flex justify-content-around">



                            <div><label for="idSkill4" class="form-label">پمپ و منبع آب1</label>
                                <input type="checkbox" class="" id="idSkill4">
                            </div>

                            <div>
                                <label for="idSkill5 " class="form-label me-5">1نصب روشویی</label>
                                <input type="checkbox" class="" id="idSkill5 ">
                            </div>


                            <div>
                                <label for="idSkill6" class="form-label me-5">تعمییر</label>
                                <input type="checkbox" class="" id="idSkill6">
                            </div>




                        </div>


                    </div>

                    <div class="mt-2  form-control-register-specialist-div2 d-none">

                        <div class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                            <p>باربری و جابجایی</p>

                            <button class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                onClick="backToCategories()">بازگشت به دسته</button>

                        </div>




                        <div class="mb-3 d-flex justify-content-around">



                            <div><label for="idSkill7" class="form-label">پمپ و منبع آب2</label>
                                <input type="checkbox" class="" id="idSkill7">
                            </div>

                            <div>
                                <label for="idSkill8 " class="form-label me-5">2نصب روشویی</label>
                                <input type="checkbox" class="" id="idSkill8 ">
                            </div>


                            <div>
                                <label for="idSkill9" class="form-label me-5">تعمییر</label>
                                <input type="checkbox" class="" id="idSkill9">
                            </div>


                        </div>

                        <div class="mb-3 d-flex justify-content-around">



                            <div><label for="idSkill10" class="form-label">پمپ و منبع آب1</label>
                                <input type="checkbox" class="" id="idSkill10">
                            </div>

                            <div>
                                <label for="idSkill11 " class="form-label me-5">1نصب روشویی</label>
                                <input type="checkbox" class="" id="idSkill11 ">
                            </div>


                            <div>
                                <label for="idSkill12" class="form-label me-5">تعمییر</label>
                                <input type="checkbox" class="" id="idSkill12">
                            </div>




                        </div>


                    </div>




                    <div class="w-100 mt-5">
                        <div class="mb-3">
                            <label for="bank-account-number" class="form-label">شماره حساب</label>
                            <input type="text" class="form-control" id="bank-account-number">
                        </div>
                        <div class="mb-3">
                            <label for="credit-card" class="form-label">کارت اعتباری</label>
                            <input type="text" class="form-control" id="credit-card">
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
                </form>
            </div>

            <div class="col-md-4 border-start d-none d-md-block m-0 lightblue">
                <img src="image/GroupPhoto.png" class=" pt-2 w-100 h-auto sticky-top" alt="">
            </div>

        </section>
    @else
        <section class="row">
            <div
                class="col-12 col-md-8 border border-2 border-dark rounded-3 d-flex flex-column justify-content-center p-5 align-items-center">
                <h1 class="mb-4"> specialist sign-up </h1>

                <form class="col-12">

                    <div class="row">
                        <div class="col-md-6 col-12 mb-3">
                            <label for="name-register-specialist" class="form-label">fname</label>
                            <input type="text" class="form-control" id="name-register-specialist">
                        </div>
                        <div class="col-md-6 col-12 mb-3">
                            <label for="fname-register-specialist" class="form-label">lname</label>
                            <input type="text" class="form-control" id="fname-register-specialist">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email-register-specialist" class="form-label"> email </label>
                        <input type="email" class="form-control" id="email-register-specialist">
                    </div>


                    <!--mobile,birthdate,gender-->
                    <div class="container-fluid p-0 mb-3">
                        <div class="row gap-md-1 gap-lg-0 gy-3 ">
                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="phone" class="form-label">mobile</label><br>
                                <div class="w-100">
                                    <input name="phone" type="text" id="phone"
                                        class="border-gray border-1 rounded-3 pt-2 pb-1 w-100" />
                                </div>
                            </div>

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="date-register-specialist" class="form-label w-50">birth date</label>
                                <input type="date" class="form-control" id="date-register-specialist">
                            </div>

                            <div class="col-xl-4 col-md-6 col-12">
                                <label for="gender-register-specialist" class="form-label">gender</label>
                                <div class="border border-1 rounded-3 pt-1 pe-1 ps-1 text-center">
                                    <input type="radio" class="" id="men-register-specialist"
                                        name="gender-register-specialist">
                                    <label for="men-register-specialist" class="form-label">male</label>
                                    <input type="radio" class="ms-5" id="woman-register-specialist"
                                        name="gender-register-specialist">
                                    <label for="woman-register-specialist " class="form-label">female</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="mb-4">
                        <label for="pass-register-specialist" class="form-label"> password </label>
                        <input type="password" class="form-control" id="pass-register-specialist">
                    </div>

                    <div class="mb-3 d-flex justify-content-around flex-column flex-md-row">
                        <div>
                            <label for="healthy-register-specialist" class="form-label"> salem hastam! </label>
                            <input type="radio" class="" id="healthy-register-specialist"
                                name="healthy-patient">
                        </div>
                        <div>
                            <label for="patient-register-specialist" class="form-label"> bimar hastam! </label>
                            <input type="radio" class="" id="patient-register-specialist"
                                name="healthy-patient">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="about-register-specialist" class="form-label"> dar soorati ke bimari darid vared
                            konid.</label>
                        <textarea class="form-control form-bg-color bg-white" id="about-register-specialist" placeholder="..."></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="identificationCard-register-specialist" class="form-label">
                            upload kart shenasaei</label>
                        <input type="file" class="form-control" id="identificationCard-register-specialist">
                    </div>

                    <div class="mb-3">
                        <label for="citizenshipCode-register-specialist" class="form-label">code shahrvandi</label>
                        <input type="text" class="form-control" id="citizenshipCode-register-specialist">
                    </div>

                    <div class="mb-3">
                        <label for="date-register-doc" class="form-label">tasvir govahi maharat</label>
                        <input type="file" class="form-control" id="date-register-doc">
                    </div>



                    <!--استان محل سکونت-->
                    <div class="mb-3">
                        <label for="state-register-specialist" class="form-label"> mahale sokoonat(ostan)</label>
                        <select class="form-select" id="state-register-specialist">
                            <option id="state_0" value="0" selected>fars</option>
                            <option id="state_1" value="1">tehran</option>
                            <option id="state_2" value="2">esfahan</option>
                        </select>
                    </div>

                    <!--شهرهای مرتبط به هر استان   --  start -->
                    <!--فارس-->
                    <div class="cities mb-3">
                        <label for="city-register-specialist-fars" class="form-label">mahale sokoonat(shahr) </label>
                        <select class="form-select" id="city-register-specialist-fars">
                            <option value="shiraz">shiraz</option>
                            <option value="tehran">fasa</option>
                            <option value="esfahan">eghlid</option>
                        </select>
                    </div>

                    <!--تهران-->
                    <div class="cities mb-3 d-none">
                        <label for="city-register-specialist-tehran" class="form-label">mahale sokoonat(shahr) </label>
                        <select class="form-select" id="city-register-specialist-tehran">
                            <option value="shiraz">tehran</option>
                            <option value="tehran">rey</option>
                            <option value="esfahan">golpayegan</option>
                        </select>
                    </div>

                    <!--اصفهان-->
                    <div class="cities mb-3 d-none">
                        <label for="city-register-specialis-esfahan" class="form-label">mahale sokoonat(shahr) </label>
                        <select class="form-select" id="city-register-specialist-esfahan">
                            <option value="shiraz">esfahan</option>
                            <option value="tehran">esfahan</option>
                            <option value="esfahan">esfahan</option>
                        </select>
                    </div>
                    <!--شهرهای مرتبط به هر استان   --  end -->




                    <div class="mb-3">
                        <label for="address-register-specialist" class="form-label ">addrs</label>
                        <textarea class="form-control bg-white" id="address-register-specialist" placeholder="addr"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="houseNumber-register-specialist" class="form-label">pelak</label>
                        <input type="text" class="form-control" id="houseNumber-register-specialist">
                    </div>
                    <div class="mb-3">
                        <label for="houseNumberCode-register-specialist" class="form-label">code posti</label>
                        <input type="text" class="form-control" id="houseNumberCode-register-specialist">
                    </div>



                    <!--استان محل خدمت-->
                    <div class="mb-3">
                        <label for="work_state-register-specialist" class="form-label"> mahale khedmat(ostan) </label>
                        <select class="form-select" id="work_state-register-specialist">
                            <option id="state_0" value="0" selected>fars</option>
                            <option id="state_1" value="1">tehran</option>
                            <option id="state_2" value="2">esfahan</option>
                        </select>
                    </div>

                    <!--شهرهای مرتبط به هر استان   --  start -->
                    <!--فارس-->
                    <div class="work_cities mb-3">
                        <label for="work_city-register-specialist-fars" class="form-label"> mahale khedmat(shahr)
                        </label>
                        <select class="form-select" id="work_city-register-specialist-fars">
                            <option value="shiraz">shiraz</option>
                            <option value="tehran">fasa</option>
                            <option value="esfahan">eghlid</option>
                        </select>
                    </div>

                    <!--تهران-->
                    <div class="work_cities mb-3 d-none">
                        <label for="work_city-register-specialist-tehran" class="form-label">mahale
                            khedmat(shahr)</label>
                        <select class="form-select" id="work_city-register-specialist-tehran">
                            <option value="shiraz">tehran</option>
                            <option value="tehran">rey</option>
                            <option value="esfahan">golpayegan</option>
                        </select>
                    </div>

                    <!--اصفهان-->
                    <div class="work_cities mb-3 d-none">
                        <label for="work_city-register-specialis-esfahan" class="form-label"> mahale
                            khedmat(shahr)</label>
                        <select class="form-select" id="work_city-register-specialist-esfahan">
                            <option value="shiraz">esfahan</option>
                            <option value="tehran">esfahan</option>
                            <option value="esfahan">esfahan</option>
                        </select>
                    </div>
                    <!--شهرهای مرتبط به هر استان   --  end -->



                    <h2> entekhabe maharat </h2>
                    <div class=" d-flex pe-2 ps-2 flex-row lightblue border">
                        <button class="btn" type="submit"> <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <input class="form-control" id="form-control-register-specialist" type="search"
                            placeholder="Search" aria-label="Search">
                    </div>


                    <div class="mt-2 form-control-register-specialist-div ">
                        <div class="row d-flex gap-2 justify-content-center mb-2  ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                        </div>
                        <div class="row d-flex gap-2 justify-content-center mb-2 ">
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                            <div class="col-3 border-redius-20 border-darkgreen border-4 p-2"> nasb o tamir lavazem khanegi
                            </div>
                        </div>
                    </div>



                    <!--sub category 1-->
                    <div class="mt-2 form-control-register-specialist-div2 d-none">

                        <div class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                            <p class="ms-2 mt-2"> barbari o jabejaei </p>

                            <button class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                onClick="backToCategories()"> back to category </button>

                        </div>


                        <div class="mb-3 d-flex justify-content-around">
                            <div><label for="idSkill1" class="form-label"> pomp ab 1 </label>
                                <input type="checkbox" class="" id="idSkill1">
                            </div>

                            <div>
                                <label for="idSkill2 " class="form-label ms-5"> nasb 1 </label>
                                <input type="checkbox" class="" id="idSkill2 ">
                            </div>


                            <div>
                                <label for="idSkill3" class="form-label ms-5"> tamir 1 </label>
                                <input type="checkbox" class="" id="idSkill3">
                            </div>

                        </div>

                        <div class="mb-3 d-flex justify-content-around">
                            <div><label for="idSkill4" class="form-label"> pomp ab 1 </label>
                                <input type="checkbox" class="" id="idSkill4">
                            </div>

                            <div>
                                <label for="idSkill5 " class="form-label ms-5"> nasb 1 </label>
                                <input type="checkbox" class="" id="idSkill5 ">
                            </div>

                            <div>
                                <label for="idSkill6" class="form-label mes-5"> tamir 1 </label>
                                <input type="checkbox" class="" id="idSkill6">
                            </div>
                        </div>


                    </div>


                    <!--sub category 2-->
                    <div class="mt-2 form-control-register-specialist-div2 d-none">

                        <div class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                            <p class="ms-2 mt-2"> barbari o jabejaei </p>

                            <button class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                onClick="backToCategories()"> back to category </button>

                        </div>


                        <div class="mb-3 d-flex justify-content-around">
                            <div><label for="idSkill7" class="form-label"> pomp ab 1 </label>
                                <input type="checkbox" class="" id="idSkill7">
                            </div>

                            <div>
                                <label for="idSkill8" class="form-label ms-5"> nasb 1 </label>
                                <input type="checkbox" class="" id="idSkill8">
                            </div>


                            <div>
                                <label for="idSkill9" class="form-label ms-5"> tamir 1 </label>
                                <input type="checkbox" class="" id="idSkill9">
                            </div>

                        </div>

                        <div class="mb-3 d-flex justify-content-around">
                            <div><label for="idSkill10" class="form-label"> pomp ab 1 </label>
                                <input type="checkbox" class="" id="idSkill10">
                            </div>

                            <div>
                                <label for="idSkill11" class="form-label ms-5"> nasb 1 </label>
                                <input type="checkbox" class="" id="idSkill11">
                            </div>

                            <div>
                                <label for="idSkill12" class="form-label mes-5"> tamir 1 </label>
                                <input type="checkbox" class="" id="idSkill12">
                            </div>
                        </div>


                    </div>




                    <div class="w-100 mt-4">
                        <div class="mb-3">
                            <label for="bank-account-number" class="form-label">shomare hesab</label>
                            <input type="text" class="form-control" id="bank-account-number">
                        </div>
                        <div class="mb-3">
                            <label for="credit-card" class="form-label">kart etebari</label>
                            <input type="text" class="form-control" id="credit-card">
                        </div>

                        <div class="mb-3 ">
                            <input type="checkbox" required="required" class="form-check-input"
                                id="check-register-specialist">
                            <label class="form-check-label ms-1" for="check-register-specialist">
                                Ghavanin ra ghabool daram.
                            </label>
                        </div>


                        <div class="d-flex mb-3 gap-3">
                            <a href="index.html"
                                class="btn text-decoration-none btn-outline-dark w-100 mt-4 border-redius-20 font-size32">cancel</a>
                            <button type="submit"
                                class=" w-100  mt-4 darkYellow border-redius-20 font-size32">submit</button>
                        </div>

                    </div>



                </form>




            </div>

            <div class="col-md-4 border-start d-none d-md-block m-0 lightblue">
                <img src="{{ asset('frontend/fixy-land-fa-main/image/GroupPhoto.png') }}"
                    class=" pt-2 w-100 h-auto sticky-top" alt="">
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
