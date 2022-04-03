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
				
				
				<div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5 ">
					<h1 class="mb-4"> پیام های فیکسی لند </h1>
					<div class="pe-md-5 ps-md-5 pe-1 ps-1 w-100 h-100 border-gray pt-3 mb-5 d-flex flex-column align-items-center padding-bottom">

                        <!--discount box1-->
                        @foreach($notifications as $notification)
						<div class="w-100 border-gray pt-2 pb-2 p-2 p-md-3 pb-md-2 mb-4 ms-2 me-2 ms-lg-5 me-lg-5">
							<p class="pe-3">
								 {{$notification->text}}
							</p>
							
							

							<p class="d-flex justify-content-end mb-0"> {{$notification->created_at->toDateString()}} </p>
						</div>
						@endforeach
						
                        <!--discount box2-->
                        @foreach($pnotifications as $pnotification)
						<div class="w-100 border-gray pt-2 pb-2 p-2 p-md-3 pb-md-2 mb-4 ms-2 me-2 ms-lg-5 me-lg-5">
							<p class="pe-3">
								{{$pnotification->text}}
							</p>
							<p class="d-flex justify-content-end mb-0">{{$pnotification->created_at->toDateString()}} </p>
						</div>
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
				
				<div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5 ">
					<h1 class="mb-4"> fixy land msgs </h1>
					<div class="pe-md-5 ps-md-5 pe-1 ps-1 w-100 h-100 border-gray pt-3 mb-5 d-flex flex-column align-items-center padding-bottom">

                        <!--discount box1-->
                        @foreach($notifications as $notification)
						<div class="w-100 border-gray pt-2 pb-2 p-2 p-md-3 pb-md-2 mb-4 ms-2 me-2 ms-lg-5 me-lg-5">
							<p class="pe-3">
                                {{$notification->text}}
							</p>
							<p class="d-flex justify-content-end mb-0">{{$notification->created_at->toDateString()}}</p>
                        </div>
                        @endforeach
						
						
                        <!--discount box2-->
                        @foreach($pnotifications as $pnotification)
						<div class="w-100 border-gray pt-2 pb-2 p-2 p-md-3 pb-md-2 mb-4 ms-2 me-2 ms-lg-5 me-lg-5">
							<p class="pe-3">
                                {{$pnotification->text}}
							</p>
							<p class="d-flex justify-content-end mb-0">{{$pnotification->created_at->toDateString()}}</p>
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
