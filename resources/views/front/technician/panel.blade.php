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
     <div class="h-100 w-100 d-flex flex-column align-items-center ">
						<h1 class="mb-4"> پنل کاربر </h1>
						<div class="container-fluied w-100 h-100 border-gray pt-3 pb-1 pb-md-5 mb-5">
							<div class="row m-0 gy-3">
								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> 23 </p>
										<p class="text-center m-0"> روز در فیکسی لند </p>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> 2 </p>
										<p class="text-center m-0"> ماموریت موفق </p>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> 5 </p>
										<p class="text-center m-0"> میانگین امتیاز </p>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> 10,000 تومان </p>
										<p class="text-center m-0"> پاداش این ماه </p>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> 120,000 تومان </p>
										<p class="text-center m-0"> درآمد شما در این ماه </p>
									</div>
								</div>

								<!--undraw vector mobile size-->
								<div class=" col-12 p-0 d-flex justify-content-end d-md-none">
									<img class="pic-width-mobile" src="image/undraw_dreamer_re_9tua 1.png" alt="next task" width="100%">
								</div>


							</div>

							<!--undraw vector laptop size-->
							<div class="position-absolute bottom-0 start-0 d-none d-md-block">
								<img class="pic-width-laptop" src="image/undraw_dreamer_re_9tua 1.png" alt="user" width="100%">
							</div>

						</div>
					</div>
    @else
                    <div class="h-100 w-100 d-flex flex-column align-items-center ">
                        
						<h1 class="mb-4"> profile </h1>
						<div class="container-fluied w-100 h-100 border-gray pt-3 pb-1 pb-md-5 mb-5">
							<div class="row m-0 gy-3"> 
								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> 23 </p>
										<p class="text-center m-0"> days in fixy land </p>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> 2 </p>
										<p class="text-center m-0"> Successful mission </p>
									</div>
								</div>

								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> 5 </p>
										<p class="text-center m-0"> average rate </p>
									</div>
								</div>
								
								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> $ 100000 </p>
										<p class="text-center m-0"> reward </p>
									</div>
								</div>
								
								<div class="col-12 col-md-6 col-lg-4 p-0 d-flex justify-content-center">
									<div class="user-panel-box d-flex flex-column justify-content-center align-items-center">
										<p class="m-0"> $ 120000 </p>
										<p class="text-center m-0"> income </p>
									</div>
								</div>
								
								<!--undraw vector mobile size-->
								<div class="col-12 p-0 d-md-none">
									<img class="pic-width-mobile" src="image/undraw_dreamer_re_9tua 1.png" alt="next task" width="100%">							
								</div>
								
			
							</div>
							
							<!--undraw vector laptop size-->
							<div class="position-absolute bottom-0 end-0 d-none d-md-block">
								<img class="pic-width-laptop transform_img" src="image/undraw_dreamer_re_9tua 1.png" alt="user" width="100%">
							</div>
							
						</div>
    @endif
@endsection
@section('script')
    @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
        <!--scripts from script folder	-->
        <script src="{{ asset('frontend/fixy-land-fa-main/script/spc-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
    @else
        <script src="{{ asset('frontend/fixy-land-en-main/script/spc-panel.js') }}" type="text/javascript"></script>
        <script src="{{ asset('frontend/fixy-land-en-main/script/user-panel.js') }}" type="text/javascript"></script>
    @endif
@endsection
