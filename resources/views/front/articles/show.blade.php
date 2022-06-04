@extends('front.layouts.master')


@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
       {{$article->title}}
    @else
	   {{$article->title}}
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
	<article>
			<h1 class="mt-5 mb-3 mx-5">
				{{$article->title}}
			</h1>
			
			<div class="mx-5">
				<img src="{{asset($article->photo_path)}}" alt="{{$article->photo_alt}}" width="100%" height="500px">
			</div>
			
			<h2 class="mt-5 mb-3 mx-5">
				{{$article->title}} 
			</h2>


			<div class="mx-5">
				<div class="row">
					<div class="col-12 col-md-6">
						<p class="text_justify">
							{!! $article->text_1 !!}
						</p>
						
						
						<h3 class="mt-3 mb-4">
							{{$article->title}} 
						</h3>
						@if($article->photo_path_2)
						<img src="{{asset($article->photo_path_2)}}" alt="{{$article->photo_alt_2}}" title="{{$article->photo_name_2}}" width="100%" height="300">
						@endif
						@if($article->photo_path_3)
						<img src="{{asset($article->photo_path_3)}}" alt="{{$article->photo_alt_3}}" title="{{$article->photo_name_3}}" width="100%" height="300">
						@endif
						<p class="text_justify pt-4 mb-5">
						{!! $article->text_2 !!}
						</p>
						@if($article->photo_path_4)
						<img src="{{asset($article->photo_path_4)}}" alt="{{$article->photo_alt_4}}" title="{{$article->photo_name_4}}" width="100%" height="300">
						@endif
						@if($article->photo_path_5)
						<img src="{{asset($article->photo_path_5)}}" alt="{{$article->photo_alt_5}}" title="{{$article->photo_name_5}}" width="100%" height="300">
						@endif
						<p class="text_justify pt-4 mb-5">
						{!! $article->text_3 !!}
						</p>
						@if($article->photo_path_6)
						<img src="{{asset($article->photo_path_6)}}" alt="{{$article->photo_alt_6}}" title="{{$article->photo_name_6}}" width="100%" height="300">
						@endif 
						@if($article->photo_path_7)
						<img src="{{asset($article->photo_path_7)}}" alt="{{$article->photo_alt_7}}" title="{{$article->photo_name_7}}" width="100%" height="300">
						@endif

					</div>

					<div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
						<div class="article-search-box w-75 mb-5">
							
							<form class="article-search-form col-10 col-sm-7 col-md-10 col-lg-12 d-flex">
								<button id="article-search-btn" class="btn" type="submit">
									<i class="fa-solid fa-magnifying-glass"></i>
								</button>
								<input id="article-search-bar" type="search" placeholder="جستجو" aria-label="Search">
							</form>
							
							<div class="articles-link d-flex flex-column mt-4 me-3">
								@foreach($side_articles as $side_article)
								@php 
									$articles = $side_article->langable;
								@endphp
								<a class="text-decoration-none mt-2" href="{{ route('front.article.show',[$articles->id,$articles->slug])}}">{{$articles->title}}</a>
								@endforeach
							</div>
							
							
							
						</div>
					</div>
				</div>
			</div>
			
			
		</article>
    @else
	<article>
			<h1 class="mt-5 mb-3 mx-5">
				{{$article->title}}
			</h1>
			

			<div class="mx-5">
				<img src="{{asset($article->photo_path)}}" alt="{{$article->photo_alt}}" width="100%" height="500px">
			</div>
			
			<h2 class="mt-5 mb-3 mx-5">
				{{$article->title}}  
			</h2>


			<div class="mx-5">
				<div class="row">
					<div class="col-12 col-md-6">
						<p class="text_justify">
							{!! $article->text_1 !!}					
						</p>
						
						
						<h3 class="mt-3 mb-4">
							{{$article->title}} 
						</h3>
						
						@if($article->photo_path_2)
						<img src="{{asset($article->photo_path_2)}}" alt="{{$article->photo_alt_2}}" title="{{$article->photo_name_2}}" width="100%" height="300">
						@endif
						@if($article->photo_path_3)
						<img src="{{asset($article->photo_path_3)}}" alt="{{$article->photo_alt_3}}" title="{{$article->photo_name_3}}" width="100%" height="300">
						@endif
						<p class="text_justify pt-4 mb-5">
						{!! $article->text_2 !!}
						</p>
						@if($article->photo_path_4)
						<img src="{{asset($article->photo_path_4)}}" alt="{{$article->photo_alt_4}}" title="{{$article->photo_name_4}}" width="100%" height="300">
						@endif
						@if($article->photo_path_5)
						<img src="{{asset($article->photo_path_5)}}" alt="{{$article->photo_alt_5}}" title="{{$article->photo_name_5}}" width="100%" height="300">
						@endif
						<p class="text_justify pt-4 mb-5">
						{!! $article->text_3 !!}
						</p>
						@if($article->photo_path_6)
						<img src="{{asset($article->photo_path_6)}}" alt="{{$article->photo_alt_6}}" title="{{$article->photo_name_6}}" width="100%" height="300">
						@endif 
						@if($article->photo_path_7)
						<img src="{{asset($article->photo_path_7)}}" alt="{{$article->photo_alt_7}}" title="{{$article->photo_name_7}}" width="100%" height="300">
						@endif

					</div>

					<div class="col-12 col-md-6 d-flex justify-content-center justify-content-md-end">
						<div class="article-search-box w-75 mb-5">
							
							<form class="article-search-form col-10 col-sm-7 col-md-10 col-lg-12 d-flex">
								<button id="article-search-btn" class="btn" type="submit">
									<i class="fa-solid fa-magnifying-glass"></i>
								</button>
								<input id="article-search-bar" class="ps-2" type="search" placeholder="search" aria-label="Search">
							</form>
							
							<div class="articles-link d-flex flex-column mt-4 me-3">
								@foreach($side_articles as $side_article)
								@php 
									$articles = $side_article->langable;
								@endphp
								<a class="text-decoration-none mt-2" href="{{ route('front.article.show',[$articles->id,$articles->slug])}}">{{$articles->title}}</a>
								@endforeach
							</div>
							
							
							
						</div>
					</div>
				</div>
			</div>
			
			
		</article>
		
		
    @endif
@endsection
