 @extends('front.layouts.master')


 @section('title')
     @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
         فیکسی لند
     @else
         Fixy Land
     @endif
 @endsection
 @section('content')
     @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
         <!--آیکون ثابت برای منتقل شدن به ابتدای صفحه-->
         <div id="index_fixed_icon" class="d-none d-md-none">
             <a href="#index-sec1">
                 <i class="fa-solid fa-circle-up fw-bold font-size40 darkYellow-text"></i>
             </a>
         </div>
         <!--sec1-Carousel -->
         <section id="index-sec1" class="container-fluid">
             <div id="demo" class="carousel slide" data-bs-ride="carousel">
                 <!-- Indicators/dots -->
                 <div class="carousel-indicators">
                     <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                     <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                     <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                 </div>

                 <!-- The slideshow/carousel -->
                 <div class="carousel-inner">
                     <div class="carousel-item active">
                         <img src="image/index-slider (1).svg" alt="Los Angeles" class="d-block" style="width:100%">
                     </div>
                     <div class="carousel-item">
                         <img src="image/index-slider (2).svg" alt="Chicago" class="d-block" style="width:100%">
                     </div>
                     <div class="carousel-item">
                         <img src="image/index-slider (3).svg" alt="New York" class="d-block" style="width:100%">
                     </div>
                 </div>

                 <!-- Left and right controls/icons -->
                 <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon"></span>
                 </button>
                 <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                     <span class="carousel-control-next-icon"></span>
                 </button>
             </div>
         </section>



         <div class="text-center mt-5">
             <h1>
                 ویژگی های ما
             </h1>
         </div>


         <!--sec2-vizhegi haye ma-->
         <section id="index-sec2" class="pt-3">
             <div class="container-fluid">
                 <div class="row text-center d-flex flex-row justify-content-center gap-3">
                     <div class="col-12 col-md-5 col-lg-3 features-box gy-1 p-4">
                         <img class="mt-3 mb-3" src="image/features.png" alt="features" width="180" height="70">
                         <p class="features-box-title"> ارائه خدمات در منزل </p>
                         <p>
                             به راحتی می توانید خدمات مورد نیاز خود را مانند هر کالایی دیگر سفارش داده و در محل انتخابی
                             شما انجام شود.
                         </p>
                     </div>

                     <div class="col-12 col-md-5 col-lg-3 features-box gy-1 p-4">
                         <img class="mt-3 mb-3" src="image/features.png" alt="features" width="180" height="70">
                         <p class="features-box-title"> ارائه خدمات در منزل </p>
                         <p>
                             به راحتی می توانید خدمات مورد نیاز خود را مانند هر کالایی دیگر سفارش داده و در محل انتخابی
                             شما انجام شود.
                         </p>
                     </div>

                     <div class="col-12 col-md-6 col-lg-3 features-box gy-1 p-4">
                         <img class="mt-3 mb-3" src="image/features.png" alt="features" width="180" height="70">
                         <p class="features-box-title"> ارائه خدمات در منزل </p>
                         <p>
                             به راحتی می توانید خدمات مورد نیاز خود را مانند هر کالایی دیگر سفارش داده و در محل انتخابی
                             شما انجام شود.
                         </p>
                     </div>
                 </div>
             </div>

         </section>


         <div class="text-center mt-5 mb-4">
             <h2>
                 همه خدمات
             </h2>
         </div>


         <!--sec3-dastrasi sari-->
         <section id="index-sec3">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-12 col-lg-3 mt-4">
                         <!--sec3 tablet and mobile size menu-->
                         <div class="swiper mySwiper d-lg-none">
                             <div class="swiper-wrapper">
                                 @foreach ($catlanguages as $catlanguage)
                                     @php
                                         $category = $catlanguage->langable;
                                     @endphp
                                     @if ($category->status == 1)
                                         <div class="swiper-slide w-auto darkYellow rounded p-1">{{ $category->name }}
                                         </div>
                                     @endif
                                 @endforeach
                             </div>
                         </div>

                         <!--sec3 laptop size menu-->
                         <div class="overflow_y_scroll d-none d-lg-block">
                             <ul class="sub-menu2 d-none d-lg-block">
                                 <li>
                                     <div>
                                         <p class="form-parag"> بقیه خدمات </p>
                                     </div>
                                 </li>
                                 @foreach ($catlanguages as $catlanguage)
                                     @php
                                         $category = $catlanguage->langable;
                                     @endphp
                                     @if ($category->status == 1)
                                         <li class="sub-menu-hover2">
                                             <div class="d-inline darkYellow">
                                                 {{ $category->name }}
                                                 <i class="fa-solid fa-arrow-left"></i>
                                             </div>
                                         </li>
                                     @endif
                                 @endforeach
                             </ul>
                         </div>
                     </div>


                     <!--sec3 submenu-->
                     @php
                         $i = 1;
                     @endphp
                     @foreach ($catlanguages as $catlanguage)
                         @php
                             
                             $category = $catlanguage->langable;
                         @endphp
                         @if ($category->status == 1)
                             <div class="col-12 col-lg-9 ps-0 pe-0 {{ $i == 1 ? '' : 'd-none' }}">
                                 <!--submenu for item1-->
                                 @foreach ($category->subcategories as $subcategory)
                                     @if ($subcategory->status == 1)
                                         <div class="container-fluid">
                                             <div
                                                 class="row w-100 dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly">
                                                 <div class="col col-xl-3 ">
                                                     <a href="{{ route('user.service.description', $subcategory->id) }}"
                                                         class="text-decoration-none white-text">
                                                         <img class="mt-3 rounded-3"
                                                             src="{{ asset($subcategory->photo_path) }}"
                                                             alt="{{ $subcategory->alt }}"
                                                             title="{{ $subcategory->title }}" width="200" height="150">
                                                         <p class="pt-3">
                                                             {{ $subcategory->name }}
                                                         </p>
                                                     </a>
                                                 </div>


                                             </div>
                                         </div>
                                     @endif
                                 @endforeach

                             </div>
                         @endif
                         @php
                             $i++;
                         @endphp
                     @endforeach
                 </div>
             </div>
         </section>


         @if (count($staticlanguages) > 0)
             <div class="text-center mt-5">
                 <h3>
                     آمار
                 </h3>
             </div>
         @endif


         <!--sec4-amar-->
         <section id="index-sec4" class="">
             <div class="container-fluid">
                 <div class="row d-flex justify-content-center gap-5 ">
                     @foreach ($staticlanguages as $staticlanguage)
                         @php
                             $static = $staticlanguage->langable;
                         @endphp
                         @if ($static->status == 1)
                             <div class="ps-1 pe-1 col-lg-2 col-md-4 col-6">
                                 <div
                                     class="statistics-box rounded-circle d-flex flex-column justify-content-center align-items-center text-center">
                                     <p class="p-2"> {{ $static->value }} </p>
                                     <p class="p-2"> {{ $static->title }} </p>
                                 </div>
                             </div>
                         @endif
                     @endforeach

                 </div>
             </div>



         </section>


         <div class="text-center mt-5">
             <h3>
                 آخرین مقالات
             </h3>
         </div>



         <!--sec5-maghalat-->
         <section id="index-sec5">
             <div class="container-fluid">
                 <div class="row d-flex justify-content-center">
                 @foreach($index_articles as $index_article)
                 @php 
                    $article = $index_article->langable;
                 @endphp
                 @if($article->status == 1)
                     <div class="col-lg-3 col-md-4 col-12 m-1 p-0">
                         <a href="{{ route('front.article.show',[$article->id,$article->slug])}}" class="text-decoration-none text-black">
                             <div class="maghalat-box">
                                 <img src="{{asset($article->photo_path)}}" alt="{{$article->photo_alt}}" width="100%" height="200px">
                                 <div class="maghalat">
                                     <p>{{$article->title}} </p>
                                     <p>{!! Str::limit($article->text_1,30) !!} </p>
                                 </div>
                             </div>
                         </a>
                     </div>
                @endif
                @endforeach
                 </div>
             </div>
         </section>





         <!--sec6-tablighat-->
         <section id="index-sec6" class="alert alert-dismissible fade show" role="alert">
             <div class="container">
                 @foreach ($adlanguages as $adlanguage)
                     <div class="row">
                         @php
                             $advertisment = $adlanguage->langable;
                         @endphp
                         <div class="col-md-4 col-12 d-flex justify-content-center">
                             <div class="border border-dark d-flex flex-column align-items-center mb-2 p-0 rounded-2">
                                 <img src="{{ asset($advertisment->photo_path) }}" alt="{{ $advertisment->alt }}"
                                     name="{{ $advertisment->title }}" width="100%" height="200">

                             </div>
                         </div>
                 @endforeach

             </div>
             </div>

             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </section>



         <div class="text-center mt-5">
             <h3>
                 سوالات متداول
             </h3>
         </div>


         <!--sec7-soalat motedavel-->
         <section id="index-sec7" class="d-flex flex-column justify-content-center align-items-center">
             <p class="pb-3"> اگر در بخش های مختلف سوالی دارید، لطفا قبل از تماس با پشتیبانی ابتدا پرسش های
                 متداول را بخوانید. </p>

             <a class="btn ps-3 pe-3 pb-2" href="{{ route('front.faq.index') }}"> سوالات متداول </a>




         </section>
     @else
         <!--آیکون ثابت برای منتقل شدن به ابتدای صفحه-->
         <div id="index_fixed_icon" class="d-none d-md-none">
             <a href="#index-sec1">
                 <i class="fa-solid fa-circle-up fw-bold font-size40 darkYellow-text"></i>
             </a>
         </div>



         <!--sec1-Carousel -->
         <section id="index-sec1" class="container-fluid">
             <div id="demo" class="carousel slide" data-bs-ride="carousel">
                 <!-- Indicators/dots -->
                 <div class="carousel-indicators">
                     <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                     <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                     <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                 </div>

                 <!-- The slideshow/carousel -->
                 <div class="carousel-inner">
                     <div class="carousel-item active">
                         <img src="image/index-slider (1).svg" alt="Los Angeles" class="d-block" style="width:100%">
                     </div>
                     <div class="carousel-item">
                         <img src="image/index-slider (2).svg" alt="Chicago" class="d-block" style="width:100%">
                     </div>
                     <div class="carousel-item">
                         <img src="image/index-slider (3).svg" alt="New York" class="d-block" style="width:100%">
                     </div>
                 </div>

                 <!-- Left and right controls/icons -->
                 <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                     <span class="carousel-control-prev-icon"></span>
                 </button>
                 <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                     <span class="carousel-control-next-icon"></span>
                 </button>
             </div>
         </section>



         <div class="text-center mt-5">
             <h1>
                 vizhegihaye ma
             </h1>
         </div>


         <!--sec2-vizhegi haye ma-->
         <section id="index-sec2" class="pt-3">
             <div class="container-fluid">
                 <div class="row text-center d-flex flex-row justify-content-center gap-3">
                     <div class="col-12 col-md-5 col-lg-3 features-box gy-1 p-4">
                         <img class="mt-3 mb-3" src="image/features.png" alt="features" width="180" height="70">
                         <p class="features-box-title"> erae khadamat dar manzel </p>
                         <p>
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                             ut
                             labore et dolore magna aliqua. Ut enim ad minim veniam.
                         </p>
                     </div>

                     <div class="col-12 col-md-5 col-lg-3 features-box gy-1 p-4">
                         <img class="mt-3 mb-3" src="image/features.png" alt="features" width="180" height="70">
                         <p class="features-box-title"> erae khadamat dar manzel </p>
                         <p>
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                             ut
                             labore et dolore magna aliqua. Ut enim ad minim veniam.
                         </p>
                     </div>

                     <div class="col-12 col-md-6 col-lg-3 features-box gy-1 p-4">
                         <img class="mt-3 mb-3" src="image/features.png" alt="features" width="180" height="70">
                         <p class="features-box-title"> erae khadamat dar manzel </p>
                         <p>
                             Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                             ut
                             labore et dolore magna aliqua. Ut enim ad minim veniam.
                         </p>
                     </div>
                 </div>
             </div>

         </section>


         <div class="text-center mt-5 mb-4">
             <h2>
                 hame khadamat
             </h2>
         </div>


         <!--sec3-dastrasi sari-->
         <section id="index-sec3">
             <div class="container-fluid">
                 <div class="row">
                     <div class="col-12 col-lg-3 mt-4">

                         <!--sec3 tablet and mobile size menu-->
                         <div class="swiper mySwiper d-lg-none">
                             <div class="swiper-wrapper">
                                 @foreach ($catlanguages as $catlanguage)
                                     @php
                                         $category = $catlanguage->langable;
                                     @endphp
                                     @if ($category->status == 1)
                                         <div class="swiper-slide w-auto darkYellow rounded p-1">nezafat o paziraei</div>
                                     @endif
                                 @endforeach
                             </div>
                         </div>

                         <!--sec3 laptop size menu-->
                         <div class="overflow_y_scroll d-none d-lg-block">
                             <ul class="sub-menu2 d-none d-lg-block p-0 pe-2">

                                 <li>
                                     <div>
                                         <p class="form-parag"> Other Services </p>
                                     </div>
                                 </li>
                                 @foreach ($catlanguages as $catlanguage)
                                     @php
                                         $category = $catlanguage->langable;
                                     @endphp
                                     @if ($category->status == 1)
                                         <li class="sub-menu-hover2">
                                             <div class="d-inline darkYellow">
                                                 {{ $category->name }}
                                                 <i class="fa-solid fa-arrow-left"></i>
                                             </div>
                                         </li>
                                     @endif
                                 @endforeach
                             </ul>
                         </div>
                     </div>


                     @php
                         $i = 1;
                     @endphp
                     @foreach ($catlanguages as $catlanguage)
                         @php
                             
                             $category = $catlanguage->langable;
                         @endphp
                         @if ($category->status == 1)
                             <!--sec3 submenu-->
                             <div class="col-12 col-lg-9 ps-0 pe-0">
                                 <!--submenu for item1-->
                                 @foreach ($category->subcategories as $subcategory)
                                     @if ($subcategory->status == 1)
                                         <div class="container-fluid">
                                             <div
                                                 class="row w-100 dastrasi-sari-grid d-flex gap-1 gy-1 m-0 justify-content-evenly">
                                                 <div class="col col-xl-3 ">
                                                     <a href="{{ route('user.service.description', $subcategory->id) }}"
                                                         class="text-decoration-none white-text">
                                                         <img class="mt-3 rounded-3"
                                                             src="{{ asset($subcategory->photo_path) }}"
                                                             alt="{{ $subcategory->alt }}"
                                                             title="{{ $subcategory->title }}" width="200" height="150">
                                                         <p class="pt-3">
                                                             {{ $subcategory->name }}
                                                         </p>
                                                     </a>
                                                 </div>

                                             </div>
                                         </div>
                                     @endif
                                 @endforeach
                             </div>
                         @endif
                         @php
                             $i++;
                         @endphp
                     @endforeach
                 </div>
             </div>
         </section>



         <div class="text-center mt-5">
             <h3>
                 a'amar
             </h3>
         </div>


         <!--sec4-amar-->
         <section id="index-sec4" class="">
             <div class="container-fluid">
                 <div class="row d-flex justify-content-center gap-5 ">
                     @foreach ($staticlanguages as $staticlanguage)
                         @php
                             $static = $staticlanguage->langable;
                         @endphp
                         @if ($static->status == 1)
                             <div class="ps-1 pe-1 col-lg-2 col-md-4 col-6">
                                 <div
                                     class="statistics-box rounded-circle d-flex flex-column justify-content-center align-items-center text-center">
                                     <p class="p-2"> {{ $static->value }} </p>
                                     <p class="p-2"> {{ $static->title }} </p>
                                 </div>
                             </div>
                         @endif
                     @endforeach

                 </div>
             </div>



         </section>


         <div class="text-center mt-5">
             <h3>
                 articles
             </h3>
         </div>



         <!--sec5-maghalat-->
         <section id="index-sec5">
             <div class="container-fluid">
                 <div class="row d-flex justify-content-center">

                     <div class="col-lg-3 col-md-4 col-12 m-1 p-0">
                         <a href="articleDescription.html" class="text-decoration-none text-black">
                             <div class="maghalat-box">
                                 <img src="image/hand-wash.jpg" alt="maghale" width="100%" height="200px">
                                 <div class="maghalat">
                                     <p> title </p>
                                     <p class="text_justify">
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                         incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                     </p>
                                 </div>
                             </div>
                         </a>
                     </div>

                     <div class="col-lg-3 col-md-4 col-12 m-1 p-0">
                         <a href="articleDescription.html" class="text-decoration-none text-black">
                             <div class="maghalat-box">
                                 <img src="image/rakht.png" alt="maghale" width="100%" height="200px">
                                 <div class="maghalat">
                                     <p> title </p>
                                     <p class="text_justify">
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                         incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                     </p>
                                 </div>
                             </div>
                         </a>
                     </div>


                     <div class="col-lg-3 col-md-4 col-12 m-1 p-0">
                         <a href="articleDescription.html" class="text-decoration-none text-black">
                             <div class="maghalat-box">
                                 <img src="image/hand-wash.jpg" alt="maghale" width="100%" height="200px">
                                 <div class="maghalat">
                                     <p> title </p>
                                     <p class="text_justify">
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                         incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                     </p>
                                 </div>
                             </div>
                         </a>
                     </div>

                     <div class="col-lg-3 col-md-4 col-12 m-1 p-0 d-lg-none">
                         <a href="articleDescription.html" class="text-decoration-none text-black">
                             <div class="maghalat-box">
                                 <img src="image/rakht.png" alt="maghale" width="100%" height="200px">
                                 <div class="maghalat">
                                     <p> title </p>
                                     <p class="text_justify">
                                         Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                         incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.
                                     </p>
                                 </div>
                             </div>
                         </a>
                     </div>

                 </div>
             </div>
         </section>





         <!--sec6-tablighat-->
         <section id="index-sec6" class="alert alert-dismissible fade show" role="alert">
             <div class="container">
                 <div class="row">
                     @foreach ($adlanguages as $adlanguage)
                         @php
                             $advertisment = $adlanguage->langable;
                         @endphp
                         <div class="col-md-4 col-12 d-flex justify-content-center">
                             <div class="border border-dark d-flex flex-column align-items-center mb-2 p-0 rounded-2">
                                 <img src="{{ asset($advertisment->photo_path) }}" alt="{{ $advertisment->alt }}"
                                     name="{{ $advertisment->title }}" width="100%" height="200">
                             </div>
                         </div>
                     @endforeach


                 </div>
             </div>

             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </section>



         <div class="text-center mt-5">
             <h3>
                 questions
             </h3>
         </div>


         <!--sec7-soalat motedavel-->
         <section id="index-sec7" class="d-flex flex-column justify-content-center align-items-center">
             <p class="pb-3"> if you have any question, first visit questions page. </p>

             <a class="btn ps-3 pe-3 pb-2" href="questions.html"> questions </a>




         </section>
     @endif
 @endsection
 @section('script')
     @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
         <!--scripts from script folder	-->
         <script src="{{ asset('frontend/fixy-land-fa-main/script/index.js') }}" type="text/javascript"></script>
     @else
         <script src="{{ asset('frontend/fixy-land-en-main/script/index.js') }}" type="text/javascript"></script>
     @endif
 @endsection
