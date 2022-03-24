@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
       مقالات
    @else
        Articles
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
    <div class="text-center mt-5 mb-3">
			<h1>
				مقالات
			</h1>
        </div>
		<div class="container">
			<div class="row gy-4">
			@foreach($languages as $language)
            @php 
                $article = $language->langable;
			@endphp
			@if($article->status == 1)
				<div class="col-lg-3 col-md-6 col-12 d-flex flex-column align-items-center">
					<div class="article-box text-center">
						<a href="{{ route('front.article.show',[$article->id,$article->slug])}}" class="text-decoration-none text-dark"> 
							<img src="{{asset($article->photo_path)}}" alt="{{$article->photo_alt}}"  width="100%" height="200px">
							<div class="article-title">
								<p class="box-title fw-bold pt-2"> {{$article->title}} </p>
								<p class="box-text text_justify p-2"> 
									{!! Str::limit($article->text_1,30) !!}
								</p>
							</div>
						</a>
					</div>
				</div>	
			@endif
				@endforeach
			</div>
		</div>
		
    @else
    <div class="text-center mt-5 mb-3">
			<h1>
				Articles
			</h1>
		</div>
		
		<div class="container">
			<div class="row gy-4">
			@foreach($languages as $language)
            @php 
                $article = $language->langable;
			@endphp
			@if($article->status == 1)
				<div class="col-lg-3 col-md-6 col-12 d-flex flex-column align-items-center">
					<div class="article-box text-center">
						<a href="{{ route('front.article.show',[$article->id,$article->slug])}}" class="text-decoration-none text-dark"> 
							<img src="{{asset($article->photo_path)}}" alt="{{$article->photo_alt}}"  width="100%" height="200px">
							<div class="article-title">
								<p class="box-title fw-bold pt-2">  {{$article->title}} </p>
								<p class="box-text text_justify p-2"> 
									{!! Str::limit($article->text_1,30) !!}
								</p>
							</div>
						</a>
					</div>
				</div>
			@endif
			@endforeach
			</div>
		</div>
    @endif
@endsection
