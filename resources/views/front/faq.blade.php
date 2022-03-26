@extends('front.layouts.master')
@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
       سوالات متداول
    @else
        Faq
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
	<section class="container-fluid mt-5 mb-3">
		  <div class="row">
		    <div class="col-12 col-md-8">
				<h1 class="text-center">سوالات متداول</h1>
				@foreach($languages as $language)
				@php 
					$faq = $language->langable;
				@endphp
				<div class="question-div rounded-3 border gray-bg m-5">
					<div class="question-div1 d-flex justify-content-between p-3 gap-2">
						<p class="text_justify"><strong>{{$faq->question}}</strong></p>
						<i class="fa-solid fa-angle-down ps-2 pt-2"></i>
					</div>
					<div class="question-div2 p-4 text_justify ">
						<p>
							{{$faq->answer}}	
						</p>
					</div>
				</div>
			  @endforeach
				<div class="d-flex justify-content-center"><h2>پاسخ خود را نیافتید؟!</h2></div>
				<div class="m-5 mt-1 border border-5">
					<div class="darkgreen d-flex justify-content-start">
						<div class="question-pointer bg-danger m-4 "></div>	
						<div class="question-pointer bg-warning m-4 me-0"></div>
						<div class="question-pointer bg-primary m-4 me-0"></div>
					</div>
					 <div>
						<p class="font-size32 m-2 me-4">پاسخ خود را نیافتید؟</p>
						<p class="font-size24 m-2 me-4">آن را با ما در میان بگذارید.</p>
						<div class="d-flex justify-content-center m-2" >
							<a href="{{ route('front.contact_us') }}" class="text-decoration-none text-dark darkYellow border-redius-20 p-3 m-2"><strong>ارتباط با ما</strong></a>
						</div>
					</div> 
				</div>	
			</div>		  
			<div class=" col-4  col-md-4 d-none d-md-block m-0 " >
				<div id="question-col2" class="p-2 pe-3">	
					@foreach($cat_languages as $language)
					@php 
						$category = $language->langable;
					@endphp
						<div class="pe-3">
							<p class="font-size24">{{$category->title}}</p>
							@foreach($languages as $language)
							@php 
								$faq = $language->langable;
							@endphp
							@if($faq->category->title == $category->title)
							<p>{{$faq->question}}</p>
							@endif
							@endforeach
						</div>
					@endforeach
				</div>
			  </div>
		 </div>
		</section>
		
    @else
	<section class="container-fluid mt-5 mb-3">
		  <div class="row">
		    <div class="col-12 col-md-8">
			  
				<h1 class="text-center">questions</h1>
				@foreach($languages as $language)
				@php 
					$faq = $language->langable;
				@endphp
				<div class="question-div rounded-3 border gray-bg m-5">
					<div class="question-div1 d-flex justify-content-between p-3 gap-2">
						<p class="text_justify"><strong>{{$faq->question}}</strong></p>
						<i class="fa-solid fa-angle-down ps-2 pt-2"></i>
					</div>

					<div class="question-div2 p-4 text_justify ">
						<p>
							{{$faq->answer}}	
						</p>
					</div>
				</div>
			  	@endforeach
				<div class="d-flex justify-content-center"><h2> didn't find what you want? </h2></div>
				<div class="m-5 mt-1 border border-5">
					<div class="darkgreen d-flex justify-content-start">
						<div class="question-pointer bg-danger m-4 "></div>	
						<div class="question-pointer bg-warning m-4 ms-0"></div>
						<div class="question-pointer bg-primary m-4 ms-0"></div>
					</div>

					 <div>
						<p class="m-2 me-4 font-size24"> pasokh khod ra nayaftid? </p>

						<p class=" m-2 me-4"> ba ma dar mian begzarid. </p>

						<div class="d-flex justify-content-center m-2" >

							<a href="{{ route('front.contact_us') }}" class="text-decoration-none text-dark darkYellow border-redius-20 p-3 m-2"><strong>contact us</strong></a>

						</div>
					</div> 
				</div>	
			</div>
			<div class=" col-4  col-md-4 d-none d-md-block m-0 " >
				<div id="question-col2" class="p-2 ps-3">
					@foreach($cat_languages as $language)
					@php 
						$category = $language->langable;
					@endphp	
						<div class="ps-3">
							<p class="font-size24">{{$category->title}}</p>
							@foreach($languages as $language)
							@php 
								$faq = $language->langable;
							@endphp
							@if($faq->category->title == $category->title)
							<p>{{$faq->question}}</p>
							@endif
							@endforeach
						</div>
					@endforeach
				</div>
				</div>
			  </div>
		 </div>
		</section>
	@endif
@endsection
@section('script')
	<script src="{{asset('frontend/fixy-land-en-main/script/questions.js')}}" type="text/javascript"></script>
@endsection
