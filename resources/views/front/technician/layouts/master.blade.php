@extends('front.layouts.master')
@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        پل متخصص
    @else
        technician panel
    @endif
@endsection

@section('head')
    <!--croppie styles and scripts cdn (crop image)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <main class="container-fluid p-0">

            <div class="container-fluid p-0">
                <div class="row ms-0 me-0 position-relative">
                    <!--profile panel-->
                    <div
                        class="profile-box h-75 col-md-3 d-none d-md-flex flex-column align-items-center ps-0 pe-0 pt-5 pb-5">

                        <div class="position-relative mb-4 text-center">
                            @if (auth()->user()->profile_photo_path == null)
                                <img class="rounded-circle"
                                    src="{{ asset('frontend/fixy-land-fa-main/image/pf-pic.png') }}" alt="profile picture"
                                    height="150px" width="150px">
                            @else
                                <img class="rounded-circle"
                                    src="{{ asset('storage/' . auth()->user()->profile_photo_path) }}"
                                    alt="profile picture" height="150px" width="150px">
                            @endif

                            <div class="position-absolute bottom-0 end-0">
                                <!-- Modal button-->
                                <button id="modal-btn" type="button" class="btn no-shadow p-0 m-0" data-bs-toggle="modal"
                                    data-bs-target="#pf_pic_Modal">
                                    <img src="{{ asset('frontend/fixy-land-en-main/image/pf-pic-update.png') }}"
                                        alt="new pf pic" height="45px" width="45px">
                                </button>
                            </div>

                            <!-- Modal for profile picture -->
                            <div class="modal fade" id="pf_pic_Modal" tabindex="-1" aria-labelledby="pf_pic_Modal"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <form action="{{ route('user.panel.profile.pic.change') }}"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
                                            <!--modal header-->
                                            <div class="modal-header d-flex justify-content-between">
                                                <h5 class="modal-title" id="pf_modal_label"> انتخاب عکس </h5>
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
                                                                    <p class="fw-bold"> آپلود عکس </p>

                                                                    <input type="file" name="profile_pic" id="image"
                                                                        class="mt-3 mb-4">
                                                                    <button
                                                                        class="btn btn-block btn-upload-image darkYellow">
                                                                        برش عکس
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--modal footer-->
                                            <div class="modal-footer d-flex justify-content-start">
                                                <button type="submit" class="btn darkYellow">ذخیره عکس</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <p class="gray-text m-0 mb-1"> {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                        </p>
                        <p class="gray-text m-0 mb-1"> {{ auth()->user()->email }} </p>
                        <p class="gray-text m-0 mb-1"> {{ auth()->user()->phone }} </p>

                        <div class="mt-3 w-100 d-flex justify-content-between">
                            <a href="{{ route('front.technician.panel.changepassword') }}"
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
                                class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> پنل کاربری </a>
                        </div>

                        <div class="d-flex p-2 ps-3 pe-3 w-100">
                            <i class="fa-solid fa-pen-to-square ms-3 mt-1"></i>
                            <a href="{{ route('front.technician.panel.edit') }}"
                                class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> ویرایش پروفایل
                            </a>
                        </div>

                        <div class="d-flex p-2 ps-3 pe-3 w-100">
                            <i class="fa-solid fa-dollar-sign ms-3 mt-1"></i>
                            <div id="Financial-sec"
                                class="text-decoration-none darkYellow-text_onHover text-black-no-hover question-div1">
                                بخش مالی
                                <i id="angle-down" class="fa-solid fa-angle-down me-2"></i>
                                <ul class="Financial-list m-0 d-none">
                                    <li><a href="spc-income.html"
                                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> درآمد
                                            من </a></li>
                                    <li><a href="spc-money-demand.html"
                                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> تقاضای
                                            وجه </a></li>
                                    <li><a href="spc-reward.html"
                                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> دریافت
                                            پاداش </a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex p-2 ps-3 pe-3 w-100">
                            <i class="fa-regular fa-hard-drive ms-3 mt-1"></i>
                            <a href="{{ route('front.technician.panel.workdesk') }}"
                                class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> میزکار </a>
                        </div>

                        <div class="d-flex p-2 ps-3 pe-3 w-100">
                            <i class="fa-solid fa-headset ms-3 mt-1"></i>
                            <a href="#" class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> مرکز
                                پشتیبانی </a>
                        </div>

                        <div class="d-flex p-2 ps-3 pe-3 w-100">
                            <i class="fa-solid fa-newspaper ms-3 mt-1"></i>
                            <a href="{{ route('front.technician.panel.notification') }}"
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
                        @yield("tec_panel")
                    </div>
                </div>
            </div>


        </main>
    @else
        <main class="container-fluid p-0">

            <div class="container-fluid p-0">
                <div class="row ms-0 me-0 position-relative">
                    <!--profile panel-->
                    <div
                        class="profile-box h-75 col-md-3 d-none d-md-flex flex-column align-items-center ps-0 pe-0 pt-5 pb-5">

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
                                        <form action="{{ route('user.panel.profile.pic.change') }}"
                                            enctype="multipart/form-data" method="POST">
                                            @csrf
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
                                                                    <p class="fw-bold"> Upload Image </p>

                                                                    <input type="file" name="profile_pic" id="image"
                                                                        class="mt-3 mb-4">
                                                                    <button
                                                                        class="btn btn-block btn-upload-image darkYellow">
                                                                        Crop Image
                                                                    </button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--modal footer-->
                                            <div class="modal-footer d-flex justify-content-start">
                                                <button type="submit" class="btn darkYellow">Save Image</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <p class="gray-text m-0 mb-1"> {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                        </p>
                        <p class="gray-text m-0 mb-1"> {{ auth()->user()->email }} </p>
                        <p class="gray-text m-0 mb-1"> {{ auth()->user()->phone }} </p>

                        <div class="mt-3 w-100 d-flex justify-content-between">
                            <a href="{{ route('front.technician.panel.changepassword') }}"
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
                                class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> profile </a>
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
                                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover">
                                            income </a></li>
                                    <li><a href="spc-money-demand.html"
                                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> money
                                            demand </a></li>
                                    <li><a href="spc-reward.html"
                                            class="text-decoration-none darkYellow-text_onHover text-black-no-hover">
                                            reward </a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="d-flex p-2 ps-3 pe-3 w-100">
                            <i class="fa-regular fa-hard-drive me-3 mt-1"></i>
                            <a href="{{ route('front.technician.panel.workdesk') }}"
                                class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> desk </a>
                        </div>

                        <div class="d-flex p-2 ps-3 pe-3 w-100">
                            <i class="fa-solid fa-headset me-3 mt-1"></i>
                            <a href="#" class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> support
                            </a>
                        </div>

                        <div class="d-flex p-2 ps-3 pe-3 w-100">
                            <i class="fa-solid fa-newspaper me-3 mt-1"></i>
                            <a href="{{ route('front.technician.panel.notification') }}"
                                class="text-decoration-none darkYellow-text_onHover text-black-no-hover"> fixy land msgs
                            </a>
                        </div>

                        <!--اشتراک گذاری-->
                        <div class="d-flex p-2 ps-3 pe-3 w-100">
                            <i class="fa-solid fa-share-nodes me-3 mt-1"></i>
                            <!-- Modal button -->
                            <button id="share_btn" type="button"
                                class="btn darkYellow-text_onHover text-black-no-hover p-0 no-shadow"
                                data-bs-toggle="modal" data-bs-target="#share-modal"> share website </button>

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
                        @yield('tec_panel')

                    </div>


                </div>
            </div>


        </main>
    @endif
@endsection
@section('script')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <!--scripts from script folder	-->
        <script src="{{ asset('frontend/fixy-land-fa-main/script/spc-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('frontend/fixy-land-en-main/script/spc-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/user-panel.js') }}" type="text/javascript"></script>
    @endif
@endsection
