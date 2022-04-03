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
    <div class="h-100 w-100 d-flex flex-column align-items-center">
					<h1 class="mb-4"> پیام های فیکسی لند برای متخصص </h1>
					<div class="w-100 h-100 border-gray pt-5 mb-5 d-flex flex-column align-items-center padding-bottom">
						
                    @foreach($notifications as $notification)
						<div class="rounded-3 border border-dark gray-bg m-3 ms-4 me-4 w-75">
							<div class="spc-msg-box1 d-flex justify-content-between gap-2 p-3">
								<p class="text_justify m-0">
                                    {{Str::limit($notification->text,120)}}
                                </p>
								<i class="fa-solid fa-angle-down darkYellow-text pt-2"></i>
							</div>

							<div class="spc-msg-box2 text_justify p-2 ps-4 pe-4">
								<p>
                                    {{$notification->text}}
                                </p>
							</div>

						</div>
                    @endforeach
                    @foreach($pnotifications as $pnotification)
						<div class="rounded-3 border border-dark gray-bg m-3 ms-4 me-4 w-75">
							<div class="spc-msg-box1 d-flex justify-content-between gap-2 p-3">
								<p class="text_justify m-0">
                                    {{Str::limit($pnotification->text,120)}}
                                </p>
								<i class="fa-solid fa-angle-down darkYellow-text pt-2"></i>
							</div>

							<div class="spc-msg-box2 text_justify p-2 ps-4 pe-4">
								<p>
                                    {{$pnotification->text}}
                                </p>
							</div>

						</div>
                    @endforeach
					</div>
						
				
                </div>
                
    @else
    <div class="h-100 w-100 d-flex flex-column align-items-center">
					<h1 class="mb-4"> payam haye fixyland baraye motekhases </h1>
					<div class="w-100 h-100 border-gray pt-5 mb-5 d-flex flex-column align-items-center padding-bottom">
						
                        @foreach($notifications as $notification)
						<div class="rounded-3 border border-dark gray-bg m-3 ms-4 me-4 w-75">
							<div class="spc-msg-box1 d-flex justify-content-between gap-2 p-3">
								<p class="text_justify m-0">
                                    {{Str::limit($notification->text,120)}}
                                </p>
								<i class="fa-solid fa-angle-down darkYellow-text pt-2"></i>
							</div>

							<div class="spc-msg-box2 text_justify p-2 ps-4 pe-4">
								<p>
                                    {{$notification->text}}
                                </p>
							</div>

                        </div>
                        @endforeach
                        @foreach($pnotifications as $pnotification)
						<div class="rounded-3 border border-dark gray-bg m-3 ms-4 me-4 w-75">
							<div class="spc-msg-box1 d-flex justify-content-between gap-2 p-3">
								<p class="text_justify m-0">
                                    {{Str::limit($pnotification->text,120)}}
                                </p>
								<i class="fa-solid fa-angle-down darkYellow-text pt-2"></i>
							</div>

							<div class="spc-msg-box2 text_justify p-2 ps-4 pe-4">
								<p>
                                    {{$pnotification->text}}
                                </p>
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
        <script src="{{ asset('frontend/fixy-land-fa-main/script/spc-fixy-msgs.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('frontend/fixy-land-en-main/script/spc-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/user-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/spc-fixy-msgs.js') }}" type="text/javascript"></script>

    @endif
@endsection
