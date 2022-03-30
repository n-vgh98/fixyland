@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        پل متخصص
    @else
        technician panel
    @endif
@endsection

@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <div class="container-fluid p-0">
            <div class="row ms-0 me-0 position-relative">
                <!--profile panel-->
                <div class="profile-box h-75 col-md-3 d-none d-md-flex flex-column align-items-center ps-0 pe-0 pt-5 pb-5">

                    <div class="position-relative mb-4 text-center">
                        <img class="rounded-circle" src="image/pf-pic.png" alt="profile picture" height="150px"
                            width="150px">

                        <div class="position-absolute bottom-0 end-0">
                            <!-- Modal button-->
                            <button id="modal-btn" type="button" class="btn no-shadow p-0 m-0" data-bs-toggle="modal"
                                data-bs-target="#pf_pic_Modal">
                                <img src="image/pf-pic-update.png" alt="new pf pic" height="45px" width="45px">
                            </button>
                        </div>

                        <!-- Modal for profile picture -->
                        <div class="modal fade" id="pf_pic_Modal" tabindex="-1" aria-labelledby="pf_pic_Modal"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!--modal header-->
                                    <div class="modal-header d-flex justify-content-between">
                                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <h5 class="modal-title" id="pf_modal_label"> Select pic </h5>
                                    </div>

                                    <!--modal body-->
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-4 d-flex flex-column">
                                                            <p class="fw-bold"> عکس خود را آپلود کنید: </p>
                                                            <input type="file" id="image" class="mt-3 mb-4">
                                                            <button class="btn btn-block btn-upload-image darkYellow">
                                                                crop img
                                                            </button>
                                                        </div>

                                                        <div class="col-md-8 text-center">
                                                            <div id="upload-demo"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--modal footer-->
                                    <div class="modal-footer text-center">
                                        <button type="button" class="btn darkYellow">Save changes</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <p class="gray-text m-0 mb-1"> نام و نام خانوادگی </p>
                    <p class="gray-text m-0 mb-1"> abc@gmail.com </p>
                    <p class="gray-text m-0 mb-1"> ********091 </p>

                    <div class="mt-3 w-100 d-flex justify-content-between">
                        <a href="spc-change-password.html"
                            class="btn darkYellow ps-lg-2 pe-lg-3 ps-md-0 pe-md-0 mb-3 mt-2 rounded-0 rounded-start"
                            type="submit">
                            تغییر رمز عبور
                        </a>
                        <form class="mb-3 mt-2" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn gray-bg gray-text ps-lg-5 pe-lg-4 ps-md-4 pe-md-3 rounded-0 rounded-end"
                                type="submit"> خروج </button>
                        </form>
                    </div>

                    <div class="d-flex mt-2 p-2 ps-3 pe-3 w-100 ">
                        <i class="fa-solid fa-user ms-3 mt-1"></i>
                        <a href="{{ route('front.technician.panel.show') }}"
                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover">
                            پنل کاربری </a>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-pen-to-square ms-3 mt-1"></i>
                        <a href="{{ route('front.technician.panel.edit') }}"
                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> ویرایش پروفایل </a>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-dollar-sign ms-3 mt-1"></i>
                        <div id="Financial-sec"
                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover question-div1">
                            بخش مالی
                            <i id="angle-down" class="fa-solid fa-angle-down me-2"></i>
                            <ul class="Financial-list m-0 d-none">
                                <li><a href="spc-income.html"
                                        class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> درآمد من
                                    </a></li>
                                <li><a href="spc-money-demand.html"
                                        class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> تقاضای وجه
                                    </a></li>
                                <li><a href="spc-reward.html"
                                        class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> دریافت
                                        پاداش </a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-regular fa-hard-drive ms-3 mt-1"></i>
                        <a href="spc-desk.html" class="text-decoration-none darkYellow-text_onHover text-black-no-hover">
                            میزکار </a>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-headset ms-3 mt-1"></i>
                        <a href="#" class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> مرکز پشتیبانی
                        </a>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-newspaper ms-3 mt-1"></i>
                        <a href="spc-fixy-msgs.html"
                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> پیام های فیکسی لند
                        </a>
                    </div>

                    <!--اشتراک گذاری-->
                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-share-nodes ms-3 mt-1"></i>
                        <!-- Modal button -->
                        <button id="share_btn" type="button"
                            class="btn darkYellow-text_onHover text-black-no-hover p-0 no-shadow" data-bs-toggle="modal"
                            data-bs-target="#share-modal"> اشتراک گذاری </button>

                        <!--Modal starts-->
                        <div class="modal fade" id="share-modal" tabindex="-1" aria-labelledby="ModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!--modal header-->
                                    <div class="modal-header d-flex justify-content-between">
                                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <h5 class="modal-title" id="exampleModalLabel">share website</h5>
                                    </div>

                                    <!--modal body-->
                                    <div class="modal-body d-flex justify-content-center gap-3 darkgreen_nohover">
                                        <!--whatsapp-->
                                        <div>
                                            <a href="whatsapp://send?text=https://www.lordofit.com/"
                                                data-action="share/whatsapp/share"
                                                class="text-decoration-none darkYellow-text_onHover white-text">
                                                <i class="fa-brands fa-whatsapp font-size40"></i>
                                            </a>
                                        </div>

                                        <!--telegram-->
                                        <div>
                                            <a href="https://xn--r1a.link/share/url?url=https%3A%2F%2Fwww.lordofit.com%2F"
                                                class="text-decoration-none darkYellow-text_onHover white-text"
                                                target="_blank">
                                                <g fill="none">
                                                    <path fill="#ffffff"
                                                        d="M0.554,7.092 L19.117,0.078 C19.737,-0.156 20.429,0.156 20.663,0.776 C20.745,0.994 20.763,1.23 20.713,1.457 L17.513,16.059 C17.351,16.799 16.62,17.268 15.88,17.105 C15.696,17.065 15.523,16.987 15.37,16.877 L8.997,12.271 C8.614,11.994 8.527,11.458 8.805,11.074 C8.835,11.033 8.869,10.994 8.905,10.958 L15.458,4.661 C15.594,4.53 15.598,4.313 15.467,4.176 C15.354,4.059 15.174,4.037 15.036,4.125 L6.104,9.795 C5.575,10.131 4.922,10.207 4.329,10.002 L0.577,8.704 C0.13,8.55 -0.107,8.061 0.047,7.614 C0.131,7.374 0.316,7.182 0.554,7.092 Z">
                                                    </path>
                                                </g>
                                                <i class="fa-brands fa-telegram font-size40"></i>
                                            </a>
                                        </div>

                                        <!--facebook-->
                                        <div>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.lordofit.com"
                                                target="_blank" rel="noopener"
                                                class="text-decoration-none darkYellow-text_onHover white-text">
                                                <i class="fa-brands fa-facebook font-size40"></i>
                                            </a>
                                        </div>

                                        <!--twitter-->
                                        <div>
                                            <a href="https://www.twitter.com/intent/tweet?url=https://www.lordofit.com/"
                                                class="text-decoration-none darkYellow-text_onHover white-text"
                                                target="_blank" rel="noreferrer">
                                                <use xlink:href="#si_twitter"></use>
                                                <i class="fa-brands fa-twitter font-size40"></i>
                                            </a>
                                        </div>

                                        <!--linkedin-->
                                        <div>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.lordofit.com/"
                                                target="_blank" rel="noreferrer"
                                                class="text-decoration-none darkYellow-text_onHover white-text">
                                                <use xlink:href="#si_linkedin"></use>
                                                <i class="fa-brands fa-linkedin font-size40"></i>
                                            </a>
                                        </div>

                                    </div>

                                    <!--modal footer-->
                                    <div class="modal-footer d-flex justify-content-center">
                                        <button id="copy_link_btn" type="button" class="btn darkYellow">Copy</button>

                                        <div id="web_link"
                                            class="text-center border border-secondary rounded-3 p-2 ps-4 pe-4">
                                            https://lordofit.com/fa
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Modal ends-->

                    </div>

                </div>



                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5">
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
                                    <form class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="bank-account-number" class="form-label">شماره حساب</label>
                                            <input type="text" class="form-control" id="bank-account-number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="credit-card" class="form-label">کارت اعتباری</label>
                                            <input type="text" class="form-control" id="credit-card">
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



                                        <div class="row d-flex justify-content-center gy-2  gap-2 d-none" id="input-demo2">
                                            <form class="">

                                                <div class="mb-3">
                                                    <label for="date-register-demo" class="form-label">اضافه کردن نمونه
                                                        کار</label>
                                                    <input type="file" id="date-register-demo" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date-register-demo-title"
                                                        class="form-label">عنوان</label>
                                                    <input type="text" class="form-control"
                                                        id="date-register-demo-title">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date-register-demo-text"
                                                        class="form-label">توضیحات</label>
                                                    <textarea id="date-register-demo-text" class="form-control">


                                        </textarea>
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




            </div>
        </div>
    @else
        <div class="container-fluid p-0">
            <div class="row ms-0 me-0 position-relative">
                <!--profile panel-->
                <div class="profile-box h-75 col-md-3 d-none d-md-flex flex-column align-items-center ps-0 pe-0 pt-5 pb-5">

                    <div class="position-relative mb-4 text-center">
                        <img class="rounded-circle" src="image/pf-pic.png" alt="profile picture" height="150px"
                            width="150px">

                        <div class="position-absolute bottom-0 end-0">
                            <!-- Modal button-->
                            <button id="modal-btn" type="button" class="btn no-shadow p-0 m-0" data-bs-toggle="modal"
                                data-bs-target="#pf_pic_Modal">
                                <img src="image/pf-pic-update.png" alt="new pf pic" height="45px" width="45px">
                            </button>
                        </div>

                        <!-- Modal for profile picture -->
                        <div class="modal fade" id="pf_pic_Modal" tabindex="-1" aria-labelledby="pf_pic_Modal"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">

                                    <!--modal header-->
                                    <div class="modal-header d-flex justify-content-between">
                                        <h5 class="modal-title" id="pf_modal_label"> Select pic </h5>
                                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <!--modal body-->
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-md-8 text-center">
                                                            <div id="upload-demo"></div>
                                                        </div>

                                                        <div class="col-md-4 d-flex flex-column">
                                                            <p class="fw-bold"> upload ur picture </p>
                                                            <input type="file" id="image" class="mt-3 mb-4">
                                                            <button class="btn btn-block btn-upload-image darkYellow">
                                                                crop img
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--modal footer-->
                                    <div class="modal-footer d-flex justify-content-start">
                                        <button type="button" class="btn darkYellow">Save changes</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <p class="gray-text m-0 mb-1"> fname and lname </p>
                    <p class="gray-text m-0 mb-1"> abc@gmail.com </p>
                    <p class="gray-text m-0 mb-1"> 091******** </p>

                    <div class="mt-3 w-100 d-flex justify-content-between">
                        <a href="spc-change-password.html"
                            class="btn darkYellow ps-xl-2 pe-xl-2 ps-lg-1 pe-lg-1 ps-md-0 pe-md-1 mb-3 mt-2 rounded-0 rounded-end"
                            type="submit">
                            change password
                        </a>
                        <form class="mb-3 mt-2" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button
                                class="btn gray-bg gray-text ps-xl-4 pe-xl-5 ps-lg-4 pe-lg-3 ps-md-1 pe-md-0 rounded-0 rounded-start"
                                type="submit"> log out </button>
                        </form>
                    </div>

                    <div class="d-flex mt-2 p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-user me-3 mt-1"></i>
                        <a href="{{ route('front.technician.panel.show') }}"
                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover">
                            profile </a>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-pen-to-square me-3 mt-1"></i>
                        <a href="{{ route('front.technician.panel.edit') }}"
                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> edit profile </a>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-dollar-sign me-3 mt-1"></i>
                        <div id="Financial-sec"
                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover question-div1">
                            finance
                            <i id="angle-down" class="fa-solid fa-angle-down ms-2"></i>
                            <ul class="Financial-list m-0 d-none">
                                <li><a href="spc-income.html"
                                        class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> income
                                    </a></li>
                                <li><a href="spc-money-demand.html"
                                        class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> money
                                        demand </a></li>
                                <li><a href="spc-reward.html"
                                        class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> reward
                                    </a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-regular fa-hard-drive me-3 mt-1"></i>
                        <a href="spc-desk.html" class="text-decoration-none darkYellow-text_onHover text-black-no-hover">
                            desk </a>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-headset me-3 mt-1"></i>
                        <a href="#" class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> support </a>
                    </div>

                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-newspaper me-3 mt-1"></i>
                        <a href="spc-fixy-msgs.html"
                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> fixy land msgs </a>
                    </div>

                    <!--اشتراک گذاری-->
                    <div class="d-flex p-2 ps-3 pe-3 w-100">
                        <i class="fa-solid fa-share-nodes me-3 mt-1"></i>
                        <!-- Modal button -->
                        <button id="share_btn" type="button"
                            class="btn darkYellow-text_onHover text-black-no-hover p-0 no-shadow" data-bs-toggle="modal"
                            data-bs-target="#share-modal"> share website </button>

                        <!--Modal starts-->
                        <div class="modal fade" id="share-modal" tabindex="-1" aria-labelledby="ModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!--Modal header-->
                                    <div class="modal-header d-flex justify-content-between">
                                        <h5 class="modal-title" id="exampleModalLabel">share website</h5>
                                        <button type="button" class="btn-close m-0" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <!--Modal body-->
                                    <div class="modal-body d-flex justify-content-center gap-3 darkgreen_nohover">

                                        <!--whatsapp-->
                                        <div>
                                            <a href="whatsapp://send?text=https://www.lordofit.com/"
                                                data-action="share/whatsapp/share"
                                                class="text-decoration-none darkYellow-text_onHover white-text">
                                                <i class="fa-brands fa-whatsapp font-size40"></i>
                                            </a>
                                        </div>

                                        <!--telegram-->
                                        <div>
                                            <a href="https://xn--r1a.link/share/url?url=https%3A%2F%2Fwww.lordofit.com%2F"
                                                class="text-decoration-none darkYellow-text_onHover white-text"
                                                target="_blank">
                                                <g fill="none">
                                                    <path fill="#ffffff"
                                                        d="M0.554,7.092 L19.117,0.078 C19.737,-0.156 20.429,0.156 20.663,0.776 C20.745,0.994 20.763,1.23 20.713,1.457 L17.513,16.059 C17.351,16.799 16.62,17.268 15.88,17.105 C15.696,17.065 15.523,16.987 15.37,16.877 L8.997,12.271 C8.614,11.994 8.527,11.458 8.805,11.074 C8.835,11.033 8.869,10.994 8.905,10.958 L15.458,4.661 C15.594,4.53 15.598,4.313 15.467,4.176 C15.354,4.059 15.174,4.037 15.036,4.125 L6.104,9.795 C5.575,10.131 4.922,10.207 4.329,10.002 L0.577,8.704 C0.13,8.55 -0.107,8.061 0.047,7.614 C0.131,7.374 0.316,7.182 0.554,7.092 Z">
                                                    </path>
                                                </g>
                                                <i class="fa-brands fa-telegram font-size40"></i>
                                            </a>
                                        </div>

                                        <!--facebook-->
                                        <div>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.lordofit.com"
                                                target="_blank" rel="noopener"
                                                class="text-decoration-none darkYellow-text_onHover white-text">
                                                <i class="fa-brands fa-facebook font-size40"></i>
                                            </a>
                                        </div>

                                        <!--twitter-->
                                        <div>
                                            <a href="https://www.twitter.com/intent/tweet?url=https://www.lordofit.com/"
                                                class="text-decoration-none darkYellow-text_onHover white-text"
                                                target="_blank" rel="noreferrer">
                                                <use xlink:href="#si_twitter"></use>
                                                <i class="fa-brands fa-twitter font-size40"></i>
                                            </a>
                                        </div>

                                        <!--linkedin-->
                                        <div>
                                            <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=https://www.lordofit.com/"
                                                target="_blank" rel="noreferrer"
                                                class="text-decoration-none darkYellow-text_onHover white-text">
                                                <use xlink:href="#si_linkedin"></use>
                                                <i class="fa-brands fa-linkedin font-size40"></i>
                                            </a>
                                        </div>

                                    </div>

                                    <!--Modal footer-->
                                    <div class="modal-footer d-flex justify-content-center">
                                        <div id="web_link"
                                            class="text-center border border-secondary rounded-3 p-2 ps-4 pe-4">
                                            https://lordofit.com/fa
                                        </div>
                                        <button id="copy_link_btn" type="button" class="btn darkYellow">Copy</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!--Modal ends-->

                    </div>

                </div>


                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5">
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
                                    <form class="col-12 col-md-6">
                                        <div class="mb-3">
                                            <label for="bank-account-number" class="form-label">shomare hesab</label>
                                            <input type="text" class="form-control" id="bank-account-number">
                                        </div>
                                        <div class="mb-3">
                                            <label for="credit-card" class="form-label">kart etebari</label>
                                            <input type="text" class="form-control" id="credit-card">
                                        </div>
                                        <div class="d-flex mb-3 gap-3">
                                            <button type="reset"
                                                class="w-100 mt-4 border-redius-20 font-size20 pt-2 pb-2">cancel</button>
                                            <button type="submit"
                                                class=" w-100  mt-4 darkYellow border-redius-20 font-size20 pt-2 pb-2">submit</button>
                                        </div>
                                    </form>
                                </div>



                                <!--نمونه کار ها-->
                                <div class="row dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly  d-none">
                                    <section class="col-12 col-md-6">

                                        <div class="row d-flex justify-content-evenly gy-2  gap-2" id="input-demo1">
                                            <div class="col-5 col-md-3 d-flex lightblue text-center rounded align-items-center"
                                                onClick="goInputDemo()">
                                                <p> + add portfolio</p>
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



                                        <!-- input demo-->
                                        <div class="row d-flex justify-content-center gy-2  gap-2 d-none" id="input-demo2">
                                            <form class="">

                                                <div class="mb-3">
                                                    <label for="date-register-demo" class="form-label">add
                                                        portfolio</label>
                                                    <input type="file" id="date-register-demo" class="form-control">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date-register-demo-title"
                                                        class="form-label">title</label>
                                                    <input type="text" class="form-control"
                                                        id="date-register-demo-title">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="date-register-demo-text"
                                                        class="form-label">description</label>
                                                    <textarea id="date-register-demo-text" class="form-control"></textarea>
                                                </div>

                                                <div class="d-flex mb-3 gap-3">
                                                    <button type="reset"
                                                        class="w-100 mt-4 border-redius-20 font-size20 pt-2 pb-2"
                                                        onClick="goInputDemo()">cancel</button>
                                                    <button type="submit"
                                                        class=" w-100  mt-4 darkYellow border-redius-20 font-size20 pt-2 pb-2">submit</button>
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
                </div>


            </div>
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
