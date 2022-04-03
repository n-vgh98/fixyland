@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        پنل مشتری
    @else
        User Panel
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
                <!--profile panel-->
                @include('front.User.menu')
                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5">
                    <div class="h-100 w-100 d-flex flex-column align-items-center ">
                        <h1 class="mb-4"> پنل کاربری </h1>
                        <div class="container-fluied w-100 h-100 border-gray pt-3 pb-1 pb-md-5 mb-5">
                            <div class="row m-0 gy-3">
                                <div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
                                    <div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
                                        <p class="m-0"> 23 </p>
                                        <p class="text-center m-0"> روز در فیکسی لند </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
                                    <div
                                        class="user-panel-box d-flex flex-column justify-content-center align-items-center">
                                        <p class="m-0"> 2 </p>
                                        <p class="text-center m-0"> سفارشاتم </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
                                    <div
                                        class="user-panel-box d-flex flex-column justify-content-center align-items-center">
                                        <p class="m-0"> 5 </p>
                                        <p class="text-center m-0"> درخواست متخصص </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
                                    <div
                                        class="user-panel-box d-flex flex-column justify-content-center align-items-center">
                                        <p class="m-0"> 10,000 تومان </p>
                                        <p class="text-center m-0"> پاداش این ماه </p>
                                    </div>
                                </div>

                                <!--undraw vector mobile size-->
                                <div class=" col-12 p-0 d-flex justify-content-end d-md-none">
                                    <img class="pic-width-mobile" src="image/undraw_dreamer_re_9tua 1.png" alt="next task"
                                        width="100%">
                                </div>


                            </div>

                            <!--undraw vector laptop size-->
                            <div class="position-absolute bottom-0 start-0 d-none d-md-block">
                                <img class="pic-width-laptop" src="image/undraw_dreamer_re_9tua 1.png" alt="user"
                                    width="100%">
                            </div>

                        </div>
                    </div>



                </div>


            </div>
        </div>
    @else
        <div class="container-fluid p-0">
            <div class="row ms-0 me-0 position-relative">
                <!--profile panel-->
                @include('front.User.menu')


                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5">
                    <div class="h-100 w-100 d-flex flex-column align-items-center ">
                        <h1 class="mb-4"> user profile </h1>
                        <div class="container-fluied w-100 h-100 border-gray pt-3 pb-1 pb-md-5 mb-5">
                            <div class="row m-0 gy-3">
                                <div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
                                    <div
                                        class="user-panel-box d-flex flex-column justify-content-center align-items-center">
                                        <p class="m-0"> 23 </p>
                                        <p class="text-center m-0"> days in fixy </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
                                    <div
                                        class="user-panel-box d-flex flex-column justify-content-center align-items-center">
                                        <p class="m-0"> 2 </p>
                                        <p class="text-center m-0"> orders </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
                                    <div
                                        class="user-panel-box d-flex flex-column justify-content-center align-items-center">
                                        <p class="m-0"> 5 </p>
                                        <p class="text-center m-0"> spc </p>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
                                    <div
                                        class="user-panel-box d-flex flex-column justify-content-center align-items-center">
                                        <p class="m-0"> 10,000 </p>
                                        <p class="text-center m-0"> reward </p>
                                    </div>
                                </div>

                                <!--undraw vector mobile size-->
                                <div class=" col-12 p-0 d-md-none">
                                    <img class="pic-width-mobile" src="image/undraw_dreamer_re_9tua 1.png" alt="next task"
                                        width="100%">
                                </div>


                            </div>

                            <!--undraw vector laptop size-->
                            <div class="position-absolute bottom-0 end-0 d-none d-md-block">
                                <img class="pic-width-laptop transform_img" src="image/undraw_dreamer_re_9tua 1.png"
                                    alt="user" width="100%">
                            </div>

                        </div>
                    </div>



                </div>


            </div>
        </div>
    @endif
@endsection


@section('script')
    <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
@endsection
