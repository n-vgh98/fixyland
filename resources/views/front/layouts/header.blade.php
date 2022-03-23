@php
$path = request()->getPathInfo();
$catlang = substr($path, 1, 2);
$categories = App\Models\Lang::where([['name', $catlang], ['langable_type', 'App\Models\ServiceCategory']])->get();
@endphp

@if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
    <header class="fixed-top navbar-expand-lg container-fluid header" id="header">

        <div class="position-relative pb-0">

            <div class="row d-flex justify-content-between">
                <!-- Hamburger & Xmark icon -->
                <div class="navbar-toggler col-2 text-center" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar" id="button-toggler-menu">
                    <i class="fa-solid fa-bars text-white" id="i-menu"></i>
                    <i class="fa-solid fa-xmark text-white d-none" id="i-menu2"></i>
                </div>

                <!-- fixyLand logo for mobile size -->
                <div class="navbar-toggler col-4 col-sm-2">
                    <img class="w-100 "
                        src="{{ asset('frontend/fixy-land-en-main/image/fixyLandMenuIcon.png') }}" alt=""
                        id="logo-menu">
                </div>
            </div>



            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <div class="row d-flex justify-content-center pt-2 flex-fill">

                    <!-- header right column -->
                    <div class="col-lg-2 row order-lg-1 order-4">
                        <!-- fixyLand logo for laptop size -->
                        <div class="col-12 justify-content-center d-none d-lg-flex">
                            <img src="{{ asset('frontend/fixy-land-en-main/image/fixyLandMenuIcon.png') }}" alt=""
                                width="100" height="50">
                        </div>
                        <!-- language selection -->
                        <div class="col-lg-12 d-flex justify-content-center row mb-2" dir="ltr">
                            <div class="col-lg-12 col-6">
                                <div id="select_lang_div"
                                    class="text-center darkYellow-no-hover rounded-3 pt-1 pb-1 position-relative">
                                    <p class="m-0">
                                        انتخاب زبان
                                        <i class="fa-solid fa-caret-down"></i>
                                    </p>

                                    <div id="langs_div"
                                        class="d-none rounded-bottom darkYellow-no-hover position-absolute start-0 w-100">
                                        <ul class="list_style_type p-0 m-0">
                                            <hr class="m-0 mt-2">
                                            <li class="rounded-top darkYellow-lang text-center mt-1 mb-1">
                                                @php
                                                    $x = substr(Request::getPathInfo(), 3);
                                                    $lang = substr(Request::getPathInfo(), 1, 2);
                                                    if ($lang == 'ar') {
                                                        $lang = 'en';
                                                        $link = $lang . $x;
                                                    } else {
                                                        $lang = 'ar';
                                                        $link = $lang . $x;
                                                    }
                                                @endphp
                                                <a href="/{{ $link }}" class="text-decoration-none text-black">
                                                    @if ($lang == 'ar')
                                                        Ar
                                                    @else
                                                        En
                                                    @endif
                                                </a>
                                            </li>
                                            <hr class="m-0">
                                            <li class="rounded-bottom darkYellow-lang text-center mt-1 mb-1">
                                                <a href="#" class="text-decoration-none text-black">
                                                    @if ($lang == 'ar')
                                                        En
                                                    @else
                                                        Ar
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!--header middle column-->
                    <div class=" col-lg-7 d-flex justify-content-center row order-2">
                        <!-- search bar -->
                        <form class="col-10 col-sm-7 col-md-10 col-lg-12 d-flex d-flex-border pe-2 ps-2">
                            <button class="btn " type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input class="form-control" id="form-control" type="search" placeholder="Search"
                                aria-label="Search">
                        </form>

                        <!-- header menu -->
                        <div class="col-12 justify-content-center d-flex row">
                            <div class="col-10 col-sm-7 col-md-10 col-lg-12 m-0 p-0 d-flex align-items-end">
                                <nav class="navbar d-flex flex-fill m-0 p-0 ">
                                    <ul class="navbar-nav d-flex flex-fill justify-content-between m-0 p-0 ">
                                        <!-- header menu items: -->
                                        <li class="nav-item pb-2 ">
                                            <a class=" nav-link-hover" href="{{ route('user.home') }}">خانه</a>
                                        </li>
                                        <li class="nav-item pb-2">
                                            <a class=" nav-link-hover" href="{{ route('front.articles.index')}}">مقالات</a>
                                        </li>

                                        <!-- daste-bandi-khadamat -->
                                        <li class="nav-item pb-2" id="khadamat">
                                            <p class="nav-link-hover d-inline-block p-0 m-0 li-responsive"
                                                id="khadamat-p">
                                                دسته بندی خدمات
                                                <i class="fa-solid fa-caret-down"></i>
                                            </p>

                                            <!-- daste-bandi-khadamt submenu for mobile size -->
                                            <ul class="sub-menu text-white me-4 d-lg-none d-none"
                                                id="sub-menu-responsive">
                                                <!-- daste-bandi-khadamat submenu-item1 -->
                                                @foreach ($categories as $category)
                                                    @if ($category->langable->status == 1)
                                                        <li class="nav-item li-responsive">
                                                            <p
                                                                class="nav-link-click li-responsive-3 snav-link-hover-white p-0 m-0">
                                                                {{ $category->langable->name }}
                                                                <i class="fa-solid fa-caret-down"></i>
                                                            </p>
                                                            @foreach ($category->langable->subcategories as $service)
                                                                @if ($service->status == 1)
                                                                    <!-- submenu for item1 from daste-bandi-khadamat submenu -->
                                                                    <div
                                                                        class="text-white me-3 li-responsive-submenu-3 d-none">
                                                                        <ul style="list-style-type: none">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link-hover-white"
                                                                                    href="{{ route('user.service.description', $service->id) }}">
                                                                                    {{ $service->name }}
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>


                                        <li class="nav-item pb-2">
                                            <a class=" nav-link-hover" href="contactUs.html">تماس با ما</a>
                                        </li>

                                        <li class="nav-item pb-2">
                                            <a class=" nav-link-hover" href="{{ route('front.about_us') }}">درباره ما</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>


                    <!--header left column-->
                    <div class="col-lg-3  order-1 order-lg-3">
                        <div class="row d-flex flex-fill justify-content-center mb-2">
                            <div class="d-flex gap-3 col-10 col-sm-7 col-md-10 col-lg-12">
                                <a href="{{ route('user.login') }}"
                                    class="btn outline-yellow flex-fill text-decoration-none" id="button-menu1"> ورود
                                </a>
                                <a href="{{ route('user.register') }}" class="btn flex-fill text-decoration-none"
                                    id="button-menu2">
                                    ثبت نام</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- daste-bandi-khadamt submenu for laptop size -->
            <div class="position-absolute end-3 w-75 d-none" style="background-color: #f4f2f2" id="second-level-menu">

                <div class="row ">
                    @foreach ($categories as $category)
                        @if ($category->langable->status == 1)
                            <div class="col-4 col-lg-3 border p-0 pe-2">
                                <ul class="sub-menu sub-menu-hover p-0 pe-2">
                                    <li class="nav-item d-flex sub-menu-1-li border-bottom pb-1">
                                        <div>
                                            {{ $category->langable->name }}
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            @foreach ($category->langable->subcategories as $service)
                                @if ($service->status == 1)
                                    <!--submenu for item1 from daste-bandi-khadamat submenu (laptop size) -->
                                    <div class="col-8 col-lg-9 row sub-menu-show d-none">
                                        <div class="col-6">
                                            <ul class="sub-menu" style="list-style-type: none">
                                                <li class="nav-item">
                                                    <a class="nav-link-hover-black"
                                                        href="{{ route('user.service.description', $service->id) }}">{{ $service->name }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                </div>

            </div>


        </div>

    </header>
@else
    {{-- english header --}}
    <header class="fixed-top navbar-expand-lg container-fluid header" id="header">

        <div class="position-relative pb-0">

            <div class="row d-flex justify-content-between">
                <!-- Hamburger & Xmark icon -->
                <div class="navbar-toggler col-2 text-center" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar" id="button-toggler-menu">
                    <i class="fa-solid fa-bars text-white" id="i-menu"></i>
                    <i class="fa-solid fa-xmark text-white d-none" id="i-menu2"></i>
                </div>

                <!-- fixyLand logo for mobile size -->
                <div class="navbar-toggler col-4 col-sm-2">
                    <img class="w-100 "
                        src="{{ asset('frontend/fixy-land-en-main/image/fixyLandMenuIcon.png') }}" alt=""
                        id="logo-menu">
                </div>
            </div>



            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <div class="row d-flex justify-content-center pt-2 flex-fill">

                    <!-- header right column -->
                    <div class="col-lg-2 row order-lg-1 order-4">
                        <!-- fixyLand logo for laptop size -->
                        <div class="col-12 justify-content-center d-none d-lg-flex">
                            <img src="{{ asset('frontend/fixy-land-en-main/image/fixyLandMenuIcon.png') }}" alt=""
                                width="100" height="50">
                        </div>
                        <!-- language selection -->
                        <div class="col-lg-12 d-flex justify-content-center row mb-2" dir="ltr">
                            <div class="col-lg-12 col-6">
                                <div id="select_lang_div"
                                    class="text-center darkYellow-no-hover rounded-3 pt-1 pb-1 position-relative">
                                    <p class="m-0">
                                        language
                                        <i class="fa-solid fa-caret-down"></i>
                                    </p>

                                    <div id="langs_div"
                                        class="d-none rounded-bottom darkYellow-no-hover position-absolute start-0 w-100">
                                        <ul class="list_style_type p-0 m-0">
                                            <hr class="m-0 mt-2">
                                            <li class="rounded-top darkYellow-lang text-center mt-1 mb-1">
                                                @php
                                                    $x = substr(Request::getPathInfo(), 3);
                                                    $lang = substr(Request::getPathInfo(), 1, 2);

                                                    if ($lang == 'ar') {
                                                        $lang = 'en';
                                                        $link = $lang . $x;
                                                    } else {
                                                        $lang = 'ar';
                                                        $link = $lang . $x;
                                                    }
                                                @endphp
                                                <a href="/{{ $link }}" class="text-decoration-none text-black">
                                                    @if ($lang == 'ar')
                                                        Ar
                                                    @else
                                                        En
                                                    @endif
                                                </a>
                                            </li>
                                            <hr class="m-0">
                                            <li class="rounded-bottom darkYellow-lang text-center mt-1 mb-1">
                                                <a href="#" class="text-decoration-none text-black">
                                                    @if ($lang == 'ar')
                                                        En
                                                    @else
                                                        Ar
                                                    @endif
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <!--header middle column-->
                    <div class=" col-lg-7 d-flex justify-content-center row order-2">
                        <!-- search bar -->
                        <form class="col-10 col-sm-7 col-md-10 col-lg-12 d-flex d-flex-border pe-2 ps-2">
                            <button class="btn " type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                            <input class="form-control" id="form-control" type="search" placeholder="Search"
                                aria-label="Search">
                        </form>

                        <!-- header menu -->
                        <div class="col-12 justify-content-center d-flex row p-0 m-0 mt-3">
                            <div class="col-10 col-sm-7 col-md-10 col-lg-12 m-0 p-0 d-flex align-items-end">
                                <nav class="navbar d-flex flex-fill m-0 p-0">
                                    <ul class="navbar-nav d-flex flex-fill justify-content-between m-0 p-0 ">
                                        <!-- header menu items: -->
                                        <li class="nav-item pb-2 ">
                                            <a class=" nav-link-hover" href="{{ route('user.home') }}">Home</a>
                                        </li>
                                        <li class="nav-item pb-2">
                                            <a class=" nav-link-hover" href="{{ route('front.articles.index')}}">Articles</a>
                                        </li>

                                        <!-- daste-bandi-khadamat -->
                                        <li class="nav-item pb-2" id="khadamat">
                                            <p class="nav-link-hover d-inline-block p-0 m-0 li-responsive"
                                                id="khadamat-p">
                                                Services category
                                                <i class="fa-solid fa-caret-down"></i>
                                            </p>

                                            <!-- daste-bandi-khadamt submenu for mobile size -->
                                            <ul class="sub-menu text-white me-4 d-lg-none d-none"
                                                id="sub-menu-responsive">
                                                <!-- daste-bandi-khadamat submenu-item1 -->
                                                @foreach ($categories as $category)
                                                    @if ($category->langable->status == 1)
                                                        <li class="nav-item li-responsive">
                                                            <p
                                                                class="nav-link-click li-responsive-3 snav-link-hover-white p-0 m-0">
                                                                {{ $category->langable->name }}
                                                                <i class="fa-solid fa-caret-down"></i>
                                                            </p>
                                                            @foreach ($category->langable->subcategories as $service)
                                                                @if ($service->status == 1)
                                                                    <!-- submenu for item1 from daste-bandi-khadamat submenu -->
                                                                    <div
                                                                        class="text-white me-3 li-responsive-submenu-3 d-none">
                                                                        <ul style="list-style-type: none">
                                                                            <li class="nav-item">
                                                                                <a class="nav-link-hover-white"
                                                                                    href="{{ route('user.service.description', $service->id) }}">
                                                                                    {{ $service->name }}
                                                                                </a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                @endif
                                                            @endforeach

                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </li>


                                        <li class="nav-item pb-2">
                                            <a class=" nav-link-hover" href="contactUs.html">Contact us</a>
                                        </li>

                                        <li class="nav-item pb-2">
                                            <a class=" nav-link-hover" href="{{ route('front.about_us') }}">About us</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>


                    <!--header left column-->
                    <div class="col-lg-3  order-1 order-lg-3">
                        <div class="row d-flex flex-fill justify-content-center mb-2">
                            <div class="d-flex gap-3 col-10 col-sm-7 col-md-10 col-lg-12">
                                <a href="{{ route('user.login') }}"
                                    class="btn outline-yellow flex-fill text-decoration-none" id="button-menu1"> login
                                </a>
                                <a href="{{ route('user.register') }}" class="btn flex-fill text-decoration-none"
                                    id="button-menu2">
                                    sign up </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


            <!-- daste-bandi-khadamt submenu for laptop size -->
            <div class="position-absolute end-3 w-75 d-none" style="background-color: #f4f2f2" id="second-level-menu">

                <div class="row ">
                    @foreach ($categories as $category)
                        @if ($category->langable->status == 1)
                            <div class="col-4 col-lg-3 border p-0 pe-2">
                                <ul class="sub-menu sub-menu-hover p-0 pe-2">
                                    <li class="nav-item d-flex sub-menu-1-li border-bottom pb-1">
                                        <div>
                                            {{ $category->langable->name }}
                                            <i class="fa-solid fa-arrow-left"></i>
                                        </div>
                                    </li>

                                </ul>
                            </div>
                            @foreach ($category->langable->subcategories as $service)
                                @if ($service->status == 1)
                                    <!--submenu for item1 from daste-bandi-khadamat submenu (laptop size) -->
                                    <div class="col-8 col-lg-9 row sub-menu-show d-none">
                                        <div class="col-6">
                                            <ul class="sub-menu" style="list-style-type: none">
                                                <li class="nav-item">
                                                    <a class="nav-link-hover-black"
                                                        href="{{ route('user.service.description', $service->id) }}">{{ $service->name }}</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                </div>

            </div>


        </div>

    </header>
@endif
