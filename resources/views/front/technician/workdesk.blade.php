@extends('front.technician.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        پل متخصص
    @else
        technician panel
    @endif
@endsection

@section('tec_panel')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <h1 class="mb-4"> میزکار </h1>

        <!--order-list menu (swiper)-->
        <div class="swiper mySwiper w-100">
            <div class="swiper-wrapper">
                <div class="swiper-slide w-auto darkYellow me-lg-5 ms-lg-5 rounded p-1">پیشنهادات</div>
                <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">در دست اجرا</div>
                <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">گذشته</div>
                <div class="swiper-slide w-auto ms-1 me-lg-5 ms-lg-5 rounded p-1">لغو شده</div>
            </div>
        </div>


        <!--پیشنهادات-->

        <div class="user-order-list-menu-item w-100 h-100 pb-md-5 mb-5">

            <!--empty request-->
            @if ($proccess->isEmpty())
                <div class="empty_request w-100 border-gray d-flex justify-content-center">
                    <div class="empty_request_box form-bg-color p-md-5 pt-md-4 pb-md-4 p-2 mt-5">
                        <p> دوست عزیز
                            <br>
                            شما در حال حاضر هیچ درخواستی ندارید.
                        </p>
                    </div>

                    <!--undraw vector mobile size-->
                    <div class="position-absolute bottom-0 start-0 d-md-none">
                        <img class="pic-width-mobile" src="image/undraw_click_here_re_y6uq 1.png" alt="user" width="100%">
                    </div>

                    <!--undraw vector laptop size-->
                    <div class="position-absolute bottom-0 start-0 d-none d-md-block">
                        <img class="pic-width-laptop" src="image/undraw_click_here_re_y6uq 1.png" alt="user" width="100%">
                    </div>

                </div>
            @else
                <!--requests-->
                <div class="w-100 h-100 border-gray pt-3 pb-5 mb-5">

                    <!--requests short description-->
                    <div class="req-short-dsc d-flex flex-column align-items-center gap-3 mb-3">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($proccess as $pro)
                            <div class="container-fluid rounded-3 w-75 form-bg-color p-0">

                                <div class="row m-0">
                                    <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0">
                                        <div class="w-100">
                                            <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist"
                                                height="auto" width="100%">
                                        </div>
                                    </div>

                                    <div class="col-lg-9 col-12 mt-2 mt-sm-0 p-3 d-flex flex-column">
                                        <p class="m-0 pb-2 fw-bold"> نام مشتری: {{ $pro->order->user->firstname }}
                                            {{ $pro->order->user->lastname }} </p>
                                        <p class="m-0 pb-2 fw-bold"> نوع: {{ $pro->service->name }} </p>
                                        <p class="m-0 pb-2 fw-bold"> آدرس:
                                            {{ $pro->order_address->address->state->name }}-{{ $pro->order->order_address->city->name }}-{{ $pro->order->order_address->description }}
                                        </p>
                                        <p class="m-0 pb-3 fw-bold"> شرح مشکل: {{ $pro->order->description }} </p>
                                        <p class="m-0 mb-3 align-self-end"> {{ $pro->created_at->toDateString() }} </p>
                                        <div class="align-self-center mt-auto">
                                            <button type="button" class="more_inf_btn btn darkYellow"
                                                id="more_inf_btn{{ $i }}"> مشاهده </button>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </div>


                    <!--requests long description-->
                    @foreach ($proccess as $pro)
                        <div class="req-long-dsc d-none">
                            <div class="pe-md-3">
                                <p class="fw-bold pe-3 font-size24"> اطلاعات بیشتر </p>

                                <div class="row m-0">

                                    <div
                                        class="col-lg-2 col-md-4 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0 order-md-1 order-2">
                                        <div class="w-100 h-100">
                                            <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist"
                                                height="auto" width="100%">
                                        </div>
                                    </div>

                                    <div class="col-lg-10 col-md-8 col-12 pe-3 order-md-2 order-1">
                                        <p class="m-0 pb-2 fw-bold darkgreen-text"> شرح
                                            مشکل:{{ $pro->order->description }}
                                        </p>
                                        <p class="m-0 pb-2 fw-bold darkgreen-text"> جواب سوالات: </p>
                                        @foreach ($pro->order->formresults as $result)
                                            <p class="m-0 pb-2">{{ $result->label }}: {{ $result->value }} </p>
                                        @endforeach

                                        <p class="m-0 pb-2 fw-bold darkgreen-text"> زمان انجام کار: </p>
                                        <p class="m-0 pb-3"> {{ $pro->order->date }} {{ $pro->order->time }}</p>

                                        <p class="m-0 pb-2 fw-bold darkgreen-text"> آدرس: </p>
                                        <p class="m-0 pb-2 mb-3">
                                            {{ $pro->order->address->state->name }}-{{ $pro->order->address->city->name }}-{{ $pro->order->address->description }}
                                        </p>

                                    </div>

                                </div>


                                <div class="w-100 d-flex justify-content-center mb-1 mt-5">
                                    <div
                                        class="w-50 d-flex flex-column align-items-center flex-md-row justify-content-md-center gap-2">
                                        <form class="w-100 ms-md-2" method="POST"
                                            action="{{ route('front.technician.panel.workdesk.post.archive') }}">
                                            @csrf
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="tech_id">
                                            <input type="hidden" value="{{ $pro->order->id }}" name="order_id">
                                            <input type="hidden" value="2" name="process_status">
                                            <button class="w-100 btn btn-outline-dark darkYellow ms-md-3" type="submit">
                                                قبول </button>
                                        </form>



                                        <p class="go-back-btn btn btn-outline-dark w-100 mt-3"> بازگشت </p>
                                    </div>
                                </div>


                            </div>
                        </div>
                    @endforeach
            @endif




        </div>


        <!--در دست اجرا-->
        <div class="user-order-list-menu-item border-gray w-100 h-100 pb-2 pt-1 pb-md-5 mb-5 d-none">

            <!--running jobs-->
            <div id="running_job" class="w-100 h-100 pt-3 pb-3">

                <!--job short description-->
                <div class="job-short-dsc d-flex flex-column align-items-center gap-3 mb-3">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($doing_archives as $doing)
                        <div class="container-fluid rounded-3 w-75 form-bg-color p-0">
                            <div class="row m-0">
                                <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0">
                                    <div class="w-100">
                                        <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist"
                                            height="auto" width="100%">
                                    </div>
                                </div>

                                <div class="col-lg-9 col-12 mt-2 mt-sm-0 p-3 d-flex flex-column">
                                    <p class="m-0 pb-2 fw-bold"> نام مشتری: {{ $doing->order->user->firstname }}
                                        {{ $doing->order->user->lastname }} </p>
                                    <p class="m-0 pb-2 fw-bold"> نوع: {{ $doing->order->service->name }} </p>
                                    <p class="m-0 pb-2 fw-bold"> آدرس:
                                        {{ $doing->order->address->state->name }}-{{ $doing->order->address->city->name }}-{{ $doing->order->address->description }}
                                    </p>
                                    <p class="m-0 pb-3 fw-bold"> شرح مشکل: {{ $doing->order->description }} </p>
                                    <div class="w-100 me-md-3 mb-3 d-flex">
                                        <p class="m-0 ms-5"> {{ $doing->created_at->toTimeString() }} </p>
                                        <p class="m-0"> {{ $doing->created_at->toDateString() }} </p>
                                    </div>

                                    <div
                                        class="w-100 align-self-center mt-auto d-flex justify-content-center justify-content-md-end mb-1">
                                        <div
                                            class="w-50 d-flex flex-column align-items-center flex-md-row justify-content-md-center gap-2">

                                            <button type="button" class="job_more_inf_btn btn darkYellow w-100"
                                                id="job_more_inf_btn{{ $i }}"> مشاهده </button>

                                            <form class="w-100 ms-md-2" method="POST"
                                                action="{{ route('front.technician.panel.workdesk.changeStatus.archive.cancle', $doing->id) }}">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" name="status" value="3">
                                                <button class="w-100 btn btn-outline-dark ms-md-3"
                                                    id="cancle_job_btn{{ $i }}" type="submit"> لغو </button>
                                            </form>

                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                        @php
                            $i++;
                        @endphp
                    @endforeach


                </div>


                <!--job long description-->
                @foreach ($doing_archives as $doing)
                    <div class="job-long-dsc d-none">
                        <div class="pe-md-3">
                            <div>
                                <button type="button" class="runing-job-back btn p-0 ps-2 pe-2 gray-text font-size24"> <i
                                        class="fa-solid fa-xmark"></i> </button>
                            </div>
                            <p class="fw-bold pe-3 font-size24"> اطلاعات بیشتر </p>

                            <div class="row m-0">
                                <div
                                    class="col-lg-2 col-md-4 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0 order-md-1 order-2">
                                    <div class="w-100 h-100">
                                        <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist"
                                            height="auto" width="100%">
                                    </div>
                                </div>

                                <div class="col-lg-10 col-md-8 col-12 pe-3 order-md-2 order-1">
                                    <p class="m-0 pb-2 fw-bold darkgreen-text"> شرح مشکل:
                                        {{ $doing->order->description }}
                                    </p>
                                    <p class="m-0 pb-2 fw-bold darkgreen-text"> جواب سوالات: </p>
                                    @foreach ($doing->order->formresults as $result)
                                        <p class="m-0 pb-2">{{ $result->label }}: {{ $result->value }} </p>
                                    @endforeach
                                    <p class="m-0 pb-2 fw-bold darkgreen-text"> زمان انجام کار: </p>
                                    <p class="m-0 pb-3"> {{ $doing->order->date }} {{ $doing->order->time }}
                                    </p>

                                    <p class="m-0 pb-2 fw-bold darkgreen-text"> آدرس: </p>
                                    <p class="m-0 pb-2 mb-3">
                                        {{ $doing->order->address->state->name }}-{{ $doing->order->address->city->name }}-{{ $doing->order->address->description }}
                                    </p>

                                </div>
                            </div>


                            <!--buttons-->
                            <div class="d-flex flex-column align-items-center mt-3">
                                <div
                                    class=" d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center align-items-md-end w-75">
                                    <a href="online-chat.html" class="btn text-decoration-none text-black darkYellow w-50">
                                        <i class="fa-solid fa-comments"></i> چت با متخصص </a>

                                    <a href="#" class="btn text-decoration-none text-black darkYellow w-50"> <i
                                            class="fa-solid fa-phone-flip"></i> تماس با متخصص </a>
                                </div>

                                <div
                                    class=" d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center align-items-md-end w-75">
                                    <p id="paying_btn" class="btn text-black lightgreen w-50 m-0"> اتمام این کار </p>

                                    <a href="#" class="btn btn-outline-danger text-decoration-none white text-black w-50">
                                        لغو این کار </a>
                                </div>
                            </div>


                        </div>
                    </div>
                @endforeach

            </div>



            <!--اتمام کار توسط متخصص-->
            <div id="spc_req_money" class="w-100 d-flex justify-content-center d-none">
                <div class="row w-100 m-0">
                    <div class="col-12 col-lg-6 pe-lg-5">
                        <p class="font-size24 fw-bold"> اتمام کار (توسط متخصص) </p>
                        @foreach ($doing_archives as $doing)
                            <form class="mt-4" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="wages" class="form-label">
                                        دستمزد انجام کار
                                    </label>
                                    <input type="text" class="form-control text-center border border-dark p-2" id="wages"
                                        placeholder="مطابق توافق طرفین">
                                </div>

                                <div class="mb-4">
                                    <label for="equipment-cost" class="form-label">
                                        هزینه وسایل
                                    </label>
                                    <input id="equipment-cost" type="text"
                                        class="form-control text-center border border-dark p-2"
                                        placeholder="مطابق فاکتور ارائه شده">
                                </div>

                                <div class="mb-4">
                                    <label for="transportation-cost" class="form-label">
                                        ایاب و ذهاب
                                    </label>
                                    <input id="transportation-cost" type="text"
                                        class="form-control text-center border border-dark p-2">
                                </div>

                                <div class="mb-4">
                                    <label for="total-cost" class="form-label">
                                        جمع کل هزینه ها
                                    </label>
                                    <input id="total-cost" type="text"
                                        class="form-control text-center border border-dark lightgreen-text fw-bold p-2">
                                </div>

                                <button type="submit" class="w-100 border-0 rounded-3 darkYellow p-2">
                                    اتمام
                                </button>

                            </form>
                        @endforeach



                    </div>

                    <div class="col-6 d-none d-lg-flex justify-content-center align-items-center">
                        <div class="pay-img-size">
                            <img class="w-100" src="image/undraw_performance_overview_re_mqrq 1.png" alt="fixing">
                        </div>
                    </div>
                </div>

            </div>


        </div>


        <!--گذشته-->
        <div
            class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
            @foreach ($past_archives as $past)
                <div class="container-fluid rounded-3 w-75 form-bg-color p-0">

                    <div class="row m-0">
                        <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0">
                            <div class="w-100">
                                <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist" height="250px"
                                    width="100%">
                            </div>
                        </div>
                        <div class="col-lg-9 col-12 mt-2 mt-sm-0 p-3">
                            <p class="m-0 pb-2 fw-bold"> نام مشتری: {{ $past->order->user->firstname }}
                                {{ $past->order->user->lastname }} </p>
                            <p class="m-0 pb-2 fw-bold"> نوع: {{ $past->order->service->name }} </p>
                            <p class="m-0 pb-2 fw-bold"> آدرس:
                                {{ $past->order->address->state->name }}-{{ $past->order->address->city->name }}-{{ $past->order->address->description }}
                            </p>
                            <p class="m-0 pb-3 fw-bold"> شرح مشکل: {{ $past->order->description }} </p>
                            <div class="w-100 d-flex justify-content-center justify-content-lg-end">
                                <p class="m-0 ms-5"> {{ $past->created_at->toTimeString() }} </p>
                                <p class="m-0">{{ $past->created_at->toDateString() }} </p>
                            </div>
                        </div>
                    </div>


                </div>
            @endforeach
        </div>


        <!--لغو شده-->
        <div
            class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
            @foreach ($canceled_archives as $canceled)
                <div class="container-fluid rounded-3 w-75 form-bg-color p-0">

                    <div class="row m-0">
                        <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0">
                            <div class="w-100">
                                <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist" height="250px"
                                    width="100%">
                            </div>
                        </div>
                        <div class="col-lg-9 col-12 mt-2 mt-sm-0 p-3">
                            <p class="m-0 pb-2 fw-bold"> نام مشتری: {{ $canceled->order->user->firstname }}
                                {{ $canceled->order->user->lastname }}</p>
                            <p class="m-0 pb-2 fw-bold"> نوع: {{ $canceled->order->service->name }} </p>
                            <p class="m-0 pb-2 fw-bold"> آدرس:
                                {{ $canceled->order->address->state->name }}-{{ $canceled->order->address->city->name }}-{{ $canceled->order->address->description }}
                            </p>
                            <p class="m-0 pb-3 fw-bold"> شرح مشکل: {{ $canceled->order->description }} </p>
                            <div class="w-100 d-flex justify-content-center justify-content-lg-end">
                                <p class="m-0 ms-5"> {{ $canceled->created_at->toTimeString() }} </p>
                                <p class="m-0"> {{ $canceled->created_at->toDateString() }} </p>
                            </div>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>


        </div>
    @else
        <h1 class="mb-4"> desk </h1>

        <!--order-list menu (swiper)-->
        <div class="swiper mySwiper w-100">
            <div class="swiper-wrapper">
                <div class="swiper-slide w-auto darkYellow me-lg-5 ms-lg-5 rounded p-1">pishnahadat</div>
                <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">dar dast ejra</div>
                <div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">gozashte</div>
                <div class="swiper-slide w-auto ms-1 me-lg-5 ms-lg-5 rounded p-1">laghv shode</div>
            </div>
        </div>



        <!--پیشنهادات-->
        <div class="user-order-list-menu-item w-100 h-100 pb-md-5 mb-5">

            <!--empty request-->
            @if ($proccess->isEmpty())
                <div class="empty_request w-100 border-gray d-flex justify-content-center">
                    <div class="empty_request_box form-bg-color p-md-5 pt-md-4 pb-md-4 p-2 mt-5">
                        <p> dooste aziz
                            <br>
                            shoma dar hale hzer hich darkhsti nadarid.
                        </p>
                    </div>
                    <!--undraw vector mobile size-->
                    <div class="position-absolute bottom-0 end-0 d-md-none">
                        <img class="pic-width-mobile transform_img" src="image/undraw_click_here_re_y6uq 1.png" alt="user"
                            width="100%">
                    </div>

                    <!--undraw vector laptop size-->
                    <div class="position-absolute bottom-0 end-0 d-none d-md-block">
                        <img class="pic-width-laptop transform_img" src="image/undraw_click_here_re_y6uq 1.png" alt="user"
                            width="100%">
                    </div>

                </div>
            @else
                <!--requests-->
                <div class="w-100 h-100 border-gray pt-3 pb-5 mb-5">

                    <!--requests short description-->
                    <div class="req-short-dsc d-flex flex-column align-items-center gap-3 mb-3">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($proccess as $pro)
                            <div class="container-fluid rounded-3 w-75 form-bg-color p-0">

                                <div class="row m-0">
                                    <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0">
                                        <div class="w-100">
                                            <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist"
                                                height="auto" width="100%">
                                        </div>
                                    </div>

                                    <div class="col-lg-9 col-12 mt-1 mt-sm-0 p-2 d-flex flex-column">
                                        <p class="m-0 pb-2 fw-bold"> name: {{ $pro->order->user->firstname }}
                                            {{ $pro->order->user->lastname }} </p>
                                        <p class="m-0 pb-2 fw-bold"> noe: {{ $pro->service->name }} rame </p>
                                        <p class="m-0 pb-2 fw-bold"> addr:
                                            {{ $pro->order->address->state->name }}-{{ $pro->order->address->city->name }}-{{ $pro->order->address->description }}
                                        </p>
                                        <p class="m-0 pb-3 fw-bold"> sharh: {{ $pro->order->description }} </p>
                                        <p class="m-0 mb-3 align-self-end"> {{ $pro->created_at->toDateString() }}</p>
                                        <div class="align-self-center mt-auto">
                                            <button type="button" class="more_inf_btn{{ $i }}"> moshahede
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            @php
                                $i++;
                            @endphp
                        @endforeach



                    </div>


                    <!--requests long description-->
                    @foreach ($proccess as $pro)
                        <div class="req-long-dsc d-none">
                            <div class="ps-md-3">
                                <p class="fw-bold ps-3 font-size24"> etelaate bishtar </p>

                                <div class="row m-0">
                                    <div
                                        class="col-lg-2 col-md-4 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0 order-md-1 order-2">
                                        <div class="w-100 h-100">
                                            <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist"
                                                height="auto" width="100%">
                                        </div>
                                    </div>

                                    <div class="col-lg-10 col-md-8 col-12 ps-3 order-md-2 order-1">
                                        <p class="m-0 pb-2 fw-bold darkgreen-text"> sharhe
                                            moshkel:{{ $pro->order->description }} </p>
                                        <p class="m-0 pb-2 fw-bold darkgreen-text"> javabe soalat: </p>
                                        @foreach ($pro->order->formresults as $result)
                                            <p class="m-0 pb-2">{{ $result->label }}: {{ $result->value }} </p>
                                        @endforeach

                                        <p class="m-0 pb-2 fw-bold darkgreen-text"> zaman anjam kar: </p>
                                        <p class="m-0 pb-3">{{ $pro->order->date }} {{ $pro->order->time }}
                                        </p>

                                        <p class="m-0 pb-2 fw-bold darkgreen-text"> addrs: </p>
                                        <p class="m-0 pb-2 mb-3">
                                            {{ $pro->order->address->state->name }}-{{ $pro->order->address->city->name }}-{{ $pro->order->address->description }}
                                        </p>

                                    </div>
                                </div>


                                <div class="w-100 d-flex justify-content-center mb-1 mt-5">
                                    <div
                                        class="w-50 d-flex flex-column align-items-center flex-md-row justify-content-md-center gap-2">
                                        <form class="w-100 ms-md-2" method="POST"
                                            action="{{ route('front.technician.panel.workdesk.post.archive') }}">
                                            @csrf
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="tech_id">
                                            <input type="hidden" value="{{ $pro->order->id }}" name="order_id">
                                            <input type="hidden" value="2" name="process_status">
                                            <button class="w-100 btn btn-outline-dark darkYellow ms-md-3" type="submit">
                                                قبول </button>
                                        </form>
                                        <p class="go-back-btn btn btn-outline-dark w-100 mt-3"> back </p>
                                    </div>
                                </div>


                            </div>
                        </div>

                </div>
            @endforeach
    @endif




    </div>



    <!--در دست اجرا-->
    <div class="user-order-list-menu-item border-gray w-100 h-100 pb-2 pt-1 pb-md-5 mb-5 d-none">

        <!--running jobs-->
        <div id="running_job" class="w-100 h-100 pt-3 pb-3">

            <!--job short description-->
            <div class="job-short-dsc d-flex flex-column align-items-center gap-3 mb-3">
                @php
                    $i = 0;
                @endphp
                @foreach ($doing_archives as $doing)
                    <div class="container-fluid rounded-3 w-75 form-bg-color p-0">

                        <div class="row m-0">
                            <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0">
                                <div class="w-100">
                                    <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist"
                                        height="auto" width="100%">
                                </div>
                            </div>

                            <div class="col-lg-9 col-12 mt-2 mt-sm-0 p-3 d-flex flex-column">
                                <p class="m-0 pb-2 fw-bold"> name: {{ $doing->order->user->firstname }}
                                    {{ $doing->order->user->lastname }} </p>
                                <p class="m-0 pb-2 fw-bold"> noe: {{ $doing->order->service->name }} </p>
                                <p class="m-0 pb-2 fw-bold"> addrs:
                                    {{ $doing->order->address->state->name }}-{{ $doing->order->address->city->name }}-{{ $doing->order->address->description }}
                                </p>
                                <p class="m-0 pb-3 fw-bold"> sharhe moshkel: {{ $doing->order->description }} </p>
                                <div class="w-100 ms-md-3 mb-3 d-flex">
                                    <p class="m-0 me-5"> {{ $doing->created_at->toTimeString() }}</p>
                                    <p class="m-0"> {{ $doing->created_at->toDateString() }}</p>
                                </div>

                                <div
                                    class="w-100 align-self-center mt-auto d-flex justify-content-center justify-content-md-end mb-1">
                                    <div
                                        class="w-50 d-flex flex-column align-items-center flex-md-row justify-content-md-center gap-2">

                                        <button type="button" class="job_more_inf_btn btn darkYellow w-100 ps-0 pe-0" id="job_more_inf_btn{{ $i }}> moshahede </button>

                         <form class="   w-100 me-md-2">
                                            <button class="w-100 btn btn-outline-dark me-md-3" type="submit"> cancel
                                            </button>
                                            </form>

                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>
                    @php
                        $i++;
                    @endphp
                @endforeach

            </div>


            <!--job long description-->
            @foreach ($doing_archives as $doing)
                <div class="job-long-dsc d-none">
                    <div class="ps-md-3">
                        <p class="fw-bold ps-3 font-size24"> etelaate bishtar </p>

                        <div class="row m-0">
                            <div
                                class="col-lg-2 col-md-4 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0 order-md-1 order-2">
                                <div class="w-100 h-100">
                                    <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist"
                                        height="auto" width="100%">
                                </div>
                            </div>

                            <div class="col-lg-10 col-md-8 col-12 pe-3 order-md-2 order-1">
                                <p class="m-0 pb-2 fw-bold darkgreen-text"> sharhe moshkel:
                                    {{ $doing->order->description }} </p>
                                <p class="m-0 pb-2 fw-bold darkgreen-text"> javabe soalat: </p>
                                @foreach ($doing->order->formresults as $result)
                                    <p class="m-0 pb-2">{{ $result->label }}: {{ $result->value }} </p>
                                @endforeach
                                <p class="m-0 pb-2 fw-bold darkgreen-text"> zaman anjam kar: </p>
                                <p class="m-0 pb-3"> {{ $doing->order->date }} {{ $doing->order->time }} </p>

                                <p class="m-0 pb-2 fw-bold darkgreen-text"> addrs: </p>
                                <p class="m-0 pb-2 mb-3">
                                    {{ $doing->order->address->state->name }}-{{ $doing->order->address->city->name }}-{{ $doing->order->address->description }}
                                </p>

                            </div>
                        </div>


                        <!--buttons-->
                        <div class="d-flex flex-column align-items-center mt-3">
                            <div
                                class=" d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center align-items-md-end w-75">
                                <a href="online-chat.html" class="btn text-decoration-none text-black darkYellow w-50"> <i
                                        class="fa-solid fa-comments"></i> chat ba spc </a>

                                <a href="#" class="btn text-decoration-none text-black darkYellow w-50"> <i
                                        class="fa-solid fa-phone-flip"></i> tamas ba spc </a>
                            </div>

                            <div
                                class=" d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center align-items-md-end w-75">
                                <p id="paying_btn" class="btn text-black lightgreen w-50 m-0"> etmam in kar </p>

                                <a href="#" class="btn btn-outline-danger text-decoration-none white text-black w-50">
                                    laghve in kar </a>
                            </div>
                        </div>


                    </div>
                </div>
            @endforeach

        </div>



        <!--اتمام کار توسط متخصص-->
        <div id="spc_req_money" class="w-100 d-flex justify-content-center d-none">
            <div class="row w-100 m-0">
                <div class="col-12 col-lg-6 pe-lg-5">
                    <p class="font-size24 fw-bold"> etmam kar(tavasote motekhases) </p>

                    <form class="mt-4">
                        <div class="mb-4">
                            <label for="wages" class="form-label">
                                dastmoz anjam kar
                            </label>
                            <input type="text" class="form-control text-center border border-dark p-2" id="wages"
                                placeholder="motabegh tavafogh">
                        </div>

                        <div class="mb-4">
                            <label for="equipment-cost" class="form-label">
                                hazine vasayel
                            </label>
                            <input id="equipment-cost" type="text" class="form-control text-center border border-dark p-2"
                                placeholder="motabegh faktor">
                        </div>

                        <div class="mb-4">
                            <label for="transportation-cost" class="form-label">
                                ayab o zahab
                            </label>
                            <input id="transportation-cost" type="text"
                                class="form-control text-center border border-dark p-2">
                        </div>

                        <div class="mb-4">
                            <label for="total-cost" class="form-label">
                                jame kole hazine ha
                            </label>
                            <input id="total-cost" type="text"
                                class="form-control text-center border border-dark lightgreen-text fw-bold p-2">
                        </div>

                        <button type="submit" class="w-100 border-0 rounded-3 darkYellow p-2">
                            etmam
                        </button>

                    </form>




                </div>

                <div class="col-6 d-none d-lg-flex justify-content-center align-items-center">
                    <div class="pay-img-size">
                        <img class="w-100" src="image/undraw_performance_overview_re_mqrq 1.png" alt="fixing">
                    </div>
                </div>
            </div>

        </div>


    </div>



    <!--گذشته-->
    <div
        class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
        @foreach ($past_archives as $past)
            <div class="container-fluid rounded-3 w-75 form-bg-color p-0">
                <div class="row m-0">
                    <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0">
                        <div class="w-100">
                            <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist" height="250px"
                                width="100%">
                        </div>
                    </div>
                    <div class="col-lg-9 col-12 mt-1 mt-sm-0 p-2">
                        <p class="m-0 pb-2 fw-bold"> name: {{ $past->order->user->firstname }}
                            {{ $past->order->user->lastname }} </p>
                        <p class="m-0 pb-2 fw-bold"> noe: {{ $past->order->service->name }} </p>
                        <p class="m-0 pb-2 fw-bold"> addrs:
                            {{ $past->order->address->state->name }}-{{ $past->order->address->city->name }}-{{ $past->order->address->description }}
                        </p>
                        <p class="m-0 pb-3 fw-bold"> sharhe moshkel: {{ $past->order->description }} </p>
                        <div class="w-100 d-flex justify-content-center justify-content-lg-start">
                            <p class="m-0 me-5"> {{ $past->created_at->toTimeString() }} </p>
                            <p class="m-0"> {{ $past->created_at->toDateString() }}</p>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>



    <!--لغو شده-->
    <div
        class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
        @foreach ($canceled_archives as $canceled)
            <div class="container-fluid rounded-3 w-75 form-bg-color p-0">
                <div class="row m-0">
                    <div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-2 mb-lg-0">
                        <div class="w-100">
                            <img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist" height="250px"
                                width="100%">
                        </div>
                    </div>
                    <div class="col-lg-9 col-12 mt-1 mt-sm-0 p-2">
                        <p class="m-0 pb-2 fw-bold"> name: {{ $canceled->technician->firstname }}
                            {{ $canceled->technician->lastname }} </p>
                        <p class="m-0 pb-2 fw-bold"> noe: {{ $canceled->order->service->name }} </p>
                        <p class="m-0 pb-2 fw-bold"> addrs:
                            {{ $canceled->order->address->state->name }}-{{ $canceled->order->address->city->name }}-{{ $canceled->order->address->description }}
                        </p>
                        <p class="m-0 pb-3 fw-bold"> sharhe moshkel: {{ $canceled->order->description }} </p>
                        <div class="w-100 d-flex justify-content-center justify-content-lg-start">
                            <p class="m-0 me-5"> {{ $canceled->created_at->toTimeString() }} </p>
                            <p class="m-0"> {{ $canceled->created_at->toDateString() }} </p>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>


    </div>

    @endif
@endsection
@section('script')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <!--scripts from script folder	-->
        <script src="{{ asset('frontend/fixy-land-fa-main/script/spc-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/spc-desk.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('frontend/fixy-land-en-main/script/spc-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/user-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/spc-desk.js') }}" type="text/javascript"></script>
    @endif
@endsection
