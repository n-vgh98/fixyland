@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        متخصص منتخب
    @else
        favorit technicians
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


                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-2 pb-5 p-md-5 ">
                    <h1 class="mb-4"> متخصص منتخب </h1>
                    <div class="w-100 h-100 border-gray pt-3 mb-5 d-flex flex-column align-items-center padding-bottom">
                        @foreach (auth()->user()->favortechs as $tech)
                            <div
                                class="border border-2 border-primary rounded-3 pt-2 pb-2 p-2 p-md-3 position-relative mb-4 ms-2 me-2 ms-lg-5 me-lg-5">

                                <div>
                                    <div class="d-none d-md-inline-block position-absolute top-0 start-0 ms-lg-2">
                                        <img src="image/gray-star.png" alt="rating">
                                        <img src="image/gray-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                    </div>

                                    <div class="d-md-none d-flex justify-content-center mb-3">
                                        <img src="image/gray-star.png" alt="rating">
                                        <img src="image/gray-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center d-md-inline-block mb-3 mb-md-0">
                                    <div class="circle-img-div">
                                        @if ($tech->technician->profile_photo_path != null)
                                            <img class="rounded-circle w-100 h-100"
                                                src="{{ asset('storage/' . $tech->technician->profile_photo_path) }}"
                                                alt="specialist_photo">
                                        @endif

                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center d-md-inline-block me-md-1 mb-2 mb-md-0">
                                    <p class="m-0 pb-1 fw-bold">{{ $tech->technician->firstname }}
                                        {{ $tech->technician->lastname }}
                                        <i class="fa-solid fa-heart text-danger"></i>
                                    </p>
                                    <p class="m-0 fw-bold"> متخصص تعمیرات موبایل </p>
                                </div>

                                <div class="container-fluied">
                                    <div class="row">
                                        <div class="col-12 col-xl-8">
                                            <p class="mt-3 text_justify">
                                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از
                                                طراحان
                                                گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                                                است و
                                                برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای
                                                کاربردی
                                                می باشد.
                                            </p>

                                            <a href="specialistInfo.html"
                                                class="text-decoration-none darkYellow-text d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
                                                مشاهده اطلاعات بیشتر
                                            </a>
                                        </div>

                                        <div
                                            class="col-12 col-xl-4 d-flex flex-column align-items-center align-items-md-end">
                                            <div>
                                                <a href="#" id="remove-boxshadow"
                                                    class="btn text-decoration-none darkgreen-text font-size40 border-0 ps-0 pe-0">
                                                    <i class="fa-regular fa-envelope "></i>
                                                </a>
                                                <a href="#" class="btn text-decoration-none text-black darkYellow">
                                                    <i class="fa-solid fa-phone-flip"></i>{{ $tech->technician->phone }}
                                                </a>
                                            </div>
                                            <div>
                                                <a href="sub-category-descriptions.html"
                                                    class="btn text-decoration-none text-black darkYellow ps-5 pe-5">
                                                    سفارش جدید
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        @endforeach

                    </div>
                </div>


            </div>
        </div>
    @else
        <div class="container-fluid p-0">
            <div class="row ms-0 me-0 position-relative">



                @include('front.User.menu')


                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-2 pb-5 p-md-5 mt-2">
                    <h1 class="mb-4"> motekhases montakhab </h1>
                    <div class="w-100 h-100 border-gray pt-3 mb-5 d-flex flex-column align-items-center padding-bottom">
                        @foreach (auth()->user()->favortechs as $tech)
                            <div
                                class="border border-2 border-primary rounded-3 pt-2 pb-2 p-2 p-md-3 position-relative mb-4 ms-2 me-2 ms-lg-5 me-lg-5">

                                <div>
                                    <div class="d-none d-md-inline-block position-absolute top-0 end-0 me-lg-2">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/gray-star.png" alt="rating">
                                        <img src="image/gray-star.png" alt="rating">
                                    </div>

                                    <div class="d-md-none d-flex justify-content-center mb-3">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/yellow-star.png" alt="rating">
                                        <img src="image/gray-star.png" alt="rating">
                                        <img src="image/gray-star.png" alt="rating">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center d-md-inline-block mb-3 mb-md-0">
                                    <div class="circle-img-div">
                                        @if ($tech->technician->profile_photo_path != null)
                                            <img class="rounded-circle w-100 h-100"
                                                src="{{ asset('storage/' . $tech->technician->profile_photo_path) }}"
                                                alt="specialist_photo">
                                        @endif
                                    </div>
                                </div>

                                <div class="d-flex flex-column align-items-center d-md-inline-block me-md-1 mb-2 mb-md-0">
                                    <p class="m-0 pb-1 fw-bold">
                                        {{ $tech->technician->firstname }} {{ $tech->technician->lastname }}
                                        <i class="fa-solid fa-heart text-danger"></i>
                                    </p>
                                    <p class="m-0"> mobile expert </p>
                                </div>

                                <div class="container-fluied">
                                    <div class="row">
                                        <div class="col-12 col-xl-8">
                                            <p class="mt-3 text_justify">
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                                tempor
                                                incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                            </p>

                                            <a href="specialistInfo.html"
                                                class="text-decoration-none darkYellow-text d-flex justify-content-center justify-content-md-start mb-2 mb-md-0">
                                                more info.
                                            </a>
                                        </div>

                                        <div
                                            class="col-12 col-xl-4 d-flex flex-column align-items-center align-items-md-end">
                                            <div>
                                                <a href="#" id="remove-boxshadow"
                                                    class="btn text-decoration-none darkgreen-text font-size40 border-0 ps-0 pe-0">
                                                    <i class="fa-regular fa-envelope "></i>
                                                </a>
                                                <a href="#" class="btn text-decoration-none text-black darkYellow">
                                                    <i class="fa-solid fa-phone-flip"></i> {{ $tech->technician->phone }}
                                                </a>
                                            </div>
                                            <div>
                                                <a href="sub-category-descriptions.html"
                                                    class="btn text-decoration-none text-black darkYellow ps-5 pe-5">
                                                    new request
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        @endforeach

                    </div>
                </div>


            </div>
        </div>
    @endif
@endsection
@section('script')
    <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
@endsection
