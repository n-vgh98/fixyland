@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        انتخاب متخصص
    @else
        choosing Technician
    @endif
@endsection
@section('content')
    <h1 class="mt-4 mb-3 text-center">
        انتخاب متخصص به صورت دستی
    </h1>

    <p class="fw-bold text-center ms-1 me-1"> از میان متخصصین زیر انتخاب کنید. </p>


    <div class="container">
        <div class="row">

            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <div class="specialist-box border border-primary rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-12 p-0 d-flex justify-content-center">
                                <div class="circle-img-div-spc">
                                    <img class="rounded-circle w-100 h-100" src="image/human.jpg" alt="specialist">
                                </div>
                            </div>
                            <div class="col-lg-8 col-12 mt-2 text-center mt-lg-0 text-lg-end p-0 pt-2">
                                <div class="mb-2">
                                    <img src="image/gray-star.png" alt="rating">
                                    <img src="image/gray-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                </div>
                                <p class="m-0 pb-1"> محمدرضا امیری </p>
                                <p class="m-0"> متخصص تعمیر لوازم خانگی </p>
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 text_justify ps-1 pe-1 ps-lg-3 pe-lg-3">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                    </p>

                    <a href="specialistInfo.html"
                        class="text-decoration-none darkYellow-text ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-4 pe-xl-4">
                        مشاهده اطلاعات بیشتر
                    </a>

                    <div class="text-center mt-4">
                        <div class="d-inline-block">
                            <a class="btn darkYellow" href="user-spc-final-description.html"> انتخاب این متخصص </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <div class="specialist-box border border-primary rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-12 p-0 d-flex justify-content-center">
                                <div class="circle-img-div-spc">
                                    <img class="rounded-circle w-100 h-100" src="image/human.jpg" alt="specialist">
                                </div>
                            </div>
                            <div class="col-lg-8 col-12 mt-2 text-center mt-lg-0 text-lg-end p-0 pt-2">
                                <div class="mb-2">
                                    <img src="image/gray-star.png" alt="rating">
                                    <img src="image/gray-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                </div>
                                <p class="m-0 pb-1"> محمدرضا امیری </p>
                                <p class="m-0"> متخصص تعمیر لوازم خانگی </p>
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 text_justify ps-1 pe-1 ps-lg-3 pe-lg-3">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                    </p>

                    <a href="specialistInfo.html"
                        class="text-decoration-none darkYellow-text ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-4 pe-xl-4">
                        مشاهده اطلاعات بیشتر
                    </a>

                    <div class="text-center mt-4">
                        <div class="d-inline-block">
                            <a class="btn darkYellow" href="user-spc-final-description.html"> انتخاب این متخصص </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <div class="specialist-box border border-primary rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-12 p-0 d-flex justify-content-center">
                                <div class="circle-img-div-spc">
                                    <img class="rounded-circle w-100 h-100" src="image/human.jpg" alt="specialist">
                                </div>
                            </div>
                            <div class="col-lg-8 col-12 mt-2 text-center mt-lg-0 text-lg-end p-0 pt-2">
                                <div class="mb-2">
                                    <img src="image/gray-star.png" alt="rating">
                                    <img src="image/gray-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                </div>
                                <p class="m-0 pb-1"> محمدرضا امیری </p>
                                <p class="m-0"> متخصص تعمیر لوازم خانگی </p>
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 text_justify ps-1 pe-1 ps-lg-3 pe-lg-3">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                    </p>

                    <a href="specialistInfo.html"
                        class="text-decoration-none darkYellow-text ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-4 pe-xl-4">
                        مشاهده اطلاعات بیشتر
                    </a>

                    <div class="text-center mt-4">
                        <div class="d-inline-block">
                            <a class="btn darkYellow" href="user-spc-final-description.html"> انتخاب این متخصص </a>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-12 col-md-6 d-flex flex-column align-items-center">
                <div class="specialist-box border border-primary rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-12 p-0 d-flex justify-content-center">
                                <div class="circle-img-div-spc">
                                    <img class="rounded-circle w-100 h-100" src="image/human.jpg" alt="specialist">
                                </div>
                            </div>
                            <div class="col-lg-8 col-12 mt-2 text-center mt-lg-0 text-lg-end p-0 pt-2">
                                <div class="mb-2">
                                    <img src="image/gray-star.png" alt="rating">
                                    <img src="image/gray-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                    <img src="image/yellow-star.png" alt="rating">
                                </div>
                                <p class="m-0 pb-1"> محمدرضا امیری </p>
                                <p class="m-0"> متخصص تعمیر لوازم خانگی </p>
                            </div>
                        </div>
                    </div>

                    <p class="mt-4 text_justify ps-1 pe-1 ps-lg-3 pe-lg-3">
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها
                        و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
                        کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                    </p>

                    <a href="specialistInfo.html"
                        class="text-decoration-none darkYellow-text ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-4 pe-xl-4">
                        مشاهده اطلاعات بیشتر
                    </a>

                    <div class="text-center mt-4">
                        <div class="d-inline-block">
                            <a class="btn darkYellow" href="user-spc-final-description.html"> انتخاب این متخصص </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <!--page navigation-->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation">
            <ul class="pagination">
                <li class="page-item">
                    <a class="text-dark page-link darkYellow rounded-3 border-0 fw-bold  ms-5" href="#"
                        aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a
                        class="page-link darkYellowOnHover text-dark rounded-3 border-0 fw-bold ms-2 me-2" href="#">1</a>
                </li>
                <li class="page-item"><a
                        class="page-link darkYellowOnHover text-dark rounded-3 border-0 fw-bold ms-2 me-2" href="#">2</a>
                </li>
                <li class="page-item"><a
                        class="page-link darkYellowOnHover text-dark rounded-3 border-0 fw-bold ms-2 me-2" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="text-dark page-link darkYellow rounded-3 border-0 fw-bold  me-5" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
@endsection
