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
               	
				<div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5">
					<h1 class="mb-4"> لیست سفارشات </h1>
					
					<!--order-list menu (swiper)-->
					<div class="swiper mySwiper w-100">
						<div class="swiper-wrapper">
							<div class="swiper-slide w-auto darkYellow me-lg-5 ms-lg-5 rounded p-1" > 
							پیشنهادات </div>
							<div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">در دست اجرا</div>
							<div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">گذشته</div>
							<div class="swiper-slide w-auto ms-1 me-lg-5 ms-lg-5 rounded p-1">لغو شده</div>
						</div>
					</div>

		
					
					<!--پیشنهادات-->
					<div class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3">
						<div class="border border-primary rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-4 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
										<div class="circle-img-div">
											<img class="rounded-circle w-100 h-100" src="image/human4.jpg" alt="specialist">
										</div>
									</div>
									<div class="col-lg-8 col-12 mt-2 text-center mt-sm-0 text-lg-end p-0">
										<div class="mb-2">
											<img src="image/gray-star.png" alt="rating">
											<img src="image/gray-star.png" alt="rating">
											<img src="image/yellow-star.png" alt="rating">
											<img src="image/yellow-star.png" alt="rating">
											<img src="image/yellow-star.png" alt="rating">
										</div>
										<p class="m-0 pb-1"> محمدرضا امیری </p>
										<p class="m-0" > متخصص تعمیر لوازم خانگی </p>
									</div>
								</div>	
							</div>

							<p class="mt-4 text_justify ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-5 pe-xl-5">
								لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. 
							</p>

							<a href="#" class="text-decoration-none darkYellow-text ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-5 pe-xl-5 d-flex justify-content-center justify-content-md-end">
								مشاهده اطلاعات بیشتر
							</a>

							<div class="text-center mb-1 mt-4 ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-5 pe-xl-5 d-flex justify-content-end flex-column flex-md-row">
								<form class="d-inline-block mb-3">
									<button class="btn btn-outline-dark darkYellow ms-3" type="submit"> انتخاب این متخصص </button>
								</form>
								<form class="d-inline-block mb-3">
									<button class="btn btn-outline-dark ps-5 pe-5" type="submit"> لغو </button>
								</form>
							</div>	
							
						</div>	
					</div>
					
					
					<!--در دست اجرا-->
					<div class="user-order-list-menu-item w-100 h-100 border-gray pt-1 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
						
						<!--default box-->
						<div id="running_job" class="w-100 d-flex justify-content-center">
							<div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
								<div class="container-fluid">
									<div class="row">
										<div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
											<div>
												<img class="rounded-3 mw-100 nh-100" src="image/human1.jpg" alt="specialist" height="auto">
											</div>
										</div>
										<div class="col-lg-9 col-12 mt-2 text-center mt-sm-0 text-lg-end p-0">
											<p class="m-0 pb-2 me-lg-3 fw-bold"> نام: محمدرضا امیری </p>
											<p class="m-0 pb-2 me-lg-3 fw-bold" > نوع: تعویض فریم گوشی </p>
											<p class="m-0 pb-2 me-lg-3 fw-bold" > آدرس: شیراز-ملاصدرا-خیابان جمالی </p>
											<p class="m-0 pb-3 me-lg-3 fw-bold" > شرح مشکل: تعویض فریم گوشی </p>
											<form class="me-3">
												<button type="submit" class="border-0 bg-white text-danger"> 
													افزودن به متخصص منتخب
													<i class="fa-regular fa-heart text-dark"></i> 
												</button>
											</form>
											<p class="m-0 mt-3 pb-1 text-center text-lg-start" > 1400/2/24 </p>

										</div>

									</div>	
								</div>


								<!--buttons( قسمت در دست اجرا )-->
								<div class="d-flex flex-column align-items-center mt-3">
									<div class="col-12 col-lg-6 d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center w-75">
										<a href="online-chat.html" class="btn text-decoration-none text-black darkYellow w-75"> <i class="fa-solid fa-comments"></i> چت با متخصص </a>

										<a href="#" class="btn text-decoration-none text-black darkYellow w-75"> <i class="fa-solid fa-phone-flip"></i> تماس با متخصص </a>
									</div>

									<div class="col-12 col-lg-6 d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center w-75">
										<button id="paying_btn" class="btn text-black lightgreen w-75" type="button"> اتمام این کار </button>

										<a href="#" class="btn btn-outline-danger text-decoration-none white text-black w-75"> لغو این کار </a>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--پرداخت کاربر-->
						<div id="user_payment" class="w-100 d-flex justify-content-center d-none">
								<div class="row w-100 m-0"> 
									<div class="col-12 col-lg-6">
										<div>
											<button id="runing-job-back" type="button" class="btn p-0 ps-2 pe-2 gray-text font-size24"> <i class="fa-solid fa-xmark"></i> </button>
										</div>
										<p class="font-size24 fw-bold"> اتمام کار توسط مشتری </p>
										<p> 
											خدمات: تعمیرات موبایل، تبلت، لوازم جانبی، (خدمات اضافه)
										</p>
										<p> 
											شناسه قرارداد: 655465
										</p>
										<p>
											پس از پایان کار توافق براساس قیمت و کار صورت بگیرد.
										</p>
										
										<form class="mt-4">
											<div class="mb-4">
												<label for="wages" class="form-label">
													دستمزد انجام کار
												</label>
												<input type="text" class="form-control text-center border border-dark p-2" id="wages" value="60000 ریال" disabled>
											</div>
											
											<div class="mb-4">
												<label for="equipment-cost" class="form-label">
													هزینه وسایل
												</label>
												<input id="equipment-cost" type="text" class="form-control text-center border border-dark p-2" value="50000 ریال" disabled>
											</div>
											
											<div class="mb-4">
												<label for="transportation-cost" class="form-label">
													ایاب و ذهاب
												</label>
												<input id="transportation-cost" type="text" class="form-control text-center border border-dark p-2" value="78000 ریال" disabled>
											</div>
											
											<div class="mb-4">
												<div class="d-flex justify-content-between">
													<label for="total-cost" class="form-label">
													جمع کل هزینه ها
												</label>
												<del class="fw-bold"> 480000 </del>
												</div>
												<input id="total-cost" type="text" class="form-control text-center border border-dark lightgreen-text fw-bold p-2" value="30000 ریال" disabled>
												
											</div>

											<div class="d-flex justify-content-between flex-column flex-md-row mb-md-4 ps-2 pe-2">
												<div>
													<input type="checkbox" class="form-check-input" id="confirm">
													<label class="form-check-label pe-1" for="confirm">
														تایید می کنم
													</label>
												</div>
												
												<div class="mt-3 mb-3 mt-md-0 mb-md-0">
													<button type="button" class="btn darkYellow-text p-0" data-bs-toggle="modal" data-bs-target="#disapprove_modal" data-bs-whatever="@mdo">مبلغ مورد قبول نیست</button>
													
													<!--modal start-->
													<div class="modal fade" id="disapprove_modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-body">
																	<form>
																		<div class="mb-3">
																			<label for="message-text" class="col-form-label"> 
																			chera ghabool nadarid?
																			</label>
																			<textarea class="form-control" id="message-text"></textarea>
																		</div>
																	</form>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																	<button type="button" class="btn darkYellow">Send message</button>
																</div>
															</div>
														</div>
													</div>
													<!--modal end-->
													
												</div>
											</div>

											<form class="mb-4">
												<label for="discount-code" class="form-label fw-bold">کد تخفیف</label>
												<div class="d-flex justify-content-center">
													<div class="input-group mb-3 w-100 darkYellow-border rounded-3" dir="ltr">
														<button class="discount_btn btn darkYellow" type="button" id="button-addon1">
															اعمال
														</button>
														<input id="discount-code" type="text" class="discount_input form-control form-bg-color border-0 text-center" aria-label="text with button addon" aria-describedby="button-addon1" placeholder="کد تخفیف">
													</div>
												</div>
											</form>

											<button class="pay_btn btn w-100 border border-2 p-2">
												پرداخت از درگاه بانکی 
											</button>
											<a href="#" class="pay_btn btn text-decoration-none text-black w-100 border-0 darkYellow p-2 d-none">پرداخت از درگاه بانکی</a>
											

											
										</form>
										
										

										
									</div>
									
									<div class="col-6 d-none d-lg-flex justify-content-center align-items-center">
										<div class="pay-img-size">
											<img class="w-100" src="image/undraw_bug_fixing_oc7a 1.png" alt="fixing">
										</div>
									</div>
								</div>
	
						</div>
						
						
					</div>
					
					
					<!--گذشته-->
					<div class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
						
						<div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
										<div>
											<img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist" height="auto">
										</div>
									</div>
									<div class="col-lg-9 col-12 mt-2 text-center mt-sm-0 text-lg-end p-0">
										<p class="m-0 pb-2 me-lg-3 fw-bold"> نام: محمدرضا امیری </p>
										<p class="m-0 pb-2 me-lg-3 fw-bold" > نوع: تعویض فریم گوشی </p>
										<p class="m-0 pb-2 me-lg-3 fw-bold" > آدرس: شیراز-ملاصدرا-خیابان جمالی </p>
										<p class="m-0 pb-3 me-lg-3 fw-bold" > شرح مشکل: تعویض فریم گوشی </p>
										<form class="me-3 pb-3">
											<button type="submit" class="border-0 bg-white text-danger"> 
												افزودن به متخصص منتخب
												<i class="fa-regular fa-heart text-dark"></i> 
											</button>
										</form>
										<p class="m-0 pb-1 me-3"> کدپیگیری: 655423 </p>
										<p class="m-0 pb-3 me-3"> هزینه پرداخت شده: 130.000 تومان </p>
										<p class="m-0 mt-3 pb-1 text-start" > 1400/2/24 </p>
									</div>
								</div>	
							</div>

	
						</div>	
						
						<div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
										<div>
											<img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist" height="auto">
										</div>
									</div>
									<div class="col-lg-9 col-12 mt-2 text-center mt-sm-0 text-lg-end p-0">
										<p class="m-0 pb-2 me-lg-3 fw-bold"> نام: محمدرضا امیری </p>
										<p class="m-0 pb-2 me-lg-3 fw-bold" > نوع: تعویض فریم گوشی </p>
										<p class="m-0 pb-2 me-lg-3 fw-bold" > آدرس: شیراز-ملاصدرا-خیابان جمالی </p>
										<p class="m-0 pb-3 me-lg-3 fw-bold" > شرح مشکل: تعویض فریم گوشی </p>
										<form class="me-3 pb-3">
											<button type="submit" class="border-0 bg-white text-danger"> 
												افزودن به متخصص منتخب
												<i class="fa-regular fa-heart text-dark"></i> 
											</button>
										</form>
										<p class="m-0 pb-1 me-3"> کدپیگیری: 655423 </p>
										<p class="m-0 pb-3 me-3"> هزینه پرداخت شده: 130.000 تومان </p>
										<p class="m-0 mt-3 pb-1 text-start" > 1400/2/24 </p>
									</div>
								</div>	
							</div>

	
						</div>
						
					</div>
					
					
					
					<!--لغو شده-->
					<div class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
						<div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
										<div>
											<img class="rounded-3 mw-100 nh-100" src="image/human4.jpg" alt="specialist" height="auto">
										</div>
									</div>
									<div class="col-lg-9 col-12 mt-2 text-center mt-sm-0 text-lg-end p-0">
										<p class="m-0 pb-2 me-lg-3 fw-bold"> نام: محمدرضا امیری </p>
										<p class="m-0 pb-2 me-lg-3 fw-bold" > نوع: تعویض فریم گوشی </p>
										<p class="m-0 pb-2 me-lg-3 fw-bold" > آدرس: شیراز-ملاصدرا-خیابان جمالی </p>
										<p class="m-0 pb-3 me-lg-3 fw-bold" > شرح مشکل: تعویض فریم گوشی </p>
										<form class="me-3">
											<button type="submit" class="border-0 bg-white text-danger"> 
												افزودن به متخصص منتخب
												<i class="fa-regular fa-heart text-dark"></i> 
											</button>
										</form>
										<p class="m-0 mt-3 pb-1 text-start" > 1400/2/24 </p>
										
									</div>
								</div>	
							</div>

							
							
							
						</div>	
					</div>
					
					
				</div>


            </div>
        </div>
    @else
        <div class="container-fluid p-0">
            <div class="row ms-0 me-0 position-relative">
                <!--profile panel-->
                @include('front.User.menu')

                <div class="h-100 col-12 col-md-9 d-flex flex-column align-items-center pt-3 pt-md-5 pb-5 p-md-5">
					<h1 class="mb-4"> list sefareshat </h1>
					
					<!--order-list menu (swiper)-->
					<div class="swiper mySwiper w-100">
						<div class="swiper-wrapper">
							<div class="swiper-slide w-auto darkYellow me-lg-5 ms-lg-5 rounded p-1">
								pishnahadat
							</div>
							<div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">dar dast ejra</div>
							<div class="swiper-slide w-auto me-lg-5 ms-lg-5 rounded p-1">gozashte</div>
							<div class="swiper-slide w-auto me-5 me-lg-5 ms-lg-5 rounded p-1">laghv shode</div>
						</div>
					</div>

				
					<!--پیشنهادات-->
					<div class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3">
						<div class="border border-primary rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-4 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
										<div class="circle-img-div">
											<img class="rounded-circle w-100 h-100" src="image/human4.jpg" alt="specialist">
										</div>
									</div>
									<div class="col-lg-8 col-12 mt-2 text-center mt-sm-0 text-lg-start p-0">
										<div class="mb-2">
											<img src="image/gray-star.png" alt="rating">
											<img src="image/gray-star.png" alt="rating">
											<img src="image/yellow-star.png" alt="rating">
											<img src="image/yellow-star.png" alt="rating">
											<img src="image/yellow-star.png" alt="rating">
										</div>
										<p class="m-0 pb-1"> mohammad amiri </p>
										<p class="m-0" > mobile expert </p>
									</div>
								</div>	
							</div>

							<p class="mt-4 text_justify ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-5 pe-xl-5">
								Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. 
							</p>

							<a href="#" class="text-decoration-none darkYellow-text ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-5 pe-xl-5 d-flex justify-content-center justify-content-md-start">
								more info.
							</a>

							<div class="text-center mb-1 mt-4 ps-1 pe-1 ps-lg-3 pe-lg-3 ps-xl-5 pe-xl-5 d-flex justify-content-start flex-column flex-md-row">
								<form class="d-inline-block mb-3">
									<button class="btn btn-outline-dark darkYellow me-md-3 me-0" type="submit">
										choose this one </button>
								</form>
								<form class="d-inline-block mb-3">
									<button class="btn btn-outline-dark ps-5 pe-5" type="submit"> cancel </button>
								</form>
							</div>	
							
						</div>	
					</div>
					
					
					<!--در دست اجرا-->
					<div class="user-order-list-menu-item w-100 h-100 border-gray pt-1 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
						
						<!--default box-->
						<div id="running_job" class="w-100 d-flex justify-content-center">
							<div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
								<div class="container-fluid">
									<div class="row">
										
										<div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
											<div>
												<img class="rounded-3 mw-100 hw-100" src="image/human1.jpg" alt="specialist" height="auto">
											</div>
										</div>
										
										<div class="col-lg-9 col-12 mt-2 mt-sm-0 p-0">
											<p class="m-0 pb-2 ms-lg-3 "> name: mohammad amiri </p>
											<p class="m-0 pb-2 ms-lg-3 " > noe: taviz frame </p>
											<p class="m-0 pb-2 ms-lg-3 " > address: shiraz,jamali </p>
											<p class="m-0 pb-3 ms-lg-3 " > sharh: hdhfbjsb </p>
											<form class="ms-lg-3">
												<button type="submit" class="border-0 bg-white text-danger text-start"> 
													<i class="fa-regular fa-heart text-dark"></i> 
													ezafe be motekhases montakhab
												</button>
											</form>
											<p class="m-0 mt-3 pb-1 text-center text-lg-end" > 1400/2/24 </p>

										</div>

									</div>	
								</div>


								<!--buttons( قسمت در دست اجرا )-->
								<div class="d-flex flex-column align-items-center mt-3">
									<div class="col-12 col-lg-6 d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center w-75">
										<a href="online-chat.html" class="btn text-decoration-none text-black darkYellow w-75"> <i class="fa-solid fa-comments"></i> chat </a>

										<a href="#" class="btn text-decoration-none text-black darkYellow w-75"> <i class="fa-solid fa-phone-flip"></i> call </a>
									</div>

									<div class="col-12 col-lg-6 d-flex justify-content-lg-center gap-1 mb-1 flex-column flex-lg-row align-items-center w-75">
										<button id="paying_btn" class="btn text-black lightgreen w-75">
											etmam kar </button>

										<a href="#" class="btn btn-outline-danger text-decoration-none white text-black w-75"> cancel </a>
									</div>
								</div>

							</div>
						</div>
						
						
						<!--پرداخت کاربر-->
						<div id="user_payment" class="w-100 d-flex justify-content-center d-none">
								<div class="row w-100 m-0"> 
									<div class="col-12 col-lg-6">
										<div>
											<button id="runing-job-back" type="button" class="btn p-0 ps-2 pe-2 gray-text font-size24"> <i class="fa-solid fa-xmark"></i> </button>
										</div>
										<p class="font-size24 fw-bold"> etmam kar tavasot moshtari </p>
										<p> 
											khadamat: taviz mobile, lavaze khoone, ...
										</p>
										<p> 
											shenase: 65656565
										</p>
										<p>
											pas az payan kar tavafogh bar asas gharardad bashad.
										</p>
										
										<form class="mt-4">
											<div class="mb-4">
												<label for="wages" class="form-label">
													dastmozd:
												</label>
												<input type="text" class="form-control text-center border border-dark p-2" id="wages" value="$ 60000" disabled>
											</div>
											
											<div class="mb-4">
												<label for="equipment-cost" class="form-label">
													hazine vasayel:
												</label>
												<input id="equipment-cost" type="text" class="form-control text-center border border-dark p-2" value="$ 50000" disabled>
											</div>
											
											<div class="mb-4">
												<label for="transportation-cost" class="form-label">
													ayab o zahab:
												</label>
												<input id="transportation-cost" type="text" class="form-control text-center border border-dark p-2" value="$ 78000" disabled>
											</div>
											
											<div class="mb-4">
												<div class="d-flex justify-content-between">
													<label for="total-cost" class="form-label">
													jame kole hazine ha:
												</label>
												<del class="fw-bold"> 480000 </del>
												</div>
												<input id="total-cost" type="text" class="form-control text-center border border-dark lightgreen-text fw-bold p-2" value="$ 30000" disabled>
												
											</div>

											<div class="d-flex justify-content-between flex-column flex-md-row mb-md-4 ps-2 pe-2">
												<div>
													<input type="checkbox" required="required" class="form-check-input" id="confirm">
													<label class="form-check-label ps-1" for="confirm">
														Agree
													</label>
												</div>
												
												<div class="mt-3 mb-3 mt-md-0 mb-md-0">
													<button type="button" class="btn darkYellow-text p-0" data-bs-toggle="modal" data-bs-target="#disapprove_modal" data-bs-whatever="@mdo">mablagh mored ghabool nist</button>
													
													<!--modal start-->
													<div class="modal fade" id="disapprove_modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-body">
																	<form>
																		<div class="mb-3">
																			<label for="message-text" class="col-form-label"> 
																			chera ghabool nadarid?
																			</label>
																			<textarea class="form-control" id="message-text"></textarea>
																		</div>
																	</form>
																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																	<button type="button" class="btn darkYellow">Send message</button>
																</div>
															</div>
														</div>
													</div>
													<!--modal end-->
													
												</div>
											</div>

											<form class="mb-4">
												<div class="text-end"><label for="discount-code" class="form-label fw-bold">
													coupan</label></div>
												<div class="d-flex justify-content-center">
													<div class="input-group mb-3 w-100 darkYellow-border rounded-3" dir="ltr">
														<button class="discount_btn btn darkYellow" type="button" id="button-addon1">
															submit
														</button>
														<input id="discount-code" type="text" class="discount_input form-control form-bg-color border-0 text-center" aria-label="text with button addon" aria-describedby="button-addon1" placeholder="coupan">
													</div>
												</div>
											</form>

											
											<button class="pay_btn btn w-100 border border-2 p-2">
												pardakht 
											</button>
											<a href="#" class="pay_btn btn text-decoration-none text-black w-100 border-0 darkYellow p-2 d-none">pardakht</a>
											

											
										</form>
										
										

										
									</div>
									
									<div class="col-6 d-none d-lg-flex justify-content-center align-items-center">
										<div class="pay-img-size">
											<img class="w-100" src="image/undraw_bug_fixing_oc7a 1.png" alt="fixing">
										</div>
									</div>
								</div>
	
						</div>
						
						
					</div>
					
					
					<!--گذشته-->
					<div class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
						
						<div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
										<div>
											<img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist" height="auto">
										</div>
									</div>
									<div class="col-lg-9 col-12 mt-2 mt-sm-0 p-0">
										<p class="m-0 pb-2 ms-lg-3 fw-bold"> name: mohammad amiri </p>
										<p class="m-0 pb-2 ms-lg-3 fw-bold" > noe: taviz </p>
										<p class="m-0 pb-2 ms-lg-3 fw-bold" > adr: shiraz </p>
										<p class="m-0 pb-3 ms-lg-3 fw-bold" > sharhe moshkel: jjj </p>
										<form class="ms-lg-3 pb-3">
											<button type="submit" class="border-0 bg-white text-danger text-start"> 
												<i class="fa-regular fa-heart text-dark"></i>
												afzoodan be montakhab 
											</button>
										</form>
										<p class="m-0 pb-1 ms-lg-3"> code: 656565  </p>
										<p class="m-0 pb-3 ms-lg-3"> pardakht shode: $ 1300 </p>
										<p class="m-0 mt-3 pb-1 text-end" > 1400/2/24 </p>
									</div>
								</div>	
							</div>

	
						</div>	
						
						<div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
										<div>
											<img class="rounded-3 mw-100 mh-100" src="image/human3.jpg" alt="specialist" height="auto">
										</div>
									</div>
									<div class="col-lg-9 col-12 mt-2 mt-sm-0 p-0">
										<p class="m-0 pb-2 ms-lg-3 fw-bold"> name: mohammad amiri </p>
										<p class="m-0 pb-2 ms-lg-3 fw-bold" > noe: taviz </p>
										<p class="m-0 pb-2 ms-lg-3 fw-bold" > adr: shiraz </p>
										<p class="m-0 pb-3 ms-lg-3 fw-bold" > sharhe moshkel: jjj </p>
										<form class="ms-lg-3 pb-3">
											<button type="submit" class="border-0 bg-white text-danger text-start"> 
												<i class="fa-regular fa-heart text-dark"></i>
												afzoodan be montakhab 
											</button>
										</form>
										<p class="m-0 pb-1 ms-lg-3"> code: 656565  </p>
										<p class="m-0 pb-3 ms-lg-3"> pardakht shode: $ 1300 </p>
										<p class="m-0 mt-3 pb-1 text-end" > 1400/2/24 </p>
									</div>
								</div>	
							</div>

	
						</div>
						
					</div>
					
					
					
					<!--لغو شده-->
					<div class="user-order-list-menu-item w-100 h-100 border-gray pt-3 padding-bottom mb-5 d-flex flex-column align-items-center gap-3 d-none">
						<div class="border border-3 border-dark rounded-3 pt-2 pb-2 p-2 p-md-3 mb-4 mt-2 w-75">
							<div class="container-fluid">
								<div class="row">
									<div class="col-lg-3 col-12 p-0 d-flex justify-content-center mb-3 mb-lg-0">
										<div>
											<img class="rounded-3 mw-100 nh-100" src="image/human4.jpg" alt="specialist" height="auto">
										</div>
									</div>
									<div class="col-lg-9 col-12 mt-2 mt-sm-0 p-0">
										<p class="m-0 pb-2 ms-lg-3 fw-bold"> name: mohammad amiri </p>
										<p class="m-0 pb-2 ms-lg-3 fw-bold" > noe: taviz </p>
										<p class="m-0 pb-2 ms-lg-3 fw-bold" > adr: shiraz </p>
										<p class="m-0 pb-3 ms-lg-3 fw-bold" > sharhe moshkel: jjj </p>
										<form class="ms-lg-3">
											<button type="submit" class="border-0 bg-white text-danger text-start"> 
												<i class="fa-regular fa-heart text-dark"></i>
												afzoodan be montakhab 
											</button>
										</form>
										<p class="m-0 mt-3 pb-1 text-lg-end text-center" > 1400/2/24 </p>
										
									</div>
								</div>	
							</div>

							
							
							
						</div>	
					</div>
					
					
				</div>


            </div>
        </div>
    @endif
@endsection


@section('script')
    <script src="{{ asset('frontend/fixy-land-fa-main/script/user-panel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend/fixy-land-fa-main/script/user-order-list.js') }}" type="text/javascript"></script>
@endsection
