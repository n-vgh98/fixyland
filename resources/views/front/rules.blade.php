@extends('front.layouts.master')
@section('title')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
       قوانین و مقررات
    @else
        Rules and Terms
    @endif
@endsection
@section('content')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
		<div class="text-center mt-5">
			<h1>
				قوانین و مقررات
			</h1>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						<p> 
							{!! $rule->text_1 !!}
						</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						<p>{!! $rule->text_2 !!}</p>
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						<p>{!! $rule->text_3 !!}</p>	
					</div>
				</div>
			</div>	
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						<p>{!! $rule->text_4 !!}</p>	
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						<p>{!! $rule->text_5 !!}</p>	
					</div>
				</div>
			</div>	
		</div>
    @else
	<div class="text-center mt-5">
			<h1>
				terms and services
			</h1>
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						
						<p class="text_justify">
							{!! $rule->text_1 !!}
						</p>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						
						<p class="text_justify">
							{!! $rule->text_2 !!}
						</p>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						<p class="text_justify">
							{!! $rule->text_3 !!}
						</p>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						<p class="text_justify">
							{!! $rule->text_4 !!}
						</p>
						
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="terms-box mt-3 mb-5 pt-3 pb-3 ps-5 pe-5">
						<p class="text_justify">
							{!! $rule->text_5 !!}
						</p>
						
					</div>
				</div>
			</div>	
		</div>
	@endif
@endsection
