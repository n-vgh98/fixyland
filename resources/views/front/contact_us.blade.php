@extends('front.layouts.master')
@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
       تماس با ما
    @else
        Contact Us
    @endif
@endsection
@section('head')
<link rel="stylesheet" href="{{ asset('panel/dist/tools/sweetalert/sweetalert2.min.css') }}">
<script src="{{ asset('panel/dist/tools/sweetalert/sweetalert2.min.js ') }}"></script>
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
	<div class="container-fluid ps-2 pe-2">
			<div class="row">
				<!--right col-->
				<div class="col-md-7 col-12">
					@include("admin.layouts.sweetalert.error")
					<h1 class="mb-4 text-center"> تماس با ما </h1>
					
					<!--مسیر اول-->
					<div class="contact-us-box pt-3 pb-1 ps-md-4 pe-md-4 mb-4 border border-3 border-dark">
						<p class="fw-bold pe-3 pe-md-0"> {{$contact_us->title_1}} </p>
						<p class="ps-4 pe-4 mt-4 text_justify"> 
							{!! $contact_us->text_1 !!} 
						</p>
						<div class="text-center mt-5 mb-3">
							<a href="{{ route('front.faq.index') }}" class="text-decoration-none btn darkYellow p-4 pt-1 pb-2"> سوالات متداول </a>
						</div>
					</div>

					<!--مسیر دوم-->
					<div class="contact-us-box pt-3 pb-0 ps-md-4 pe-md-4 mb-4 border border-3 border-dark">
						<p class="fw-bold">{{$contact_us->title_2}} </p>
						<p class="ps-4 pe-4 mt-4 text_justify"> 
							{!! $contact_us->text_2 !!}
						</p>
						<div class="text-center mt-5 mb-3">
							<a href="online-chat.html" class="text-decoration-none btn darkYellow p-4 pt-1 pb-2"> پشتیبانی </a>
						</div>
					</div>

					<!--مسیر سوم-->
					<div class="contact-us-box pt-3 pb-0 ps-md-4 pe-md-4 mb-4 border border-3 border-dark">
						<p class="fw-bold"> {{$contact_us->title_3}} </p>
						<p class="ps-4 pe-4 mt-4 text_justify"> 
							{!! $contact_us->text_3 !!}
						</p>
					</div>
								
					<!--فرم ثبت سوال-->
					<div class="w-100 d-flex flex-column align-items-center mt-5">
						<h2 class="mb-4 text-center fw-bold"> فرم ثبت سوال </h2>
						
						<form action="{{ route('front.contact_us.store') }}" method="post" enctype="multipart/form-data" class="contact-us-box border border-3 border-dark p-2 p-md-5 w-100">
								@csrf
							<div class="mb-4">
							  <label for="email" class="form-label">ایمیل</label>
							  <input  id="email" type="email" name="email" class="form-control form-bg-color border-0">
							</div>

							<div class="mb-4">
								<label for="request_title" class="form-label">عنوان درخواست</label>
								<input id="request_title" name="request_title" class="form-control form-bg-color border-0" type="text" aria-label="default input example">
							</div>

							<div class="mb-5">
							  <label for="request_description" class="form-label">شرح درخواست</label>
							  <textarea id="request_description" name="request_description" class="form-control form-bg-color border-0"  rows="3"></textarea>
							</div>

							<div class="text-center">
								<button type="submit" class="btn darkYellow w-100">ثبت</button>
							</div>
						</form>
					</div>
					
				</div>
				
				<!--left col-->
				<div class="col-5 d-none d-md-block">
					<img class="sticky-top" src="{{asset('frontend/fixy-land-fa-main/image/undraw_Profile_data_re_v81r.png')}}" alt="contact us" width="100%" height="auto"> 
				</div>
			</div>
		</div>
		
    @else
	<div class="container-fluid ps-2 pe-2">
			<div class="row">
				<!--right col-->
				<div class="col-md-7 col-12">
					@include("admin.layouts.sweetalert.error")
					<h1 class="mb-4 text-center"> contact us </h1>
					
					<!--مسیر اول-->
					<div class="contact-us-box pt-3 pb-1 ps-1 pe-1 ps-md-4 pe-md-4 mb-4 border border-3 border-dark">
						<p class="fw-bold pe-3 pe-md-0"> {{$contact_us->title_1}} </p>
						<p class="ps-4 pe-4 mt-4 text_justify"> 
							{!! $contact_us->text_1 !!} 		
						</p>
						<div class="text-center mt-5 mb-3">
							<a href="{{ route('front.faq.index') }}" class="text-decoration-none btn darkYellow p-4 pt-1 pb-2"> Questions </a>
						</div>
					</div>

					<!--مسیر دوم-->
					<div class="contact-us-box pt-3 pb-0 ps-1 pe-1 ps-md-4 pe-md-4 mb-4 border border-3 border-dark">
						<p class="fw-bold"> {{$contact_us->title_2}} </p>
						<p class="ps-4 pe-4 mt-4 text_justify"> 
							{!! $contact_us->text_2 !!}		
						</p>
						<div class="text-center mt-5 mb-3">
							<a href="online-chat.html" class="text-decoration-none btn darkYellow p-4 pt-1 pb-2"> Poshtibani </a>
						</div>
					</div>

					<!--مسیر سوم-->
					<div class="contact-us-box pt-3 pb-0 ps-1 pe-1 ps-md-4 pe-md-4 mb-4 border border-3 border-dark">
						<p class="fw-bold"> {{$contact_us->title_3}} </p>
						<p class="ps-4 pe-4 mt-4 text_justify"> 
							{!! $contact_us->text_3 !!}		
						</p>
					</div>
								
					<!--فرم ثبت سوال-->
					<div class="w-100 d-flex flex-column align-items-center mt-5">
						<h2 class="mb-4 text-center fw-bold"> form sabte soal </h2>
						
						<form action="{{ route('front.contact_us.store') }}" method="post" enctype="multipart/form-data" class="contact-us-box border border-3 border-dark p-2 p-md-5 w-100">
							@csrf
							<div class="mb-4">
							  <label for="email" class="form-label">email</label>
							  <input  id="email" name="email" type="email" class="form-control form-bg-color border-0">
							</div>

							<div class="mb-4">
								<label for="request_title" class="form-label">onvan darkhast</label>
								<input id="request_title" name="request_title" class="form-control form-bg-color border-0" type="text" aria-label="default input example">
							</div>

							<div class="mb-5">
							  <label for="request_description" class="form-label">sharh darkhast</label>
							  <textarea id="request_description" name="request_description" class="form-control form-bg-color border-0"  rows="3"></textarea>
							</div>

							<div class="text-center">
								<button type="submit" class="btn darkYellow w-100">submit</button>
							</div>
						</form>
					</div>
					
				</div>
				
				<!--left col-->
				<div class="col-5 d-none d-md-block">
					<img class="sticky-top transform_img" src="{{asset('frontend/fixy-land-en-main/image/undraw_Profile_data_re_v81r.png')}}" alt="contact us" width="100%" height="auto"> 
				</div>
			</div>
		</div>
		
		
		
	@endif
@endsection
@section('script')
	<script src="{{ asset('panel/dist/tools/sweetalert/sweetalert2.all.min.js') }}"></script>
@endsection