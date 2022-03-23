@extends('front.layouts.master')
@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
       درباره ما
    @else
        Articles
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
	<h1 class=" mb-md-4 mb-3"> درباره ما </h1>
		
		<img src="{{asset($about_us->photo_path)}}" alt="{{$about_us->photo_alt}}" width="100%">
		
		<p class="text_justify mt-md-5 mt-3">
			{!! $about_us->description !!}
		</p>	
    @else
	<h1 class=" mb-md-4 mb-3"> About us </h1>
		
		<img src="{{asset($about_us->photo_path)}}" alt="{{$about_us->photo_alt}}" width="100%">
		
		<p class="text_justify mt-md-5 mt-3">
			{!! $about_us->description !!}
		</p>
	@endif
@endsection
