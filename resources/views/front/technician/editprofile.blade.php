@extends('front.technician.layouts.master')
@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        پل متخصص
    @else
        technician panel
    @endif
@endsection

@section('tec_panel')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
  
                    <div class="d-flex flex-column justify-content-center p-4 pt-2 align-items-center w-100">
                        <h1 class="mb-5"> ویرایش پروفایل من </h1>
                        <section class="bg-white w-100">

                            <!--swiper menu-->
                            <div class="swiper mySwiper w-100">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 darkYellow rounded p-1">پروفایل</div>
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">آدرس</div>
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">مهارت های من</div>
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">اطلاعات بانکی</div>
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">نمونه کار</div>
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">مدارک فنی</div>
                                </div>
                            </div>



                            <!--submenu-->
                            <div class=" w-100 p-4 border border-3">

                                <!--پروفایل-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  ">
                                    <form class="col-12"
                                        action="{{ route('front.technician.panel.update.profile') }}" method="post">
                                        @csrf
                                        <div class="row mb-2">
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="name-register-specialist" class="form-label">نام</label>
                                                <input type="text" class="form-control" name="firstname"
                                                    value="{{ auth()->user()->firstname }}" id="name-register-specialist">
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="fname-register-specialist" class="form-label">نام
                                                    خانوادگی</label>
                                                <input value="{{ auth()->user()->lastname }}" type="text" name="lastname"
                                                    class="form-control" id="fname-register-specialist">
                                            </div>
                                        </div>

                                        <div class="container-fluid p-0 mb-3">
                                            <div class="row gap-md-1 gap-lg-0 gy-3 ">

                                                <div class="col-xl-4 col-md-6 col-12">
                                                    <label for="gender-register-specialist"
                                                        class="form-label">جنسیت</label>
                                                    <div
                                                        class="border border-1 rounded-3 pt-1 ps-3 pe-3 text-center form-bg-color">
                                                        <label for="men-register-specialist"
                                                            class="form-label">مرد</label>
                                                        @if (auth()->user()->techinfo->gender == 0)
                                                            <input name="gender[]" checked value="0" type="radio"
                                                                class="" id="men-register-specialist"
                                                                name="gender-register-specialist">
                                                        @else
                                                            <input name="gender[]" value="0" type="radio"
                                                                class="" id="men-register-specialist"
                                                                name="gender-register-specialist">
                                                        @endif
                                                        <label for="woman-register-specialist "
                                                            class="form-label me-5">زن</label>

                                                        @if (auth()->user()->techinfo->gender == 1)
                                                            <input name="gender[]" checked value="1" type="radio"
                                                                class="" id="woman-register-specialist"
                                                                name="gender-register-specialist">
                                                        @else
                                                            <input name="gender[]" value="1" type="radio"
                                                                class="" id="woman-register-specialist"
                                                                name="gender-register-specialist">
                                                        @endif

                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-md-6 col-12">
                                                    <label for="date-register-specialist" class="form-label w-50">تاریخ
                                                        تولد</label>
                                                    <input name="birthday"
                                                        value="{{ auth()->user()->techinfo->birthday }}" type="date"
                                                        class="form-control" id="date-register-specialist">
                                                </div>

                                                <div class="col-xl-4 col-md-6 col-12">
                                                    <label for="phone" class="form-label">شماره موبایل</label><br>
                                                    <div class="w-100">
                                                        <input value="{{ auth()->user()->phone }}" name="phone"
                                                            type="text" id="phone"
                                                            class="border-gray border-1 rounded-3 pt-2 pb-1 w-100" />
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label for="email-register-specialist" class="form-label">ایمیل</label>
                                            <input type="email" name="email" value="{{ auth()->user()->email }}"
                                                class="form-control" id="email-register-specialist">
                                        </div>

                                        <div class="mb-3 d-flex justify-content-around flex-column flex-md-row">
                                            <div>
                                                <label for="healthy-register-specialist" class="form-label">سالم
                                                    هستم</label>
                                                @if (auth()->user()->techinfo->health_status == 1)
                                                    <input type="radio" checked class=""
                                                        id="healthy-register-specialist" name="healthy-patient">
                                                @else
                                                    <input type="radio" class=""
                                                        id="healthy-register-specialist" name="healthy-patient">
                                                @endif
                                            </div>
                                            <div>
                                                <label for="patient-register-specialist" class="form-label">بیمار
                                                    هستم</label>
                                                @if (auth()->user()->techinfo->health_status == 0)
                                                    <input type="radio" checked class=""
                                                        id="patient-register-specialist" name="healthy-patient">
                                                @else
                                                    <input type="radio" class=""
                                                        id="patient-register-specialist" name="healthy-patient">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="about-register-specialist" class="form-label">در صورتی که
                                                بیماری یا معلولیت خاصی دارید وارد نمایید.</label>
                                            <textarea class="form-control form-bg-color" id="about-register-specialist"
                                                placeholder="توضیحات">{{ auth()->user()->techinfo->health_description }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="identificationCard-register-specialist"
                                                class="form-label">آپلود کارت شناسایی</label>
                                            <input type="file" class="form-control"
                                                id="identificationCard-register-specialist"
                                                placeholder="اضافه کردن نمونه کار">
                                        </div>

                                        <div class="mb-3">
                                            <label for="citizenshipCode-register-specialist" class="form-label">کد
                                                شهروندی</label>
                                            <input type="text" name="citizen_code" class="form-control"
                                                value="{{ auth()->user()->techinfo->citizen_code }}"
                                                id="citizenshipCode-register-specialist">
                                        </div>


                                        <div class="d-flex mb-3 gap-3">
                                            <button type="reset"
                                                class="w-100 mt-4 border-redius-20 font-size32">لغو</button>
                                            <button type="submit"
                                                class=" w-100  mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                                        </div>

                                    </form>
                                </div>


                                <!--آدرس-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly d-none ">
                                    <form class="col-12 col-md-6"
                                        action="{{ route('front.technician.panel.update.address') }}" method="post">
                                        @csrf
                                        <!----------------------------------------------------->
                                        <!--استان محل سکونت-->
                                        <div class="mb-3">
                                            <label for="state-register-specialist" class="form-label"> استان </label>
                                            <select class="form-select" name="state_id" id="state-register-specialist">
                                                <option value="{{ auth()->user()->address->state->id }}" selected>
                                                    {{ auth()->user()->address->state->name }}
                                                </option>
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
                                            <label for="city-register-specialist-nothing" class="form-label">شهر
                                            </label>
                                            <select class="form-select" id="city-register-specialist-nothing">
                                                <option value="{{ auth()->user()->address->city->id }}" selected>
                                                    {{ auth()->user()->address->city->name }}
                                                </option>
                                            </select>
                                        </div>


                                        <div class="cities mb-3" id="maincitydiv">
                                            <label for="city-register-specialist-nothing1" class="form-label">شهر
                                            </label>
                                            <select class="form-select" id="select-city">

                                            </select>
                                        </div>


                                        <!----------------------------------------------------->
                                        محل خدمت
                                        <div class="mb-3">
                                            <label for="state-register-specialist" class="form-label"> استان </label>
                                            <select class="form-select" name="state_id_expert"
                                                id="state-register-specialist-expert">
                                                <option value="{{ auth()->user()->techinfo->servicestate->id }}"
                                                    selected>
                                                    {{ auth()->user()->techinfo->servicestate->name }}
                                                </option>
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
                                        <div class="cities mb-3" id="maincitydivexpert">
                                            <label for="city-register-specialist-nothing" class="form-label">شهر
                                            </label>
                                            <select class="form-select" id="city-register-specialist-nothing">
                                                <option value="{{ auth()->user()->techinfo->servicecity->id }}" selected>
                                                    {{ auth()->user()->techinfo->servicecity->name }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="cities mb-3 mi2" id="maincitydivexpert">
                                            <select class="form-select" id="city-expert">
                                            </select>
                                        </div>
                                        <!----------------------------------------------------->

                                        <div class="mb-3">
                                            <label for="address-register-specialist" class="form-label">آدرس</label>
                                            <textarea class="form-control form-bg-color" id="address-register-specialist" name="address_description"
                                                placeholder="آدرس">{{ auth()->user()->address->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="houseNumberCode-register-specialist"
                                                class="form-label">پلاک</label>
                                            <input value="{{ auth()->user()->techinfo->pelak }}" type="text"
                                                class="form-control" id="houseNumberCode-register-specialist">
                                        </div>
                                        <div class="d-flex mb-3 gap-3">
                                            <button type="reset"
                                                class="w-100 mt-4 border-redius-20 font-size32">لغو</button>
                                            <button type="submit"
                                                class=" w-100  mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                                        </div>
                                        <input type="hidden" name="city_id"
                                            value="{{ auth()->user()->address->city->name }}" id="city_id">
                                        <input type="hidden" name="city_id_expert"
                                            value="{{ auth()->user()->techinfo->servicecity->name }}"
                                            id="city_id_expert">
                                    </form>
                                </div>


                                <!--مهارت من-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  d-none">
                                    <div class="col-12 col-md-10">

                                        <div class="row">

                                            <div class="col-12 col-md-8  ">

                                                <!--باکس مهارت ها-->
                                                <div class="mt-2 vh-100 form-control-register-specialist-div">
                                                    <div class="row d-flex gap-2 justify-content-center mb-2  ">
                                                        @if (count(auth()->user()->skills) > 0)
                                                            <div
                                                                class="col-3 border-redius-20 border-darkgreen border-4 p-3">
                                                                {{ auth()->user()->skills[0]->category->name }}
                                                            </div>
                                                        @else
                                                            @foreach ($categorylangs as $categorylang)
                                                                @php
                                                                    $category = $categorylang->langable;
                                                                @endphp
                                                                <div
                                                                    class="col-3 border-redius-20 border-darkgreen border-4 p-3">
                                                                    {{ $category->name }}
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>

                                                    <!--پیشنهاد تخصص جدید-->
                                                    <div class="spc-new-req row d-flex gap-2 justify-content-center mb-2 ">
                                                        <div
                                                            class="col-3 border-redius-20 border-darkgreen border-4 p-3 text-center">
                                                            <a href="spc-new-req-form.html"
                                                                class="text-decoration-none text-black">
                                                                <i class="fa-solid fa-plus"></i>
                                                                پیشنهاد تخصص جدید
                                                            </a>
                                                        </div>
                                                    </div>


                                                </div>




                                                @if (count(auth()->user()->skills) > 0)
                                                    @php
                                                        $category = auth()->user()->skills[0]->category;
                                                    @endphp
                                                    <div class="mt-2 vh-100 form-control-register-specialist-div2 d-none">

                                                        <div
                                                            class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                                                            <p>{{ $category->name }}</p>

                                                            <button
                                                                class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                                                onClick="backToCategories()">بازگشت به دسته</button>

                                                        </div>

                                                        <div>
                                                            <div class="mb-3 row">
                                                                @php
                                                                    // get all skills
                                                                    $allskills = [];
                                                                    foreach (auth()->user()->skills as $sk) {
                                                                        array_push($allskills, $sk->service_sub_categoy_id);
                                                                    }
                                                                @endphp

                                                                @foreach ($category->subcategories as $subcategory)
                                                                    <form class="col-6" method="post"
                                                                        action="{{ route('front.technician.panel.update.skill', $subcategory->id) }}">
                                                                        @csrf
                                                                        @if (in_array($subcategory->id, $allskills))
                                                                            <button type="submit"
                                                                                class="mt-4 border-0 darkgreen p-2 rounded-3 text-light">{{ $subcategory->name }}</button>
                                                                        @else
                                                                            <button type="submit"
                                                                                class="mt-4 darkYellow border-0 lightgray p-2 rounded-3">{{ $subcategory->name }}</button>
                                                                        @endif
                                                                    </form>
                                                                @endforeach
                                                            </div>
                                                        </div>


                                                    </div>
                                                @else
                                                    @foreach ($categorylangs as $categorylang)
                                                        @php
                                                            $category = $categorylang->langable;
                                                        @endphp
                                                        <div
                                                            class="mt-2 vh-100 form-control-register-specialist-div2 d-none">

                                                            <div
                                                                class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                                                                <p>{{ $category->name }}</p>

                                                                <button
                                                                    class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                                                    onClick="backToCategories()">بازگشت به دسته</button>

                                                            </div>

                                                            <div>
                                                                <div class="mb-3 row">
                                                                    @foreach ($category->subcategories as $subcategory)
                                                                        <form method="post" class="col-6"
                                                                            action="{{ route('front.technician.panel.update.skill', $subcategory->id) }}">
                                                                            @csrf

                                                                            <button type="submit"
                                                                                class="mt-4 darkYellow border-0 lightgray p-2 rounded-3">{{ $subcategory->name }}</button>

                                                                        </form>
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif




                                            </div>



                                            <div class="col-12 col-md-4 ">

                                                <div class="lightblue text-center">
                                                    <p>تخصص های که شما انتخاب کرده اید.</p>
                                                </div>
                                                <div
                                                    class="border border-dark d-flex flex-column align-content-between  overflow-auto">

                                                    <ul class="list-group form-control-register-specialist-ul">
                                                        <li class="list-group-item ">
                                                            @foreach (auth()->user()->skills as $skill)
                                                                <form class="d-flex justify-content-between" method="post"
                                                                    action="{{ route('front.technician.panel.update.skill', $skill->subcategory->id) }}">
                                                                    @csrf
                                                                    <p>{{ $skill->subcategory->name }}</p><button
                                                                        type=" submit" class="border-0 bg-white"><i
                                                                            class="fa-solid fa-trash-can"></i></button>
                                                                </form>
                                                            @endforeach

                                                        </li>

                                                    </ul>

                                                    @if (count(auth()->user()->skills) == 0)
                                                        <p class="text-center text-danger ">در حال حاضر مهارتی انتخاب نشوده
                                                        </p>
                                                    @endif


                                                </div>


                                            </div>



                                        </div>


                                    </div>


                                </div>


                                <!--اطلاعات بانکی-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  d-none">
                                    <form class="col-12 col-md-6"
                                        action="{{ route('front.technician.panel.update.bankinfo') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="bank-account-number" class="form-label">شماره حساب</label>
                                            <input type="text" class="form-control"
                                                value="{{ auth()->user()->bankinfo->account_number }}"
                                                name="account_number" id="bank-account-number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="credit-card" class="form-label">کارت اعتباری</label>
                                            <input type="text" class="form-control"
                                                value="{{ auth()->user()->bankinfo->credit_card }}" name="credit_card"
                                                id="credit-card">
                                        </div>
                                        <div class="d-flex mb-3 gap-3">
                                            <button type="reset"
                                                class="w-100 mt-4 border-redius-20 font-size32">لغو</button>
                                            <button type="submit"
                                                class=" w-100  mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                                        </div>
                                    </form>
                                </div>


                                <!--نمونه کار ها-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  d-none">
                                    <section class="col-12 col-md-6">

                                        <div class="row d-flex justify-content-evenly gy-2  gap-2" id="input-demo1">
                                            <div class="col-5 col-md-3 d-flex lightblue text-center rounded align-items-center"
                                                onClick="goInputDemo()">
                                                <p>اضافه کردن نمونه کار+</p>
                                            </div>

                                            @foreach (auth()->user()->portfolios as $portfolio)
                                                <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                    <div>
                                                        <form
                                                            action="{{ route('front.technician.panel.delete.portfolio', $portfolio->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button class="btn" type="submit">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset($portfolio->path) }}" class="w-100 h-auto"
                                                            alt="{{ $portfolio->alt }}"
                                                            title="{{ $portfolio->name }}">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>



                                        <div class="row d-flex justify-content-center gy-2  gap-2 d-none" id="input-demo2">
                                            <form class=""
                                                action="{{ route('front.technician.panel.add.portfolio') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="date-register-demo" class="form-label">اضافه کردن نمونه
                                                        کار</label>
                                                    <input type="file" name="image" id="date-register-demo"
                                                        class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date-register-demo-text"
                                                        class="form-label">توضیحات</label>
                                                    <textarea id="date-register-demo-text" name="description" class="form-control"></textarea>
                                                </div>

                                                <div class="d-flex mb-3 gap-3">
                                                    <button type="reset" class="w-100 mt-4 border-redius-20 font-size32"
                                                        onClick="goInputDemo()">لغو</button>
                                                    <button type="submit"
                                                        class=" w-100  mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                                                </div>

                                            </form>
                                        </div>

                                    </section>
                                </div>


                                <!--مدارک فنی-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  d-none">
                                    <section class="col-12 col-md-6">

                                        <div class="row d-flex justify-content-evenly gy-2  gap-2" id="input-doc1">
                                            <div class="col-5 col-md-3 d-flex lightblue text-center rounded align-items-center"
                                                onClick="goInputDoc()">
                                                <p>اضافه کردن مدارک فنی+</p>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio1.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                        </div>



                                        <div class="row d-flex justify-content-center gy-2  gap-2 d-none" id="input-doc2">
                                            <form class="">

                                                <div class="mb-3">
                                                    <label for="date-register-doc" class="form-label">اضافه کردن مدارک
                                                        فنی+</label>
                                                    <input type="file" id="date-register-doc" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date-register-doc-title"
                                                        class="form-label">عنوان</label>
                                                    <input type="text" class="form-control" id="date-register-doc-title">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date-register-doc-text"
                                                        class="form-label">توضیحات</label>
                                                    <textarea id="date-register-doc-text" class="form-control">


                                        </textarea>
                                                </div>

                                                <div class="d-flex mb-3 gap-3">
                                                    <button type="reset" class="w-100 mt-4 border-redius-20 font-size32"
                                                        onClick="goInputDoc()">لغو</button>
                                                    <button type="submit"
                                                        class=" w-100  mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                                                </div>

                                            </form>
                                        </div>

                                    </section>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>





               


            
        
    @else
    <div class="d-flex flex-column justify-content-center pt-2 align-items-center w-100">
                        <h1 class="mb-5"> edit profile </h1>





                        <section class="bg-white w-100">
                            <!--swiper menu-->
                            <div class="swiper mySwiper w-100">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 darkYellow rounded p-1"> profile </div>
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1"> addrs </div>
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1"> maharat man </div>
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1"> etelat banki </div>
                                    <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1"> portfolio </div>
                                    <div class="swiper-slide w-auto rounded me-lg-5 ms-lg-5 p-1"> madarek fanni </div>
                                </div>
                            </div>



                            <!--submenu-->
                            <div class=" w-100 p-4 border border-3">
                                <!--پروفایل-->
                                <div class="row dastrasi-sari-grid d-flex m-0 justify-content-evenly">
                                    <form class="col-12"
                                        action="{{ route('front.technician.panel.update.profile') }}" method="post">
                                        @csrf
                                        <div class="row mb-2">
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="name-register-specialist"
                                                    class="form-label">firstname</label>
                                                <input type="text" value="{{ auth()->user()->firstname }}"
                                                    class="form-control" id="name-register-specialist">
                                            </div>
                                            <div class="col-md-6 col-12 mb-3">
                                                <label for="fname-register-specialist"
                                                    class="form-label">lastname</label>
                                                <input value="{{ auth()->user()->lastname }}" type="text"
                                                    class="form-control" id="fname-register-specialist">
                                            </div>
                                        </div>



                                        <div class="container-fluid p-0 mb-3">
                                            <div class="row gap-md-1 gap-lg-0 gy-3 ">
                                                <div class="col-xl-4 col-md-6 col-12">
                                                    <label for="phone" class="form-label">mobile</label><br>
                                                    <div class="w-100">
                                                        <input value="{{ auth()->user()->phone }}" name="phone"
                                                            type="text" id="phone"
                                                            class="border-gray border-1 rounded-3 pt-2 pb-1 w-100" />
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-md-6 col-12">
                                                    <label for="date-register-specialist" class="form-label w-50">birth
                                                        date</label>
                                                    <input value="{{ auth()->user()->techinfo->birhday }}"
                                                        name="birthday" type="date" class="form-control"
                                                        id="date-register-specialist">
                                                </div>

                                                <div class="col-xl-4 col-md-6 col-12">
                                                    <label for="gender-register-specialist"
                                                        class="form-label">gender</label>
                                                    <div
                                                        class="border border-1 rounded-3 pt-1 pe-1 ps-1 text-center form-bg-color">
                                                        <label for="man-register-specialist "
                                                            class="form-label me-5">mail</label>
                                                        @if (auth()->user()->techinfo->gender == 0)
                                                            <input name="gender[]" checked value="0" type="radio"
                                                                class="" id="men-register-specialist"
                                                                name="gender-register-specialist">
                                                        @else
                                                            <input name="gender[]" value="0" type="radio"
                                                                class="" id="men-register-specialist"
                                                                name="gender-register-specialist">
                                                        @endif
                                                        <label for="woman-register-specialist "
                                                            class="form-label me-5">femail</label>

                                                        @if (auth()->user()->techinfo->gender == 1)
                                                            <input name="gender[]" checked value="1" type="radio"
                                                                class="" id="woman-register-specialist"
                                                                name="gender-register-specialist">
                                                        @else
                                                            <input name="gender[]" value="1" type="radio"
                                                                class="" id="woman-register-specialist"
                                                                name="gender-register-specialist">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                        <div class="mb-4">
                                            <label for="email-register-specialist" class="form-label">email</label>
                                            <input type="email" name="emil" value="{{ auth()->user()->email }}"
                                                class="form-control" id="email-register-specialist">
                                        </div>

                                        <div class="mb-3 d-flex justify-content-around flex-column flex-md-row">
                                            <div>
                                                <label for="healthy-register-specialist"
                                                    class="form-label">Healthy!</label>
                                                @if (auth()->user()->techinfo->health_status == 1)
                                                    <input type="radio" checked class=""
                                                        id="healthy-register-specialist" name="healthy-patient">
                                                @else
                                                    <input type="radio" class=""
                                                        id="healthy-register-specialist" name="healthy-patient">
                                                @endif
                                            </div>
                                            <div>
                                                <label for="patient-register-specialist" class="form-label">Not
                                                    Healthy!</label>
                                                @if (auth()->user()->techinfo->health_status == 0)
                                                    <input type="radio" class="" checked
                                                        id="patient-register-specialist" name="healthy-patient">
                                                @else
                                                    <input type="radio" class=""
                                                        id="patient-register-specialist" name="healthy-patient">
                                                @endif
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="about-register-specialist" class="form-label">dar soorati ke
                                                bimari darid vared namaeed.</label>
                                            <textarea class="form-control form-bg-color" id="about-register-specialist"
                                                placeholder="description ...">{{ auth()->user()->techinfo->health_description == 0 }}</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="identificationCard-register-specialist" class="form-label">
                                                upload kart shenasaei
                                            </label>
                                            <input type="file" class="form-control"
                                                id="identificationCard-register-specialist" placeholder="add portfolio">
                                        </div>

                                        <div class="mb-3">
                                            <label for="citizenshipCode-register-specialist" class="form-label"> code
                                                shahrvandi</label>
                                            <input type="text" name="citizen_code"
                                                value="{{ auth()->user()->techinfo->citizen_code }}"
                                                class="form-control" id="citizenshipCode-register-specialist">
                                        </div>


                                        <div class="d-flex mb-3 gap-3">
                                            <button type="reset"
                                                class="w-100 mt-4 border-redius-20 font-size20 pt-2 pb-2">cancel</button>
                                            <button type="submit"
                                                class=" w-100  mt-4 darkYellow border-redius-20 font-size20 pt-2 pb-2">submit</button>
                                        </div>
                                    </form>
                                </div>


                                <!--آدرس-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly d-none ">
                                    <form class="col-12 col-md-6"
                                        action="{{ route('front.technician.panel.update.address') }}" method="post">
                                        @csrf
                                        <!----------------------------------------------------->
                                        <!--استان محل سکونت-->
                                        <div class="mb-3">
                                            <label for="state-register-specialist" class="form-label"> State </label>
                                            <select class="form-select" name="state_id" id="state-register-specialist">
                                                <option value="{{ auth()->user()->address->state->id }}" selected>
                                                    {{ auth()->user()->address->state->name }}
                                                </option>
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
                                            <label for="city-register-specialist-nothing" class="form-label">City
                                            </label>
                                            <select class="form-select" id="city-register-specialist-nothing">
                                                <option value="{{ auth()->user()->address->city->id }}" selected>
                                                    {{ auth()->user()->address->city->name }}
                                                </option>
                                            </select>
                                        </div>


                                        <div class="cities mb-3" id="maincitydiv">
                                            <label for="city-register-specialist-nothing1" class="form-label">City
                                            </label>
                                            <select class="form-select" id="select-city">

                                            </select>
                                        </div>


                                        <!----------------------------------------------------->
                                        Service Place
                                        <div class="mb-3">
                                            <label for="state-register-specialist" class="form-label"> State </label>
                                            <select class="form-select" name="state_id_expert"
                                                id="state-register-specialist-expert">
                                                <option value="{{ auth()->user()->techinfo->servicestate->id }}"
                                                    selected>
                                                    {{ auth()->user()->techinfo->servicestate->name }}
                                                </option>
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
                                        <div class="cities mb-3" id="maincitydivexpert">
                                            <label for="city-register-specialist-nothing" class="form-label">City
                                            </label>
                                            <select class="form-select" id="city-register-specialist-nothing">
                                                <option value="{{ auth()->user()->techinfo->servicecity->id }}" selected>
                                                    {{ auth()->user()->techinfo->servicecity->name }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="cities mb-3 mi2" id="maincitydivexpert">
                                            <select class="form-select" id="city-expert">
                                            </select>
                                        </div>
                                        <!----------------------------------------------------->

                                        <div class="mb-3">
                                            <label for="address-register-specialist" class="form-label">Address</label>
                                            <textarea class="form-control form-bg-color" id="address-register-specialist" name="address_description"
                                                placeholder="Adress">{{ auth()->user()->address->description }}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="houseNumberCode-register-specialist" class="form-label">house
                                                number</label>
                                            <input value="{{ auth()->user()->techinfo->pelak }}" type="text"
                                                class="form-control" id="houseNumberCode-register-specialist">
                                        </div>
                                        <div class="d-flex mb-3 gap-3">
                                            <button type="reset"
                                                class="w-100 mt-4 border-redius-20 font-size32">cansel</button>
                                            <button type="submit"
                                                class=" w-100  mt-4 darkYellow border-redius-20 font-size32">confirm</button>
                                        </div>
                                        <input type="hidden" name="city_id"
                                            value="{{ auth()->user()->address->city->name }}" id="city_id">
                                        <input type="hidden" name="city_id_expert"
                                            value="{{ auth()->user()->techinfo->servicecity->name }}"
                                            id="city_id_expert">
                                    </form>
                                </div>


                                <!--مهارت من-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  d-none">
                                    <div class="col-12 col-md-10">

                                        <div class="row">

                                            <div class="col-12 col-md-8  ">

                                                <!--باکس مهارت ها-->
                                                <div class="mt-2 vh-100 form-control-register-specialist-div">
                                                    <div class="row d-flex gap-2 justify-content-center mb-2  ">
                                                        @if (count(auth()->user()->skills) > 0)
                                                            <div
                                                                class="col-3 border-redius-20 border-darkgreen border-4 p-3">
                                                                {{ auth()->user()->skills[0]->category->name }}
                                                            </div>
                                                        @else
                                                            @foreach ($categorylangs as $categorylang)
                                                                @php
                                                                    $category = $categorylang->langable;
                                                                @endphp
                                                                <div
                                                                    class="col-3 border-redius-20 border-darkgreen border-4 p-3">
                                                                    {{ $category->name }}
                                                                </div>
                                                            @endforeach
                                                        @endif

                                                    </div>

                                                    <!--پیشنهاد تخصص جدید-->
                                                    <div class="spc-new-req row d-flex gap-2 justify-content-center mb-2 ">
                                                        <div
                                                            class="col-3 border-redius-20 border-darkgreen border-4 p-3 text-center">
                                                            <a href="spc-new-req-form.html"
                                                                class="text-decoration-none text-black">
                                                                <i class="fa-solid fa-plus"></i>
                                                                Ask for Skill
                                                            </a>
                                                        </div>
                                                    </div>


                                                </div>




                                                @if (count(auth()->user()->skills) > 0)
                                                    @php
                                                        $category = auth()->user()->skills[0]->category;
                                                    @endphp
                                                    <div class="mt-2 vh-100 form-control-register-specialist-div2 d-none">

                                                        <div
                                                            class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                                                            <p>{{ $category->name }}</p>

                                                            <button
                                                                class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                                                onClick="backToCategories()">Back To Categories</button>

                                                        </div>

                                                        <div>
                                                            <div class="mb-3 row">
                                                                @php
                                                                    // get all skills
                                                                    $allskills = [];
                                                                    foreach (auth()->user()->skills as $sk) {
                                                                        array_push($allskills, $sk->service_sub_categoy_id);
                                                                    }
                                                                @endphp

                                                                @foreach ($category->subcategories as $subcategory)
                                                                    <form class="col-6" method="post"
                                                                        action="{{ route('front.technician.panel.update.skill', $subcategory->id) }}">
                                                                        @csrf
                                                                        @if (in_array($subcategory->id, $allskills))
                                                                            <button type="submit"
                                                                                class="mt-4 border-0 darkgreen p-2 rounded-3 text-light">{{ $subcategory->name }}</button>
                                                                        @else
                                                                            <button type="submit"
                                                                                class="mt-4 darkYellow border-0 lightgray p-2 rounded-3">{{ $subcategory->name }}</button>
                                                                        @endif
                                                                    </form>
                                                                @endforeach
                                                            </div>
                                                        </div>


                                                    </div>
                                                @else
                                                    @foreach ($categorylangs as $categorylang)
                                                        @php
                                                            $category = $categorylang->langable;
                                                        @endphp
                                                        <div
                                                            class="mt-2 vh-100 form-control-register-specialist-div2 d-none">

                                                            <div
                                                                class="d-flex justify-content-between lightgray align-items-center p-2 mb-2">

                                                                <p>{{ $category->name }}</p>

                                                                <button
                                                                    class="link-dark text-decoration-none  pe-3 ps-3 rounded lightblue darkYellowOnHover"
                                                                    onClick="backToCategories()">Back TO Categories</button>

                                                            </div>

                                                            <div>
                                                                <div class="mb-3 row">
                                                                    @foreach ($category->subcategories as $subcategory)
                                                                        <form method="post" class="col-6"
                                                                            action="{{ route('front.technician.panel.update.skill', $subcategory->id) }}">
                                                                            @csrf

                                                                            <button type="submit"
                                                                                class="mt-4 darkYellow border-0 lightgray p-2 rounded-3">{{ $subcategory->name }}</button>

                                                                        </form>
                                                                    @endforeach
                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                                @endif




                                            </div>



                                            <div class="col-12 col-md-4 ">

                                                <div class="lightblue text-center">
                                                    <p>Your Skilss.</p>
                                                </div>
                                                <div
                                                    class="border border-dark d-flex flex-column align-content-between  overflow-auto">

                                                    <ul class="list-group form-control-register-specialist-ul">
                                                        <li class="list-group-item ">
                                                            @foreach (auth()->user()->skills as $skill)
                                                                <form class="d-flex justify-content-between" method="post"
                                                                    action="{{ route('front.technician.panel.update.skill', $skill->subcategory->id) }}">
                                                                    @csrf
                                                                    <p>{{ $skill->subcategory->name }}</p><button
                                                                        type=" submit" class="border-0 bg-white"><i
                                                                            class="fa-solid fa-trash-can"></i></button>
                                                                </form>
                                                            @endforeach

                                                        </li>

                                                    </ul>

                                                    @if (count(auth()->user()->skills) == 0)
                                                        <p class="text-center text-danger ">Nothing To show
                                                        </p>
                                                    @endif


                                                </div>


                                            </div>



                                        </div>


                                    </div>


                                </div>


                                <!--اطلاعات بانکی-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  d-none">
                                    <form class="col-12 col-md-6"
                                        action="{{ route('front.technician.panel.update.bankinfo') }}" method="post">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="bank-account-number" class="form-label">Account Number</label>
                                            <input type="text" class="form-control"
                                                value="{{ auth()->user()->bankinfo->account_number }}"
                                                name="account_number" id="bank-account-number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="credit-card" class="form-label">Credit Card</label>
                                            <input type="text" class="form-control"
                                                value="{{ auth()->user()->bankinfo->credit_card }}" name="credit_card"
                                                id="credit-card">
                                        </div>
                                        <div class="d-flex mb-3 gap-3">
                                            <button type="reset"
                                                class="w-100 mt-4 border-redius-20 font-size32">لغو</button>
                                            <button type="submit"
                                                class=" w-100  mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                                        </div>
                                    </form>
                                </div>



                                <!--نمونه کار ها-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  d-none">
                                    <section class="col-12 col-md-6">

                                        <div class="row d-flex justify-content-evenly gy-2  gap-2" id="input-demo1">
                                            <div class="col-5 col-md-3 d-flex lightblue text-center rounded align-items-center"
                                                onClick="goInputDemo()">
                                                <p>اضافه کردن نمونه کار+</p>
                                            </div>

                                            @foreach (auth()->user()->portfolios as $portfolio)
                                                <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                    <div>
                                                        <form
                                                            action="{{ route('front.technician.panel.delete.portfolio', $portfolio->id) }}"
                                                            method="post">
                                                            @csrf
                                                            <button class="btn" type="submit">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div>
                                                        <img src="{{ asset($portfolio->path) }}" class="w-100 h-auto"
                                                            alt="{{ $portfolio->alt }}"
                                                            title="{{ $portfolio->name }}">
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>



                                        <div class="row d-flex justify-content-center gy-2  gap-2 d-none" id="input-demo2">
                                            <form class=""
                                                action="{{ route('front.technician.panel.add.portfolio') }}"
                                                method="post" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label for="date-register-demo" class="form-label">اضافه کردن نمونه
                                                        کار</label>
                                                    <input type="file" name="image" id="date-register-demo"
                                                        class="form-control">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date-register-demo-text"
                                                        class="form-label">توضیحات</label>
                                                    <textarea id="date-register-demo-text" name="description" class="form-control"></textarea>
                                                </div>

                                                <div class="d-flex mb-3 gap-3">
                                                    <button type="reset" class="w-100 mt-4 border-redius-20 font-size32"
                                                        onClick="goInputDemo()">لغو</button>
                                                    <button type="submit"
                                                        class=" w-100  mt-4 darkYellow border-redius-20 font-size32">تایید</button>
                                                </div>

                                            </form>
                                        </div>

                                    </section>
                                </div>



                                <!--مدارک فنی-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  d-none">
                                    <section class="col-12 col-md-6">

                                        <div class="row d-flex justify-content-evenly gy-2  gap-2" id="input-doc1">
                                            <div class="col-5 col-md-3 d-flex lightblue text-center rounded align-items-center"
                                                onClick="goInputDoc()">
                                                <p>+ ezafe kardan madrak fanni</p>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio1.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                            <div class="col-5 col-md-3 lightblue p-2 rounded">
                                                <div>
                                                    <i class="fa-solid fa-xmark"></i>
                                                </div>
                                                <div>
                                                    <img src="image/portfolio2.png" class="w-100 h-auto" alt="">
                                                </div>
                                            </div>
                                        </div>



                                        <!--input demo-->
                                        <div class="row d-flex justify-content-center gy-2  gap-2 d-none" id="input-doc2">
                                            <form class="">

                                                <div class="mb-3">
                                                    <label for="date-register-doc" class="form-label">ezafe kardan
                                                        madrak fanni</label>
                                                    <input type="file" id="date-register-doc" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date-register-doc-title"
                                                        class="form-label">title</label>
                                                    <input type="text" class="form-control" id="date-register-doc-title">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date-register-doc-text"
                                                        class="form-label">description</label>
                                                    <textarea id="date-register-doc-text" class="form-control"></textarea>
                                                </div>

                                                <div class="d-flex mb-3 gap-3">
                                                    <button type="reset"
                                                        class="w-100 mt-4 border-redius-20 font-size20 pt-2 pb-2"
                                                        onClick="goInputDoc()">cancel</button>
                                                    <button type="submit"
                                                        class=" w-100  mt-4 darkYellow border-redius-20 font-size20 pt-2 pb-2">submit</button>
                                                </div>

                                            </form>
                                        </div>

                                    </section>
                                </div>


                            </div>
                        </section>

                    </div>
                    
    @endif
@endsection
@section('script')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <!--scripts from script folder	-->
        <script src="{{ asset('frontend/fixy-land-fa-main/script/spc-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/country_code.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/signup_specialist.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('frontend/fixy-land-en-main/script/spc-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/user-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/country_code.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/signup_specialist.js') }}" type="text/javascript"></script>
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
