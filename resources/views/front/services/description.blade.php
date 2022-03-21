@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        توضیحات {{ $service->name }}
    @else
        Description for {{ $service->name }}
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <div class="container">
            <div class="row gy-5">
                <div class="col-12 col-lg-4">
                    <p class="fw-bold font-size24"> همه ی خدمات </p>

                    <div class="overflow_y_scroll border border-dark rounded-3 p-4">
                        <ul class="sub-menu2">
                            <li>
                                <form class="d-flex dastrasi-sari-form pe-2 ps-2 searchBar-blue-bg">

                                    <button class="btn" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>

                                    <input class="form-control border-0 searchBar-blue-bg" id="dsc_serachbar" type="search"
                                        placeholder="جستجو" aria-label="Search">

                                </form>
                            </li>

                            @foreach ($service->category->subcategories as $subcategory)
                                <li class="sub-menu-hover2">
                                    <div class="d-inline darkYellow">
                                        {{ $subcategory->name }}
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </div>
                                </li>
                            @endforeach



                        </ul>
                    </div>

                </div>

                <div class="col-12 col-lg-8">
                    <p class="fw-bold font-size24"> توضیحات </p>

                    <!--submenu for item1-->
                    <div class="w-100 details">

                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text1 != null)
                                    {!! $service->description->text1 !!}
                                @endif
                            </p>
                        </div>


                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text2 != null)
                                    {!! $service->description->text2 !!}
                                @endif
                            </p>
                        </div>


                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text3 != null)
                                    {!! $service->description->text3 !!}
                                @endif
                            </p>
                        </div>


                        <form class="w-100 d-flex justify-content-center mt-4">
                            <a href="{{ route('user.service.form', $service->id) }}"
                                class="w-50 btn darkgreen text-white pt-2 pb-2"> شروع </a>
                        </form>


                    </div>


                    <!--submenu for item2-->
                    <div class="w-100 details d-none">

                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text1 != null)
                                    {!! $service->description->text1 !!}
                                @endif
                            </p>
                        </div>
                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text_2 != null)
                                    {!! $service->description->text_2 !!}
                                @endif
                            </p>
                        </div>

                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text_3 != null)
                                    {!! $service->description->text_3 !!}
                                @endif
                            </p>
                        </div>


                        <form class="w-100 d-flex justify-content-center mt-4">
                            <a href="{{ route('user.service.form', $service->id) }}"
                                class="w-50 btn darkgreen text-white pt-2 pb-2"> شروع </a>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    @else
        <div class="container">
            <div class="row gy-5">
                <div class="col-12 col-lg-4">
                    <p class="fw-bold font-size24"> All Services </p>

                    <div class="overflow_y_scroll border border-dark rounded-3 p-4">
                        <ul class="sub-menu2">
                            <li>
                                <form class="d-flex dastrasi-sari-form pe-2 ps-2 searchBar-blue-bg">

                                    <button class="btn" type="submit">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>

                                    <input class="form-control border-0 searchBar-blue-bg" id="dsc_serachbar" type="search"
                                        placeholder="search..." aria-label="Search">

                                </form>
                            </li>

                            @foreach ($service->category->subcategories as $subcategory)
                                <li class="sub-menu-hover2">
                                    <div class="d-inline ">
                                        {{ $subcategory->name }}
                                        <i class="fa-solid fa-arrow-left"></i>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                <div class="col-12 col-lg-8">
                    <p class="fw-bold font-size24"> description </p>

                    <!--submenu for item1-->
                    <div class="w-100 details">

                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text_1 != null)
                                    {!! $service->description->text_1 !!}
                                @endif
                            </p>
                        </div>

                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text_2 != null)
                                    {!! $service->description->text_2 !!}
                                @endif
                            </p>
                        </div>

                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text_3 != null)
                                    {!! $service->description->text_3 !!}
                                @endif
                            </p>
                        </div>



                        <form class="w-100 d-flex justify-content-center mt-4">
                            <a href="{{ route('user.service.form', $service->id) }}"
                                class="w-50 btn darkgreen text-white pt-2 pb-2"> start </a>
                        </form>


                    </div>


                    <!--submenu for item2-->
                    <div class="w-100 details d-none">
                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text_1 != null)
                                    {!! $service->description->text_1 !!}
                                @endif
                            </p>
                        </div>

                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text_2 != null)
                                    {!! $service->description->text_2 !!}
                                @endif
                            </p>
                        </div>

                        <div class="form-bg-color border border-2 border-dark p-4 text_justify mb-3">
                            <p>
                                @if ($service->description->text_3 != null)
                                    {!! $service->description->text_3 !!}
                                @endif
                            </p>
                        </div>



                        <form class="w-100 d-flex justify-content-center mt-4">
                            <a href="{{ route('user.service.form', $service->id) }}"
                                class="w-50 btn darkgreen text-white pt-2 pb-2"> start </a>
                        </form>

                    </div>

                </div>

            </div>
        </div>
    @endif
@endsection
