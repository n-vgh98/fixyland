@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        اطلاعات متخصص
    @else
        Technisian Info
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <h1 class="text-center mb-4"> اطلاعات متخصص </h1>


        <section class="border border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 position-relative mb-4">
            <div>
                <p class="fw-bold d-inline-block"> درباره متخصص </p>
                <div class="d-inline-block me-auto position-absolute start-0 ms-2 ms-md-4">
                    <img src="image/gray-star.png" alt="rating">
                    <img src="image/gray-star.png" alt="rating">
                    <img src="image/yellow-star.png" alt="rating">
                    <img src="image/yellow-star.png" alt="rating">
                    <img src="image/yellow-star.png" alt="rating">
                </div>
            </div>

            <div class="d-flex justify-content-center d-md-inline-block me-md-3 mb-2 mb-md-0 mt-2 mt-md-0">
                <div class="circle-img-div-spc">
                    @if ($user->profile_photo_path != null)
                        <img class="rounded-circle w-100 h-100" src="{{ asset('storage/' . $user->profile_photo_path) }}"
                            alt="specialist">
                    @endif

                </div>
            </div>
            <div class="d-flex flex-column align-items-center d-md-inline-block me-1 me-sm-3 mb-3 mb-md-0 mt-2 mt-md-0">
                <p class="m-0 pb-1"> {{ $user->firstname }} {{ $user->lastname }} </p>
                <p class="m-0"> متخصص تعمیر لوازم خانگی </p>
            </div>

            <p class="mt-3 text_justify me-2 ms-2">
                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و
                متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
            </p>
        </section>



        <section class="border border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4">
            <p class="fw-bold"> نمونه کار </p>


            <div class="container-fluid mt-4 mb-4">
                <div class="row gy-4">
                    @foreach ($user->portfolios as $portfolio)
                        <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                            <div class="specialist-portfolio-box">
                                <img src="{{ asset($portfolio->path) }}" alt="{{ $portfolio->alt }}"
                                    title="{{ $portfolio->name }}" width="100%" height="200px">
                                <div class="portfolio-info text-center text_justify pt-3">
                                    <p class="box-text p-2"> {{ $portfolio->description }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach




                </div>
            </div>
        </section>


        {{-- <section class="border border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4">
            <p class="fw-bold"> مدارک فنی </p>

            <div class="container-fluid mt-4 mb-4">
                <div class="row gy-4">

                        <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                            <div class="specialist-portfolio-box">
                                <img src="image/madrak2.png" alt="portfolio" width="100%" height="200px">
                                <div class="portfolio-info text-center text_justify pt-3">
                                    <p class="fw-bold"> عنوان </p>
                                </div>
                            </div>
                        </div>


                </div>
            </div>
        </section> --}}


        <section class="pt-2 pb-2 p-2 p-md-3 mb-4">
            <p class="fw-bold"> نظرات </p>

            <div class="container-fluid mt-4 mb-4 ">
                <div class="row gy-4">
                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block pe-1"> رضا </p>
                            </div>
                            <p class="text_justify"> با تشکر از سایت فیکسی لند جهت خدمات عالی.با تشکر از سایت فیکسی لند
                                جهت خدمات عالی </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block pe-1"> محمد </p>
                            </div>
                            <p class="text_justify"> با تشکر از سایت فیکسی لند جهت خدمات عالی </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block pe-1"> سمانه </p>
                            </div>
                            <p class="text_justify"> با تشکر از سایت فیکسی لند جهت خدمات عالی </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block pe-1"> رضا </p>
                            </div>
                            <p class="text_justify"> با تشکر از سایت فیکسی لند جهت خدمات عالی. با تشکر از سایت فیکسی لند
                                جهت خدمات عالی.با تشکر از سایت فیکسی لند جهت خدمات عالی.با تشکر از سایت فیکسی لند جهت
                                خدمات عالی </p>
                        </div>
                    </div>

                </div>


                <!--more comments-->
                <div id="all-comments" class="row gy-4 mt-2 d-none">
                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block pe-1"> رضا </p>
                            </div>
                            <p class="text_justify"> با تشکر از سایت فیکسی لند جهت خدمات عالی.با تشکر از سایت فیکسی لند
                                جهت خدمات عالی </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block pe-1"> محمد </p>
                            </div>
                            <p class="text_justify"> با تشکر از سایت فیکسی لند جهت خدمات عالی </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block pe-1"> سمانه </p>
                            </div>
                            <p class="text_justify"> با تشکر از سایت فیکسی لند جهت خدمات عالی </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block pe-1"> رضا </p>
                            </div>
                            <p class="text_justify"> با تشکر از سایت فیکسی لند جهت خدمات عالی. با تشکر از سایت فیکسی لند
                                جهت خدمات عالی.با تشکر از سایت فیکسی لند جهت خدمات عالی.با تشکر از سایت فیکسی لند جهت
                                خدمات عالی </p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="d-flex justify-content-end ps-4">
                <button id="more-cm-btn" class="btn text-decoration-none darkYellow-text ps-2 ">
                    مشاهده بیشتر
                    <i class="fa-solid fa-plus mt-3"></i>
                </button>

            </div>

        </section>



        <div class="text-center mb-1">
            <form class="d-inline-block mb-3">
                <button class="btn darkYellow" type="submit"> انتخاب این متخصص </button>
            </form>
            <button class="btn text-decoration-none darkYellow ps-5 pe-5" onClick="history.back()"> بازگشت </button>
        </div>
    @else
        <h1 class="text-center mb-4"> spc info </h1>


        <section class="border border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 position-relative mb-4">
            <div>
                <p class="fw-bold d-inline-block"> about spc </p>
                <div class="d-inline-block ms-auto position-absolute end-0 me-2 me-md-4">
                    <img src="image/gray-star.png" alt="rating">
                    <img src="image/gray-star.png" alt="rating">
                    <img src="image/yellow-star.png" alt="rating">
                    <img src="image/yellow-star.png" alt="rating">
                    <img src="image/yellow-star.png" alt="rating">
                </div>
            </div>

            <div class="d-flex justify-content-center d-md-inline-block ms-md-3 me-md-3 mb-2 mb-md-0 mt-2 mt-md-0">
                <div class="circle-img-div-spc">
                    @if ($user->profile_photo_path != null)
                        <img class="rounded-circle w-100 h-100" src="{{ asset('storage/' . $user->profile_photo_path) }}"
                            alt="specialist">
                    @endif

                </div>
            </div>
            <div class="d-flex flex-column align-items-center d-md-inline-block me-1 me-sm-3 mb-3 mb-md-0 mt-2 mt-md-0">
                <p class="m-0 pb-1 fw-bold"> {{ $user->firstname }} {{ $user->lastname }} </p>
                <p class="m-0"> mobile expert </p>
            </div>

            <p class="mt-3 text_justify me-2 ms-2">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Ut consequat semper viverra nam. Placerat orci nulla pellentesque dignissim enim.
            </p>
        </section>



        <section class="border border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4">
            <p class="fw-bold"> portfolio </p>

            <div class="container-fluid mt-4 mb-4">
                <div class="row gy-4">

                    @foreach ($user->portfolios as $portfolio)
                        <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                            <div class="specialist-portfolio-box">
                                <img src="{{ asset($portfolio->path) }}" alt="{{ $portfolio->alt }}"
                                    title="{{ $portfolio->name }}" width="100%" height="200px">
                                <div class="portfolio-info text-center text_justify pt-3">
                                    <p class="box-text p-2"> {{ $portfolio->description }} </p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section>

        {{-- <section class="border border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4">
            <p class="fw-bold"> madarek fanni </p>

            <div class="container-fluid mt-4 mb-4">
                <div class="row gy-4">
                    <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                        <div class="specialist-portfolio-box">
                            <img src="image/madrak2.png" alt="portfolio" width="100%" height="200px">
                            <div class="portfolio-info text-center text_justify pt-3">
                                <p class="fw-bold"> title </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                        <div class="specialist-portfolio-box">
                            <img src="image/madrak2.png" alt="portfolio" width="100%" height="200px">
                            <div class="portfolio-info text-center text_justify pt-3">
                                <p class="fw-bold"> title </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                        <div class="specialist-portfolio-box">
                            <img src="image/madrak2.png" alt="portfolio" width="100%" height="200px">
                            <div class="portfolio-info text-center text_justify pt-3">
                                <p class="fw-bold"> title </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3 d-flex flex-column align-items-center">
                        <div class="specialist-portfolio-box">
                            <img src="image/madrak2.png" alt="portfolio" width="100%" height="200px">
                            <div class="portfolio-info text-center text_justify pt-3">
                                <p class="fw-bold"> title </p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section> --}}


        <section class="pt-2 pb-2 p-2 p-md-3 mb-4">
            <p class="fw-bold"> comments </p>

            <div class="container-fluid mt-4 mb-4 ">
                <div class="row gy-4">
                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block ps-1"> reza </p>
                            </div>
                            <p class="text_justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block ps-1"> mohammad </p>
                            </div>
                            <p class="text_justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block ps-1"> samane </p>
                            </div>
                            <p class="text_justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block ps-1"> reza </p>
                            </div>
                            <p class="text_justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum
                                dolor sit amet, consectetur adipiscing elit </p>
                        </div>
                    </div>

                </div>


                <!--more comments-->
                <div id="all-comments" class="row gy-4 mt-2 d-none">
                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block ps-1"> reza </p>
                            </div>
                            <p class="text_justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block ps-1"> mohammad </p>
                            </div>
                            <p class="text_justify">Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum
                                dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block ps-1"> samane </p>
                            </div>
                            <p class="text_justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elit </p>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 d-flex justify-content-center">
                        <div class="comments border border-dark rounded-3 p-2 ps-3 pe-3">
                            <div>
                                <i class="fa-regular fa-comments fw-bold"></i>
                                <p class="fw-bold d-inline-block ps-1"> reza </p>
                            </div>
                            <p class="text_justify"> Lorem ipsum dolor sit amet, consectetur adipiscing elitLorem ipsum
                                dolor sit amet, consectetur adipiscing elitLorem ipsum dolor sit amet, consectetur
                                adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                        </div>
                    </div>

                </div>

            </div>
            <div class="ps-4">
                <button id="more-cm-btn" class="btn text-decoration-none darkYellow-text p-0 mb-1">
                    <i class="fa-solid fa-plus"></i>
                    more comments
                </button>

            </div>

        </section>



        <div class="text-center mb-1">
            <form class="d-inline-block mb-3 w-25">
                <button class="btn darkYellow w-100" type="submit"> select </button>
            </form>
            <button type="button" class="btn text-decoration-none darkYellow w-25" onClick="history.back()"> back </button>
        </div>
    @endif
@endsection
