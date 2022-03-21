@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        سوالات {{ $service->name }}
    @else
        questions for {{ $service->name }}
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <div class="container-fluid">
            <div class="row gy-5">
                <!--menu-->
                <div class="col-12 col-lg-4">

                    <div class="overflow_y_scroll border border-dark rounded-3 p-4">

                        <div class="w-100">
                            <a href="index.html#index-sec3" class="btn searchBar-blue-bg mb-3 w-100"> دسته بندی </a>
                        </div>

                        <ul class="sub-menu2 p-0">
                            <li>
                                <form class="d-flex rounded-3 pe-2 ps-2 searchBar-blue-bg">

                                    <button class="btn" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>

                                    <input class="form-control border-0 searchBar-blue-bg" id="dsc_serachbar" type="search"
                                        placeholder="جستجو" aria-label="Search">

                                </form>
                            </li>
                            @foreach ($service->category->subcategories as $subcategory)
                                <li class="sub-menu-hover2">
                                    <div class="d-inline">
                                        <a href="{{ route('user.service.description', $subcategory->id) }}"
                                            class="text-decoration-none text-black">
                                            {{ $subcategory->name }} </a>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>

                </div>



                <div class="col-12 col-lg-8 text-center">
                    <p class="fw-bold font-size24"> فرم ثبت سفارش </p>

                    <form>

                        <div class="pb-2 border-bottom border-secondary border-2">

                            @foreach ($service->form->questions as $question)
                                <div class="border border-dark rounded-3 text-end mb-5">

                                    <div class="searchBar-blue-bg border-bottom border-dark rounded-3 fw-bold p-3">
                                        {{ $question->label }}
                                    </div>
                                    @php
                                        $x = 1;
                                    @endphp
                                    @while ($x < 21)
                                        @php
                                            $option = "option_$x";
                                        @endphp
                                        @if ($question->$option != null)
                                            <div class=" p-3 border-bottom border-primary">
                                                <input class="form-check-input ms-3" type="radio" name="mobile-brand"
                                                    id="{{ $x }}">
                                                <label class="form-check-label" for="{{ $x }}">
                                                    {{ $question->$option }}
                                                </label>
                                            </div>
                                        @endif
                                        @php
                                            $x++;
                                        @endphp
                                    @endwhile
                                </div>
                            @endforeach


                        </div>


                        <!--picture upload & problem description-->
                        <div class="mt-3 pb-2">

                            <div class="text-end">
                                <p class="fw-bold"> آپلود تصویر </p>
                                <p> تصویری از خدمات مورد نیاز خود را برای آگاهی متخصص اضافه کنید. </p>
                            </div>

                            <!--picture upload-->
                            <div class="mb-4 d-flex justify-content-center gap-1">
                                <div>
                                    <label for="upload-problem-pic"
                                        class="darkgreen rounded-3 p-4 text-white text-center fw-bold">
                                        <i class="fa-solid fa-plus font-size40"></i>
                                        <br>
                                        عکس خود را اضافه کنید
                                    </label>
                                    <input type="file" id="upload-problem-pic" class="d-none"
                                        onchange="loadFile(event)">
                                </div>

                                <div class="d-flex flex-column">
                                    <p id="remove_img" class="btn m-0 d-none" onClick="remove_picture()">
                                        <i class="fa-solid fa-xmark"></i>
                                    </p>
                                    <img id="output_img" alt="problem pic" class="d-none border" width="70px"
                                        height="70px">

                                </div>

                            </div>

                            <!--problem description-->
                            <div class="mb-3  text-end">
                                <label for="problem-description" class="form-label fw-bold">شرح مشکل: </label>
                                <textarea id="problem-description" class="form-control border-dark" rows="10"
                                    placeholder="جزئیات بیشتر را بنویسید ..."></textarea>
                            </div>

                        </div>


                        <!--date and time picker-->
                        <div class="mt-3 pb-2">

                            <div class="text-end">
                                <p class="fw-bold"> در چه زمان و تاریخی احتیاج به ارسال متخصص دارید؟ </p>
                            </div>

                            <div class="pt-2 pb-2">
                                <!--date picker-->
                                <div class="mb-4">
                                    <label for="date-picker" class="fw-bold mb-2">انتخاب تاریخ:</label>
                                    <br>
                                    <input type="date" id="date-picker" class="p-2 ps-2 pe-2 rounded-3">
                                </div>

                                <!--time picker-->
                                <div class="mb-4">
                                    <label for="time-picker" class="fw-bold mb-2">انتخاب ساعت:</label>
                                    <br>

                                    <div class="d-flex justify-content-center">
                                        <select class="form-select aut-time-pick mb-3" aria-label="Default select">
                                            <option value="custom" selected>انتخاب ساعت به صورت دستی</option>
                                            <option>9 صبح تا 12 ظهر</option>
                                            <option>12 ظهر تا 16 عصر</option>
                                            <option>16 تا 20 عصر</option>
                                            <option>20 تا 22 شب</option>
                                        </select>
                                    </div>

                                    <input type="time" id="time-picker" class="p-2 ps-2 pe-2 rounded-3">
                                </div>

                            </div>
                        </div>


                        <!--نمایش اطلاعات کاربر برای متخصص-->
                        <div class="mt-3 pb-2 text-end">
                            <p class="m-0 d-inline-block ps-4 fw-bold"> اطلاعات تماس شما برای متخصص نمایش داده شود؟ </p>

                            <input type="radio" class="form-check-input ms-2" id="yes-checkbox" name="yes-no-radio" />
                            <label class="form-check-label fw-bold" for="yes-checkbox"> بله </label>

                            <input type="radio" class="form-check-input me-4 ms-2" id="no-checkbox" name="yes-no-radio" />
                            <label class="form-check-label fw-bold" for="no-checkbox"> خیر </label>

                        </div>



                        <!--انتخاب آدرس-->
                        <div class="mt-3 mb-5">

                            <div class="text-end">
                                <p class="fw-bold"> انتخاب آدرس </p>
                            </div>

                            <div class="pe-4">

                                <!-- آدرس های ذخیره شده-->
                                <div class="text-end saved_addr">
                                    <div class="mb-3">
                                        <input type="radio" class="form-check-input ms-2" id="addr1" name="addr-radio" />
                                        <label class="form-check-label" for="addr1">
                                            شیراز/ملاصدرا/خیابان جمالی
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <input type="radio" class="form-check-input ms-2" id="addr2" name="addr-radio" />
                                        <label class="form-check-label" for="addr2">
                                            تهران/ملاصدرا/خیابان جمالی
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <input type="radio" class="form-check-input ms-2" id="custom_addr_selection"
                                            name="addr-radio" value="custom" />
                                        <label class="form-check-label" for="custom_addr_selection">
                                            اضافه کردن آدرس جدید
                                        </label>
                                    </div>

                                </div>


                                <!--اضافه کردن آدرس جدید-->
                                <div id="add_new_addrs" class="text-end mt-3 w-75 d-none">

                                    <!--استان-->
                                    <div class="mb-3">
                                        <label for="state-register-customer" class="form-label"> استان </label>
                                        <select class="form-select" id="state-register-customer">
                                            <option value="0" selected>فارس</option>
                                            <option value="1">تهران</option>
                                            <option value="2">اصفهان</option>
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



                                    <!--آدرس-->
                                    <div class="mb-3">
                                        <label for="customer-addrs" class="form-label">آدرس </label>
                                        <textarea id="customer-addrs" class="form-control w-100" placeholder="آدرس جدید خود را وارد نمایید ..."
                                            rows="5"></textarea>
                                    </div>

                                </div>

                            </div>


                        </div>


                        <!--buttons-->
                        <div class="mt-3">
                            <div class="mb-2 w-100">
                                <button type="submit" class="btn darkYellow w-50"> بعدی </button>
                            </div>
                            <div class="w-100">
                                <a href="sub-category-descriptions.html"
                                    class="btn darkYellow-border darkYellowOnHover w-50">بازگشت </a>
                            </div>
                        </div>


                    </form>



                </div>



            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row gy-5">
                <!--menu-->
                <div class="col-12 col-lg-4">

                    <div class="overflow_y_scroll border border-dark rounded-3 p-4">

                        <div class="w-100">
                            <a href="index.html#index-sec3" class="btn searchBar-blue-bg mb-3 w-100"> category </a>
                        </div>

                        <ul class="sub-menu2 p-0">
                            <li>
                                <form class="d-flex rounded-3 pe-2 ps-2 searchBar-blue-bg">

                                    <button class="btn" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>

                                    <input class="form-control border-0 searchBar-blue-bg" id="dsc_serachbar" type="search"
                                        placeholder="search..." aria-label="Search">

                                </form>
                            </li>

                            @foreach ($service->category->subcategories as $subcategory)
                                <li class="sub-menu-hover2">
                                    <div class="d-inline">
                                        <a href="{{ route('user.service.description', $subcategory->id) }}"
                                            class="text-decoration-none text-black">
                                            {{ $subcategory->name }} </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>



                <div class="col-12 col-lg-8 text-center">
                    <p class="fw-bold font-size24"> form sabte sefaresh </p>

                    <form>

                        <div class="pb-2 border-bottom border-secondary border-2">

                            @foreach ($service->form->questions as $question)
                                <div class="border border-dark rounded-3 text-start mb-5">

                                    <div class="searchBar-blue-bg border-bottom border-dark rounded-3 fw-bold p-3">
                                        {{ $question->label }}
                                    </div>

                                    @php
                                        $x = 1;
                                    @endphp
                                    @while ($x < 21)
                                        @php
                                            $option = "option_$x";
                                        @endphp
                                        @if ($question->$option != null)
                                            <div class="p-3 border-bottom border-primary">
                                                <input class="form-check-input me-3" type="radio" name="mobile-brand"
                                                    id="{{ $x }}">
                                                <label class="form-check-label" for="{{ $x }}">
                                                    {{ $question->$option }}
                                                </label>
                                            </div>
                                        @endif
                                        @php
                                            $x++;
                                        @endphp
                                    @endwhile
                                </div>
                            @endforeach

                        </div>

                        <!--picture upload & problem description-->
                        <div class="mt-3 pb-2">

                            <div class="text-start">
                                <p class="fw-bold"> image upload </p>
                                <p> upload your image here. </p>
                            </div>

                            <!--picture upload-->
                            <div class="mb-4 d-flex justify-content-center gap-1">
                                <div>
                                    <label for="upload-problem-pic"
                                        class="darkgreen rounded-3 p-4 text-white text-center fw-bold">
                                        <i class="fa-solid fa-plus font-size40"></i>
                                        <br>
                                        upload here
                                    </label>
                                    <input type="file" id="upload-problem-pic" class="d-none"
                                        onchange="loadFile(event)">
                                </div>

                                <div class="d-flex flex-column">
                                    <p id="remove_img" class="btn m-0 d-none" onClick="remove_picture()">
                                        <i class="fa-solid fa-xmark"></i>
                                    </p>
                                    <img id="output_img" alt="problem pic" class="d-none border" width="70px"
                                        height="70px">

                                </div>

                            </div>

                            <!--problem description-->
                            <div class="mb-3  text-start">
                                <label for="problem-description" class="form-label fw-bold">problem description: </label>
                                <textarea id="problem-description" class="form-control border-dark" rows="10" placeholder="..."></textarea>
                            </div>

                        </div>


                        <!--date and time picker-->
                        <div class="mt-3 pb-2">

                            <div class="text-start">
                                <p class="fw-bold"> time and date picker: </p>
                            </div>

                            <div class="pt-2 pb-2">
                                <!--date picker-->
                                <div class="mb-4">
                                    <label for="date-picker" class="fw-bold mb-2">date: </label>
                                    <br>
                                    <input type="date" id="date-picker" class="p-2 ps-2 pe-2 rounded-3">
                                </div>

                                <!--time picker-->
                                <div class="mb-4">
                                    <label for="time-picker" class="fw-bold mb-2">time: </label>
                                    <br>

                                    <div class="d-flex justify-content-center">
                                        <select class="form-select aut-time-pick mb-3" aria-label="Default select">
                                            <option value="custom" selected>custom</option>
                                            <option> 9am to 12pm </option>
                                            <option> 12pm to 16pm </option>
                                            <option> 16pm to 20pm </option>
                                            <option> 20pm to 22pm </option>
                                        </select>
                                    </div>

                                    <input type="time" id="time-picker" class="p-2 ps-2 pe-2 rounded-3">
                                </div>

                            </div>
                        </div>


                        <!--نمایش اطلاعات کاربر برای متخصص-->
                        <div class="mt-3 pb-2 text-start">
                            <p class="m-0 d-inline-block pe-4 fw-bold">
                                etelaate shoma namayesh dade shavad?
                            </p>

                            <input type="radio" class="form-check-input me-2" id="yes-checkbox" name="yes-no-radio" />
                            <label class="form-check-label fw-bold" for="yes-checkbox"> yes </label>

                            <input type="radio" class="form-check-input ms-4 me-2" id="no-checkbox" name="yes-no-radio" />
                            <label class="form-check-label fw-bold" for="no-checkbox"> no </label>

                        </div>


                        <!--انتخاب آدرس-->
                        <div class="mt-3 mb-5">

                            <div class="text-start">
                                <p class="fw-bold"> addrs: </p>
                            </div>

                            <div class="ps-4">

                                <!-- آدرس های ذخیره شده-->
                                <div class="text-start saved_addr">
                                    <div class="mb-3">
                                        <input type="radio" class="form-check-input ms-2" id="addr1" name="addr-radio" />
                                        <label class="form-check-label" for="addr1">
                                            shiraz/jamali
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <input type="radio" class="form-check-input ms-2" id="addr2" name="addr-radio" />
                                        <label class="form-check-label" for="addr2">
                                            tehran/azadi
                                        </label>
                                    </div>

                                    <div class="mb-3">
                                        <input type="radio" class="form-check-input ms-2" id="custom_addr_selection"
                                            name="addr-radio" value="custom" />
                                        <label class="form-check-label" for="custom_addr_selection">
                                            add new addr.
                                        </label>
                                    </div>

                                </div>


                                <!--اضافه کردن آدرس جدید-->
                                <div id="add_new_addrs" class="text-end mt-3 w-75 d-none">

                                    <!--استان محل سکونت-->
                                    <div class="mb-3 text-start">
                                        <label for="state-register-customer" class="form-label"> province</label>
                                        <select class="form-select" id="state-register-customer">
                                            <option value="0" selected>fars</option>
                                            <option value="1">tehran</option>
                                            <option value="2">esfahan</option>
                                        </select>
                                    </div>

                                    <!--شهرهای مرتبط به هر استان   --  start -->
                                    <!--فارس-->
                                    <div class="cities mb-3 text-start">
                                        <label for="city-register-customer-fars" class="form-label">city </label>
                                        <select class="form-select" id="city-register-customer-fars">
                                            <option value="shiraz">shiraz</option>
                                            <option value="tehran">fasa</option>
                                            <option value="esfahan">eghlid</option>
                                        </select>
                                    </div>

                                    <!--تهران-->
                                    <div class="cities mb-3 text-start d-none">
                                        <label for="city-register-customer-tehran" class="form-label">city</label>
                                        <select class="form-select" id="city-register-customer-tehran">
                                            <option value="shiraz">tehran</option>
                                            <option value="tehran">rey</option>
                                            <option value="esfahan">golpayegan</option>
                                        </select>
                                    </div>

                                    <!--اصفهان-->
                                    <div class="cities mb-3 text-start d-none">
                                        <label for="city-register-customer-esfahan" class="form-label">city </label>
                                        <select class="form-select" id="city-register-customer-esfahan">
                                            <option value="shiraz">esfahan</option>
                                            <option value="tehran">esfahan</option>
                                            <option value="esfahan">esfahan</option>
                                        </select>
                                    </div>
                                    <!--شهرهای مرتبط به هر استان   --  end -->

                                    <div class="text-start mb-3">
                                        <label for="customer-addrs" class="form-label">address: </label>
                                        <textarea id="customer-addrs" class="form-control w-100" placeholder="add ur new addr here ..." rows="5"></textarea>
                                    </div>
                                </div>

                            </div>


                        </div>


                        <!--buttons-->
                        <div class="mt-3">
                            <div class="mb-2 w-100">
                                <button type="submit" class="btn darkYellow w-50"> next </button>
                            </div>
                            <div class="w-100">
                                <a href="sub-category-descriptions.html"
                                    class="btn darkYellow-border darkYellowOnHover w-50"> back </a>
                            </div>
                        </div>


                    </form>


                </div>



            </div>
        </div>
    @endif
@endsection
