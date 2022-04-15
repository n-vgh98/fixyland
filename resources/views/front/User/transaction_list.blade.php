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
                    <h1 class="mb-4"> لیست سفارشات </h1>

                    <!--order-list menu (swiper)-->
                    <div class="swiper mySwiper w-100">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1 darkYellow">در دست اجرا</div>
                            <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">در انتظار تایید</div>
                            <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">گذشته</div>
                            <div class="swiper-slide w-auto ms-1 me-lg-5 ms-lg-5 rounded p-1">لغو شده</div>
                        </div>
                    </div>

                    <!--در دست اجرا-->
                    <div
                        class="user-order-list-menu-item w-100 h-100 border-gray pt-1 padding-bottom mb-5 d-flex flex-column align-items-center gap-3">

                        <!--default box-->
                        <div id="running_job" class="w-100 d-flex flex-column align-items-center">

                            <!-- box 1 -->
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($doing_archives as $doing_archive)
                                @if ($doing_archive->order->user_id == Auth::user()->id)
                                    <div class="w-100 d-flex flex-column align-items-center">
                                        <div
                                            class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div
                                                        class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
                                                        <div>
                                                            <img class="rounded-3 mw-100 nh-100" src="image/human1.jpg"
                                                                alt="specialist" height="auto">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-12 mt-2 text-center mt-sm-0 text-lg-end p-0">
                                                        <p class="m-0 pb-2 me-lg-3 fw-bold">
                                                            نام:{{ $doing_archive->technician->firstname }}
                                                            {{ $doing_archive->technician->lastname }} </p>
                                                        <p class="m-0 pb-2 me-lg-3 fw-bold"> نوع:
                                                            {{ $doing_archive->order->service->name }} </p>
                                                        @if ($doing_archive->order->order_address_id == null)
                                                            <p class="m-0 pb-2 me-lg-3 fw-bold">
                                                                آدرس:{{ $doing_archive->order->address->state->name }}-{{ $doing_archive->order->address->city->name }}-{{ $doing_archive->order->address->description }}
                                                            </p>
                                                        @else
                                                            <p class="m-0 pb-2 me-lg-3 fw-bold">
                                                                آدرس:{{ $doing_archive->order->order_address->state->name }}-{{ $doing_archive->order->order_address->city->name }}-{{ $doing_archive->order->order_address->description }}
                                                            </p>
                                                        @endif
                                                        <p class="m-0 pb-3 me-lg-3 fw-bold"> شرح مشکل:
                                                            {{ $doing_archive->order->description }} </p>
                                                        @php
                                                            $favs = auth()->user()->favortechs;
                                                            $favids = [];
                                                            foreach ($favs as $fav) {
                                                                array_push($favids, $fav->technician->id);
                                                            }
                                                        @endphp
                                                        <form class="me-3" method="post"
                                                            action="{{ route('user.panel.profile.favorittech.store', $doing_archive->technician->id) }}">
                                                            @csrf
                                                            @if (in_array($doing_archive->technician->id, $favids))
                                                                <button type="submit" class="border-0 bg-white text-danger">
                                                                    حذف از متخصص منتخب
                                                                    <i class="fa-solid fa-heart text-danger"></i>
                                                                </button>
                                                            @else
                                                                <button type="submit" class="border-0 bg-white text-danger">
                                                                    افزودن به متخصص منتخب
                                                                    <i class="fa-regular fa-heart text-dark"></i>
                                                                </button>
                                                            @endif
                                                        </form>
                                                        <p class="m-0 mt-3 pb-1 text-center text-lg-start">
                                                            {{ $doing_archive->created_at->toDateString() }} </p>

                                                    </div>

                                                </div>
                                            </div>

                                            <!--buttons( قسمت در دست اجرا )-->
                                            <div class="d-flex flex-column align-items-center mt-3">
                                                <div
                                                    class="col-12 col-lg-6 d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center w-75">
                                                    <a href="online-chat.html"
                                                        class="btn text-decoration-none text-black darkYellow w-50"> <i
                                                            class="fa-solid fa-comments"></i> چت با متخصص </a>

                                                    <a href="#" class="btn text-decoration-none text-black darkYellow w-50">
                                                        <i class="fa-solid fa-phone-flip"></i> تماس با متخصص </a>
                                                </div>

                                                <div
                                                    class="col-12 col-lg-6 d-flex justify-content-lg-between gap-1 mb-1 flex-column flex-lg-row align-items-center w-75">
                                                    <button id="paying_btn{{ $i }}"
                                                        class="paying_btn btn text-black lightgreen w-50" type="button">
                                                        اتمام این کار </button>
                                                    <form class="w-50" method="POST"
                                                        action="{{ route('user.panel.transactions.cancele.change_status', $doing_archive->id) }}">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="status" value="3">
                                                        <button class="btn btn-outline-danger white text-black w-100"
                                                            type="submit"> لغو این کار </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>




                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endif
                            @endforeach
                        </div>


                        <!--پرداخت کاربر 1-->
                        @foreach ($doing_archives as $doing_archive)
                            <div class="user_payment w-100 d-flex justify-content-center d-none">
                                <div class="row w-100 m-0">
                                    <div class="col-12 col-lg-6">
                                        <div>
                                            <button type="button"
                                                class="runing-job-back btn p-0 ps-2 pe-2 gray-text font-size24"> <i
                                                    class="fa-solid fa-xmark"></i> </button>
                                        </div>
                                        <p class="font-size24 fw-bold"> اتمام کار توسط مشتری </p>
                                        <p>
                                            خدمات: {{ $doing_archive->order->service->name }}
                                        </p>
                                        <p>
                                            شناسه قرارداد: {{ $doing_archive->id }}
                                        </p>
                                        <p>
                                            پس از پایان کار توافق براساس قیمت و کار صورت بگیرد.
                                        </p>

                                        <form class="mt-4" method="post"
                                            action="{{ route('payment.pay', $doing_archive->id) }}">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="wages0" class="form-label">
                                                    دستمزد انجام کار
                                                </label>
                                                <input type="text" class="form-control text-center border border-dark p-2"
                                                    id="wages0" value="{{ $doing_archive->service_cost }} ریال" disabled>
                                            </div>

                                            <div class="mb-4">
                                                <label for="equipment-cost0" class="form-label">
                                                    هزینه وسایل
                                                </label>
                                                <input id="equipment-cost0" type="text"
                                                    class="form-control text-center border border-dark p-2"
                                                    value="{{ $doing_archive->stuff_cost }} ریال" disabled>
                                            </div>

                                            <div class="mb-4">
                                                <label for="transportation-cost0" class="form-label">
                                                    ایاب و ذهاب
                                                </label>
                                                <input id="transportation-cost0" type="text"
                                                    class="form-control text-center border border-dark p-2"
                                                    value="{{ $doing_archive->transport_cost }} ریال" disabled>
                                            </div>
                                            @if ($doing_archive->total_price == null)
                                                <div class="mb-4">
                                                    <div class="d-flex justify-content-between">
                                                        <label for="total-cost0" class="form-label">
                                                            جمع کل هزینه ها
                                                        </label>
                                                    </div>
                                                    <input id="total-cost0" type="text"
                                                        class="form-control text-center border border-dark lightgreen-text fw-bold p-2"
                                                        value="{{ $doing_archive->final_price }} ریال" disabled>

                                                </div>
                                            @else
                                                <div class="mb-4">
                                                    <div class="d-flex justify-content-between">
                                                        <label for="total-cost0" class="form-label">
                                                            جمع کل هزینه ها
                                                        </label>
                                                        <del class="fw-bold"> {{ $doing_archive->final_price }}
                                                        </del>
                                                    </div>
                                                    <input id="total-cost0" type="text"
                                                        class="form-control text-center border border-dark lightgreen-text fw-bold p-2"
                                                        value="{{ $doing_archive->total_price }} ریال" disabled>

                                                </div>
                                            @endif
                                            <div
                                                class="d-flex justify-content-between flex-column flex-md-row mb-md-4 ps-2 pe-2">
                                                <div>
                                                    <input type="checkbox" class="form-check-input" name="confirm"
                                                        value="1">
                                                    <label class="form-check-label pe-1 darkYellow-text fw-bold"
                                                        for="confirm0">
                                                        تایید می کنم
                                                    </label>
                                                </div>

                                                <div class="mt-3 mb-3 mt-md-0 mb-md-0">
                                                    <button type="button" class="btn p-0 darkYellow-text_onHover"
                                                        data-bs-toggle="modal" data-bs-target="#disapprove_modal0"
                                                        data-bs-whatever="@mdo"> عدم رضایت</button>



                                                </div>
                                            </div>

                                            <label for="discount-code0" class="form-label fw-bold">کد تخفیف</label>
                                            <div class="d-flex justify-content-center">
                                                <div class="input-group mb-3 w-100 darkYellow-border rounded-3" dir="ltr">
                                                    <input id="discount-code0" name="dicsount" type="text"
                                                        class="discount_input form-control form-bg-color border-0 text-center"
                                                        aria-label="text with button addon" aria-describedby="button-addon0"
                                                        placeholder="کد تخفیف">
                                                </div>
                                            </div>
                                            <button type="submit" class="pay_btn btn w-100 border border-2 p-2">
                                                پرداخت از درگاه
                                            </button>
                                        </form>
                                        <!--modal start-->
                                        <div class="modal fade" id="disapprove_modal0" tabindex="-1"
                                            aria-labelledby="ModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <form method="post"
                                                            action="{{ route('problems.store', $doing_archive->id) }}">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="message-text0" class="col-form-label">
                                                                    chera ghabool nadarid?
                                                                </label>
                                                                <textarea name="description" class="form-control" id="message-text0"></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class=" btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn darkYellow">Send
                                                                    message</button>
                                                            </div>
                                                        </form>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--modal end-->

                                    </div>

                                    <div class="col-6 d-none d-lg-flex justify-content-center align-items-center">
                                        <div class="pay-img-size">
                                            <img class="w-100" src="image/undraw_bug_fixing_oc7a 1.png"
                                                alt="fixing">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <!--در انتظار تایید-->
                    <div
                        class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
                        @foreach ($waiting_suggest as $waiting)
                            @if ($waiting->order->user_id == Auth::user()->id)
                                <div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
                                                <div>
                                                    <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg"
                                                        alt="specialist" height="auto">
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-12 mt-2 text-center mt-sm-0 text-lg-end p-0">
                                                <p class="m-0 pb-2 me-lg-3 fw-bold"> نام:
                                                    {{ $waiting->technician->firstname }}
                                                    {{ $waiting->technician->lastname }}
                                                </p>
                                                <p class="m-0 pb-2 me-lg-3 fw-bold"> نوع:
                                                    {{ $waiting->order->service->name }}
                                                </p>
                                                @if ($waiting->order->order_address_id == null)
                                                    <p class="m-0 pb-2 me-lg-3 fw-bold"> آدرس:
                                                        {{ $waiting->order->address->state->name }}-{{ $waiting->order->address->city->name }}-{{ $waiting->order->address->description }}
                                                    </p>
                                                @else
                                                    <p class="m-0 pb-2 me-lg-3 fw-bold"> آدرس:
                                                        {{ $waiting->order->order_address->state->name }}-{{ $waiting->order_address->address->city->name }}-{{ $waiting->order_address->address->description }}
                                                    </p>
                                                @endif
                                                <p class="m-0 pb-3 me-lg-3 fw-bold"> شرح مشکل:
                                                    {{ $waiting->order->description }} </p>
                                                <p class="m-0 pb-1 me-3"> کدپیگیری: {{ $waiting->id }} </p>
                                                <p class="m-0 mt-3 pb-1 text-start">
                                                    {{ $waiting->created_at->toDateString() }} </p>
                                                <form class="w-50" method="POST"
                                                    action="{{ route('user.panel.transactions.cancele.waiting.suggest', $waiting->id) }}">
                                                    @csrf
                                                    @method('POST')
                                                    <button class="btn btn-outline-danger white text-black w-100"
                                                        type="submit"> لغو این کار </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @endif
                        @endforeach
                    </div>


                    <!--گذشته-->
                    <div
                        class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
                        @foreach ($past_archives as $past)
                            @if ($past->order->user_id == Auth::user()->id)
                                <div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">

                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
                                                <div>
                                                    <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg"
                                                        alt="specialist" height="auto">
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-12 mt-2 text-center mt-sm-0 text-lg-end p-0">
                                                <p class="m-0 pb-2 me-lg-3 fw-bold"> نام:
                                                    {{ $past->technician->firstname }}
                                                    {{ $past->technician->lastname }}
                                                </p>
                                                <p class="m-0 pb-2 me-lg-3 fw-bold"> نوع:
                                                    {{ $past->order->service->name }}
                                                </p>
                                                @if ($past->order->order_address_id == null)
                                                    <p class="m-0 pb-2 me-lg-3 fw-bold"> آدرس:
                                                        {{ $past->order->address->state->name }}-{{ $past->order->address->city->name }}-{{ $past->order->address->description }}
                                                    </p>
                                                @else
                                                    <p class="m-0 pb-2 me-lg-3 fw-bold"> آدرس:
                                                        {{ $past->order->order_address->state->name }}-{{ $past->order->order_address->city->name }}-{{ $past->order->order_address->description }}
                                                    </p>
                                                @endif
                                                <p class="m-0 pb-3 me-lg-3 fw-bold"> شرح مشکل:
                                                    {{ $past->order->description }} </p>
                                                <form class="me-3 pb-3">
                                                    <button type="submit" class="border-0 bg-white text-danger">
                                                        افزودن به متخصص منتخب
                                                        <i class="fa-regular fa-heart text-dark"></i>
                                                    </button>
                                                </form>
                                                <p class="m-0 pb-1 me-3"> کدپیگیری: 655423 </p>
                                                <p class="m-0 pb-3 me-3"> هزینه پرداخت شده: 130.000 تومان </p>
                                                <p class="m-0 mt-3 pb-1 text-start">
                                                    {{ $past->created_at->toDateString() }} </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @endif
                        @endforeach
                    </div>



                    <!--لغو شده-->
                    <div
                        class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
                        @foreach ($cancele_archives as $cancele)
                            @if ($cancele->order->user_id == Auth::user()->id)
                                <div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
                                                <div>
                                                    <img class="rounded-3 mw-100 nh-100" src="image/human4.jpg"
                                                        alt="specialist" height="auto">
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-12 mt-2 text-center mt-sm-0 text-lg-end p-0">
                                                <p class="m-0 pb-2 me-lg-3 fw-bold">
                                                    نام:{{ $cancele->technician->firstname }}
                                                    {{ $cancele->technician->lastname }}
                                                </p>
                                                <p class="m-0 pb-2 me-lg-3 fw-bold"> نوع:
                                                    {{ $cancele->order->service->name }} </p>
                                                @if ($cancele->order->order_address_id == null)
                                                    <p class="m-0 pb-2 me-lg-3 fw-bold"> آدرس:
                                                        {{ $cancele->order->address->state->name }}-{{ $cancele->order->address->city->name }}-{{ $cancele->order->address->description }}
                                                    </p>
                                                @else
                                                    <p class="m-0 pb-2 me-lg-3 fw-bold"> آدرس:
                                                        {{ $cancele->order->order_address->state->name }}-{{ $cancele->order->order_address->city->name }}-{{ $cancele->order->order_address->description }}
                                                    </p>
                                                @endif
                                                <p class="m-0 pb-3 me-lg-3 fw-bold"> شرح مشکل:
                                                    {{ $cancele->order->description }} </p>
                                                <form class="me-3">
                                                    <button type="submit" class="border-0 bg-white text-danger">
                                                        افزودن به متخصص منتخب
                                                        <i class="fa-regular fa-heart text-dark"></i>
                                                    </button>
                                                </form>
                                                <p class="m-0 mt-3 pb-1 text-start">
                                                    {{ $cancele->created_at->toDateString() }} </p>

                                            </div>
                                        </div>
                                    </div>




                                </div>
                            @endif
                        @endforeach
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
                    <h1 class="mb-4"> list sefareshat </h1>

                    <!--order-list menu (swiper)-->
                    <div class="swiper mySwiper w-100">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1 darkYellow">dar dast ejra</div>
                            <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">dar entezare taeid</div>
                            <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">gozashte</div>
                            <div class="swiper-slide w-auto me-5 me-lg-5 ms-lg-5 rounded p-1">laghv shode</div>
                        </div>
                    </div>
                    <!--در دست اجرا-->
                    <div
                        class="user-order-list-menu-item w-100 h-100 border-gray pt-1 padding-bottom mb-5 d-flex flex-column align-items-center gap-3">

                        <!--default box-->
                        <div id="running_job" class="w-100 d-flex flex-column align-items-center">

                            <!-- box 1 -->
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($doing_archives as $doing_archive)
                                @if ($doing_archive->order->user_id == Auth::user()->id)
                                    <div class="w-100 d-flex flex-column align-items-center">
                                        <div
                                            class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
                                            <div class="container-fluid">
                                                <div class="row">

                                                    <div
                                                        class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
                                                        <div>
                                                            <img class="rounded-3 mw-100 hw-100" src="image/human1.jpg"
                                                                alt="specialist" height="auto">
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-9 col-12 mt-2 mt-sm-0 p-0">
                                                        <p class="m-0 pb-2 ms-lg-3 "> name:
                                                            {{ $doing_archive->technician->firstname }}
                                                            {{ $doing_archive->technician->lastname }} </p>
                                                        <p class="m-0 pb-2 ms-lg-3 "> noe:
                                                            {{ $doing_archive->order->service->name }} </p>
                                                        @if ($doing_archive->order->order_address_id == null)
                                                            <p class="m-0 pb-2 ms-lg-3 "> address:
                                                                {{ $doing_archive->order->address->state->name }}-{{ $doing_archive->order->address->city->name }}-{{ $doing_archive->order->address->description }}
                                                            </p>
                                                        @else
                                                            <p class="m-0 pb-2 ms-lg-3 "> address:
                                                                {{ $doing_archive->order->order_address->state->name }}-{{ $doing_archive->order->order_address->city->name }}-{{ $doing_archive->order->order_address->description }}
                                                            </p>
                                                        @endif
                                                        <p class="m-0 pb-3 ms-lg-3 "> sharh:
                                                            {{ $doing_archive->order->description }} </p>
                                                        <form class="ms-lg-3">
                                                            <button type="submit"
                                                                class="border-0 bg-white text-danger text-start">
                                                                <i class="fa-regular fa-heart text-dark"></i>
                                                                ezafe be motekhases montakhab
                                                            </button>
                                                        </form>
                                                        <p class="m-0 mt-3 pb-1 text-center text-lg-end">
                                                            {{ $doing_archive->created_at->toDateString() }} </p>

                                                    </div>

                                                </div>
                                            </div>


                                            <!--buttons( قسمت در دست اجرا )-->
                                            <div class="d-flex flex-column align-items-center mt-3">
                                                <div
                                                    class="col-12 col-lg-6 d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center w-75">
                                                    <a href="online-chat.html"
                                                        class="btn text-decoration-none text-black darkYellow w-50"> <i
                                                            class="fa-solid fa-comments"></i> chat </a>

                                                    <a href="#"
                                                        class="btn text-decoration-none text-black darkYellow w-50"> <i
                                                            class="fa-solid fa-phone-flip"></i> call </a>
                                                </div>

                                                <div
                                                    class="col-12 col-lg-6 d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center w-75">
                                                    <button id="paying_btn{{ $i }}"
                                                        class="paying_btn btn text-black lightgreen w-50">
                                                        etmam kar </button>

                                                    <form class="w-50" method="POST"
                                                        action="{{ route('user.panel.transactions.cancele.change_status', $doing_archive->id) }}">
                                                        @csrf
                                                        @method('POST')
                                                        <input type="hidden" name="status" value="3">
                                                        <button class="btn btn-outline-danger white text-black w-100"
                                                            type="submit"> cancel </button>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endif
                            @endforeach
                        </div>


                        <!--پرداخت کاربر 1-->
                        @foreach ($doing_archives as $doing_archive)
                            <div class="user_payment w-100 d-flex justify-content-center d-none">
                                <div class="row w-100 m-0">
                                    <div class="col-12 col-lg-6">
                                        <div>
                                            <button type="button"
                                                class="runing-job-back btn p-0 ps-2 pe-2 gray-text font-size24"> <i
                                                    class="fa-solid fa-xmark"></i> </button>
                                        </div>
                                        <p class="font-size24 fw-bold"> etmam kar tavasot moshtari </p>
                                        <p>
                                            khadamat: {{ $doing_archive->order->service->name }}
                                        </p>
                                        <p>
                                            shenase: {{ $doing_archive->id }}
                                        </p>
                                        <p>
                                            pas az payan kar tavafogh bar asas gharardad bashad.
                                        </p>

                                        <form class="mt-4">
                                            <div class="mb-4">
                                                <label for="wages0" class="form-label">
                                                    dastmozd:
                                                </label>
                                                <input type="text" class="form-control text-center border border-dark p-2"
                                                    id="wages0" value="$ {{ $doing_archive->service_cost }}" disabled>
                                            </div>

                                            <div class="mb-4">
                                                <label for="equipment-cost0" class="form-label">
                                                    hazine vasayel:
                                                </label>
                                                <input id="equipment-cost0" type="text"
                                                    class="form-control text-center border border-dark p-2"
                                                    value="$ {{ $doing_archive->stuff_cost }}" disabled>
                                            </div>

                                            <div class="mb-4">
                                                <label for="transportation-cost0" class="form-label">
                                                    ayab o zahab:
                                                </label>
                                                <input id="transportation-cost0" type="text"
                                                    class="form-control text-center border border-dark p-2"
                                                    value="$ {{ $doing_archive->transport_cost }}" disabled>
                                            </div>
                                            @if ($doing_archive->total_price == null)
                                                <div class="mb-4">
                                                    <div class="d-flex justify-content-between">
                                                        <label for="total-cost0" class="form-label">
                                                            jame kole hazine ha:
                                                        </label>
                                                    </div>
                                                    <input id="total-cost0" type="text"
                                                        class="form-control text-center border border-dark lightgreen-text fw-bold p-2"
                                                        value="$ {{ $doing_archive->final_price }}" disabled>

                                                </div>
                                            @else
                                                <div class="mb-4">
                                                    <div class="d-flex justify-content-between">
                                                        <label for="total-cost0" class="form-label">
                                                            jame kole hazine ha:
                                                        </label>
                                                        <del class="fw-bold"> {{ $doing_archive->final_price }}
                                                        </del>
                                                    </div>
                                                    <input id="total-cost0" type="text"
                                                        class="form-control text-center border border-dark lightgreen-text fw-bold p-2"
                                                        value="$ {{ $doing_archive->total_price }}" disabled>

                                                </div>
                                            @endif
                                            <div
                                                class="d-flex justify-content-between flex-column flex-md-row mb-md-4 ps-2 pe-2">
                                                <div>
                                                    <input type="checkbox" required="required" class="form-check-input"
                                                        id="confirm0">
                                                    <label class="form-check-label ps-1 darkYellow-text fw-bold"
                                                        for="confirm0">
                                                        Agree
                                                    </label>
                                                </div>

                                                <div class="mt-3 mb-3 mt-md-0 mb-md-0">
                                                    <button type="button" class="btn p-0 darkYellow-text_onHover"
                                                        data-bs-toggle="modal" data-bs-target="#disapprove_modal0"
                                                        data-bs-whatever="@mdo">mablagh mored ghabool nist</button>

                                                    <!--modal start-->
                                                    <div class="modal fade" id="disapprove_modal0" tabindex="-1"
                                                        aria-labelledby="ModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-body">
                                                                    <form method="post"
                                                                        action="{{ route('problems.store', $doing_archive->id) }}">
                                                                        @csrf
                                                                        <div class="mb-3">
                                                                            <label for="message-text0"
                                                                                class="col-form-label">
                                                                                chera ghabool nadarid?
                                                                            </label>
                                                                            <textarea name="description" class="form-control" id="message-text0"></textarea>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button class=" btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn darkYellow">Send
                                                                                message</button>
                                                                        </div>
                                                                    </form>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--modal end-->

                                                </div>
                                            </div>

                                            <form class="mb-4">
                                                <div class="text-end"><label for="discount-code0"
                                                        class="form-label fw-bold">
                                                        coupan</label></div>
                                                <div class="d-flex justify-content-center">
                                                    <div class="input-group mb-3 w-100 darkYellow-border rounded-3"
                                                        dir="ltr">
                                                        <button class="discount_btn btn darkYellow" type="button"
                                                            id="button-addon0">
                                                            submit
                                                        </button>
                                                        <input id="discount-code0" type="text"
                                                            class="discount_input form-control form-bg-color border-0 text-center"
                                                            aria-label="text with button addon"
                                                            aria-describedby="button-addon0" placeholder="coupan">
                                                    </div>
                                                </div>
                                            </form>


                                            <button class="pay_btn btn w-100 border border-2 p-2">
                                                pardakht
                                            </button>
                                            <a href="#"
                                                class="pay_btn btn text-decoration-none text-black w-100 border-0 darkYellow p-2 d-none">pardakht</a>



                                        </form>



                                    </div>

                                    <div class="col-6 d-none d-lg-flex justify-content-center align-items-center">
                                        <div class="pay-img-size">
                                            <img class="w-100" src="image/undraw_bug_fixing_oc7a 1.png"
                                                alt="fixing">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                    <!--در انتظار تایید-->
                    <div
                        class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
                        @foreach ($waiting_suggest as $waiting)
                            @if ($waiting->order->user_id == Auth::user()->id)
                                <div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
                                                <div>
                                                    <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg"
                                                        alt="specialist" height="auto">
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-12 mt-2 mt-sm-0 p-0">
                                                <p class="m-0 pb-2 ms-lg-3 fw-bold"> name:
                                                    {{ $waiting->technician->firstname }}
                                                    {{ $waiting->technician->lastname }}
                                                </p>
                                                <p class="m-0 pb-2 ms-lg-3 fw-bold"> noe:
                                                    {{ $waiting->order->service->name }} </p>
                                                @if ($waiting->order->order_address_id == null)
                                                    <p class="m-0 pb-2 ms-lg-3 fw-bold"> adr:
                                                        {{ $waiting->order->address->state->name }}-{{ $waiting->order->address->city->name }}-{{ $waiting->order->address->description }}
                                                    </p>
                                                @else
                                                    <p class="m-0 pb-2 ms-lg-3 fw-bold"> adr:
                                                        {{ $waiting->order->order_address->state->name }}-{{ $waiting->order->order_address->city->name }}-{{ $waiting->order->order_address->description }}
                                                    </p>
                                                @endif
                                                <p class="m-0 pb-3 ms-lg-3 fw-bold"> sharhe moshkel:
                                                    {{ $waiting->order->description }} </p>
                                                <form class="ms-lg-3 pb-3">
                                                    <button type="submit" class="border-0 bg-white text-danger text-start">
                                                        <i class="fa-regular fa-heart text-dark"></i>
                                                        afzoodan be montakhab
                                                    </button>
                                                </form>
                                                <p class="m-0 pb-1 ms-lg-3"> code: {{ $waiting->id }} </p>
                                                <p class="m-0 mt-3 pb-1 text-end">
                                                    {{ $waiting->created_at->toDateString() }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @endif
                        @endforeach
                    </div>

                    <!--گذشته-->
                    <div
                        class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
                        @foreach ($past_archives as $past)
                            @if ($past->order->user_id == Auth::user()->id)
                                <div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
                                                <div>
                                                    <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg"
                                                        alt="specialist" height="auto">
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-12 mt-2 mt-sm-0 p-0">
                                                <p class="m-0 pb-2 ms-lg-3 fw-bold"> name:
                                                    {{ $past->technician->firstname }}
                                                    {{ $past->technician->lastname }}
                                                </p>
                                                <p class="m-0 pb-2 ms-lg-3 fw-bold"> noe:
                                                    {{ $past->order->service->name }} </p>
                                                @if ($past->order->order_address_id == null)
                                                    <p class="m-0 pb-2 ms-lg-3 fw-bold"> adr:
                                                        {{ $past->order->address->state->name }}-{{ $past->order->address->city->name }}-{{ $past->order->address->description }}
                                                    </p>
                                                @else
                                                    <p class="m-0 pb-2 ms-lg-3 fw-bold"> adr:
                                                        {{ $past->order->order_address->state->name }}-{{ $past->order->order_address->city->name }}-{{ $past->order->order_address->description }}
                                                    </p>
                                                @endif
                                                <p class="m-0 pb-3 ms-lg-3 fw-bold"> sharhe moshkel:
                                                    {{ $past->order->description }} </p>
                                                <form class="ms-lg-3 pb-3">
                                                    <button type="submit" class="border-0 bg-white text-danger text-start">
                                                        <i class="fa-regular fa-heart text-dark"></i>
                                                        afzoodan be montakhab
                                                    </button>
                                                </form>
                                                <p class="m-0 pb-1 ms-lg-3"> code: 656565 </p>
                                                <p class="m-0 pb-3 ms-lg-3"> pardakht shode: $ 1300 </p>
                                                <p class="m-0 mt-3 pb-1 text-end">
                                                    {{ $past->created_at->toDateString() }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            @endif
                        @endforeach
                    </div>



                    <!--لغو شده-->
                    <div
                        class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
                        @foreach ($cancele_archives as $cancele)
                            @if ($cancele->order->user_id == Auth::user()->id)
                                <div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
                                                <div>
                                                    <img class="rounded-3 mw-100 nh-100" src="image/human4.jpg"
                                                        alt="specialist" height="auto">
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-12 mt-2 mt-sm-0 p-0">
                                                <p class="m-0 pb-2 ms-lg-3 fw-bold"> name:
                                                    {{ $cancele->technician->firstname }}
                                                    {{ $cancele->technician->lastname }} </p>
                                                <p class="m-0 pb-2 ms-lg-3 fw-bold"> noe:
                                                    {{ $cancele->order->service->name }} </p>
                                                @if ($cancele->order->order_address_id == null)
                                                    <p class="m-0 pb-2 ms-lg-3 fw-bold"> adr:
                                                        {{ $cancele->order->address->state->name }}-{{ $cancele->order->address->city->name }}-{{ $cancele->order->address->description }}
                                                    </p>
                                                @else
                                                    <p class="m-0 pb-2 me-lg-3 fw-bold"> آدرس:
                                                        {{ $cancele->order->order_address->state->name }}-{{ $cancele->order->order_address->city->name }}-{{ $cancele->order->order_address->description }}
                                                    </p>
                                                @endif
                                                <p class="m-0 pb-3 ms-lg-3 fw-bold"> sharhe moshkel: jjj </p>
                                                <form class="ms-lg-3">
                                                    <button type="submit" class="border-0 bg-white text-danger text-start">
                                                        <i class="fa-regular fa-heart text-dark"></i>
                                                        afzoodan be montakhab
                                                    </button>
                                                </form>
                                                <p class="m-0 mt-3 pb-1 text-lg-end text-center">
                                                    {{ $cancele->created_at->toDateString() }} </p>

                                            </div>
                                        </div>
                                    </div>




                                </div>
                            @endif
                        @endforeach
                    </div>


                </div>


            </div>
        </div>
    @endif
@endsection


@section('script')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/user-order-list.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('frontend/fixy-land-en-main/script/user-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/user-order-list.js') }}" type="text/javascript"></script>
    @endif
@endsection
