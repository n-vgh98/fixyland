@php
    $path = request()->getPathInfo();
    $lang = substr($path, 1, 2);
    $footersinfo = App\Models\Lang::where([['name', $lang], ['langable_type', 'App\Models\FooterInfo']])->first();
    $info = $footersinfo->langable;
    $footerlinks = App\Models\Lang::where([['name', $lang], ['langable_type', 'App\Models\FooterLink']])->get();
    $articles = App\Models\Lang::where([["name",$lang],["langable_type","App\Models\Article"]])->orderBy("created_at","DESC")->get()->take(3);
@endphp
@if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
    <footer class="ps-5 pt-5 pe-5 pb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-lg-2 col-12 p-0 mb-3">
                    <p class="footer-list-title">
                        سرویس های محبوب
                        <i class="fa-solid fa-angle-down me-1 d-lg-none"></i>
                    </p>
                    <!--services for mobile size-->
                    <ul class="footer-list d-lg-none d-none">
                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link"> نظافت و پذیرایی
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link"> دکوراسیون و بازسازی
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link"> نصب و تعمیر لوازم
                                خانگی </a>
                        </li>
                    </ul>


                    <!--services for laptop size-->
                    <ul class="footer-list-lg d-none d-lg-block">
                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link"> نظافت و پذیرایی
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link"> دکوراسیون و بازسازی
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link"> نصب و تعمیر لوازم
                                خانگی </a>
                        </li>
                    </ul>

                </div>


                <div class="col col-lg-2 col-12 p-0 mb-3">
                    <p class="footer-list-title">
                        لینک های مفید
                        <i class="fa-solid fa-angle-down me-1 d-lg-none"></i>
                    </p>

                    <!--links for mobile size-->
                    <ul class="footer-list d-lg-none d-none">
                        @foreach($footerlinks as $footerlink)
                        @php 
                            $link = $footerlink->langable;
                        @endphp
                        <li class="footer-list-item">
                            <a href="{{$link->url}}" class="footer-list-item-link"> {{$link->name}} </a>
                        </li>
                        @endforeach
                    </ul>


                    <!--links for laptop size-->
                    <ul class="footer-list-lg d-none d-lg-block">
                        @foreach($footerlinks as $footerlink)
                        @php 
                            $link = $footerlink->langable;
                        @endphp
                        <li class="footer-list-item">
                            <a href="{{$link->url}}" class="footer-list-item-link">  {{$link->name}} </a>
                        </li>
                        @endforeach
                       
                    </ul>
                </div>



                <div class="col col-lg-2 col-12 p-0 mb-3">
                    <p class="footer-list-title">
                        مقالات
                        <i class="fa-solid fa-angle-down me-1 d-lg-none"></i>
                    </p>

                    <!--articles for mobile size-->
                    <ul class="footer-list d-lg-none d-none">
                        @foreach($articles as $article)
                        @php 
                            $last_article = $article->langable;
                        @endphp
                        @if ($last_article->status == 1)
                        <li class="footer-list-item">
                            <a href="{{ route('front.article.show',[$last_article->id,$last_article->slug]) }}" class="footer-list-item-link">
                                   {{$last_article->title}}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                    <!--articles for laptop size-->
                    <ul class="footer-list-lg d-none d-lg-block">
                        @foreach($articles as $article)
                        @php 
                            $last_article = $article->langable;
                        @endphp
                        @if ($last_article->status == 1)
                        <li class="footer-list-item">
                            <a href="{{ route('front.article.show',[$last_article->id,$last_article->slug]) }}" class="footer-list-item-link"> 
                                 {{$last_article->title}}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>



                <div class="col col-lg-2 col-12 p-0 mb-3">
                    <p class="footer-list-title">
                        تماس با ما
                        <i class="fa-solid fa-angle-down me-1 d-lg-none"></i>
                    </p>

                    <!--contact-us for mobile size-->
                    <ul class="footer-list d-lg-none d-none">
                        @php 
                            $info = $footersinfo->langable;
                        @endphp
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link"> 
                                {{$info->address}}    
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link"> 
                                {{$info->phone_number}}
                            </a>
                        </li>

                        <li href="#" class="footer-list-item">
                            <a href="#" class="footer-list-item-link"> 
                                {{$info->mobile_number}}
                            </a>
                        </li>

                    </ul>

                    <!--contact-us for laptop size-->
                    <ul class="footer-list-lg d-none d-lg-block">
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link"> 
                                {{$info->address}}  
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link"> 
                                {{$info->phone_number}} 
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link"> 
                                {{$info->mobile_number}} 
                            </a>
                        </li>

                    </ul>
                </div>

                <div class="col col-lg-4 col-12 text-center p-0 ">
                    <div
                        class="fixy-title d-inline-block text-center ms-1 d-inline-flex flex-column justify-content-end">
                        <p class="fixyland-footer-logo"> فیکسی لند </p>
                        <p> از تخصص تا کسب درآمد </p>
                    </div>
                    <img class="d-inline-block ms-3" src="image/logo.png" alt="fixyland-logo" width="100" height="150">
                </div>

            </div>
        </div>


        <hr>


        <div class="container-fluid">
            <div class="row">
                <div class="col d-none d-md-block col-md-6 order-md-1">
                    <img class="ms-3 mb-2" src="image/etemad.png" alt="symbol" width="85" height="60">
                    <img class="ms-3 mb-2" src="image/etemad-reza.png" alt="symbol" width="85" height="60">
                    <img class="ms-3 mb-2" src="image/etemad.png" alt="symbol" width="85" height="60">
                </div>

                <div
                    class="col col-2 col-md-12 order-md-3 mt-md-5 d-none d-md-flex justify-content-center align-items-center">
                    <p class="copyright-footer"> تمام حقوق مادی و معنوی قالب سایت متعلق به <a
                            class="text-decoration-none white-text" href="https://lordofit.com/fa">lord of it</a> می
                        باشد. </p>
                </div>

                <div class="col col-12 col-md-6 order-md-1 text-center text-md-start social-media-footer">
                    <a href="{{$info->facebook_link}}"><i class="fa-brands fa-facebook-square  ms-2 me-2 white-text"></i></a>
                    <a href="{{$info->linkedin_link}}"><i class="fa-brands fa-linkedin  ms-2 me-2 white-text"></i></a>
                    <a href="{{$info->email_link}}"><i class="fa-solid fa-envelope  ms-2 me-2 white-text"></i></a>
                    <a href="{{$info->instagram_link}}"><i class="fa-brands fa-instagram  ms-2 me-2 white-text"></i></a>
                </div>
            </div>
        </div>

    </footer>
@else
    <footer class="ps-5 pt-5 pe-5 pb-4">
        <div class="container-fluid">
            <div class="row">

                <div class="col col-lg-2 col-12 mb-3 p-2">
                    <p class="footer-list-title">
                        servicehaye mahboob
                        <i class="fa-solid fa-angle-down me-1 d-lg-none"></i>
                    </p>
                    <!--services for mobile size-->
                    <ul class="footer-list d-lg-none d-none">
                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link">
                                nezafat va paziraei </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link">
                                dekorasion va bazsazi </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link">
                                nasb o tamir lavazem khanegi </a>
                        </li>
                    </ul>


                    <!--services for laptop size-->
                    <ul class="footer-list-lg d-none d-lg-block p-0 ps-2">
                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link">
                                neafat va paziraei </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link">
                                dekorasion va bazsazi </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="sub-category-descriptions.html" class="footer-list-item-link">
                                nasb o tamir lavazem khanegi </a>
                        </li>
                    </ul>

                </div>


                <div class="col col-lg-2 col-12 mb-3 p-2">
                    <p class="footer-list-title">
                        linkhaye mofid
                        <i class="fa-solid fa-angle-down me-1 d-lg-none"></i>
                    </p>

                    <!--links for mobile size-->
                    <ul class="footer-list d-lg-none d-none">
                        @foreach($footerlinks as $footerlink)
                        @php 
                            $link = $footerlink->langable;
                        @endphp
                        <li class="footer-list-item">
                            <a href="{{$link->url}}" class="footer-list-item-link"> {{$link->name}} </a>
                        </li>
                        @endforeach
                    </ul>


                    <!--links for laptop size-->
                    <ul class="footer-list-lg d-none d-lg-block p-0 ps-2">
                        @foreach($footerlinks as $footerlink)
                        @php 
                            $link = $footerlink->langable;
                        @endphp
                        <li class="footer-list-item">
                            <a href="{{$link->url}}" class="footer-list-item-link"> {{$link->name}} </a>
                        </li>
                        @endforeach
                    </ul>
                </div>



                <div class="col col-lg-2 col-12  mb-3 p-2">
                    <p class="footer-list-title">
                        articles
                        <i class="fa-solid fa-angle-down me-1 d-lg-none"></i>
                    </p>

                    <!--articles for mobile size-->
                    <ul class="footer-list d-lg-none d-none">
                        @foreach($articles as $article)
                        @php 
                            $last_article = $article->langable;
                        @endphp
                        @if ($last_article->status == 1)
                        <li class="footer-list-item">
                            <a href="{{ route('front.article.show',[$last_article->id,$last_article->slug]) }}" class="footer-list-item-link">
                                {{$last_article->title}}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>

                    <!--articles for laptop size-->
                    <ul class="footer-list-lg d-none d-lg-block p-0 ps-2">
                        @foreach($articles as $article)
                        @php 
                            $last_article = $article->langable;
                        @endphp
                        @if ($last_article->status == 1)
                        <li class="footer-list-item">
                            <a href="{{ route('front.article.show',[$last_article->id,$last_article->slug]) }}" class="footer-list-item-link">
                                {{$last_article->title}}
                             </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>



                <div class="col col-lg-2 col-12 mb-3 p-2">
                    <p class="footer-list-title">
                        contact us
                        <i class="fa-solid fa-angle-down me-1 d-lg-none"></i>
                    </p>

                    <!--contact-us for mobile size-->
                    <ul class="footer-list d-lg-none d-none">
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link"> 
                                {{$info->address}}    
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link">
                                {{$info->phone_number}}
                            </a>
                        </li>

                        <li href="#" class="footer-list-item">
                            <a href="#" class="footer-list-item-link"> 
                                {{$info->mobile_number}}
                            </a>
                        </li>

                    </ul>

                    <!--contact-us for laptop size-->
                    <ul class="footer-list-lg d-none d-lg-block p-0 ps-2">
                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link">
                                {{$info->address}}  
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link">
                                {{$info->phone_number}}     
                            </a>
                        </li>

                        <li class="footer-list-item">
                            <a href="#" class="footer-list-item-link"> 
                                {{$info->mobile_number}}     
                            </a>
                        </li>

                    </ul>
                </div>



                <div class="col col-lg-4 col-12 text-center p-0 ">
                    <div
                        class="fixy-title d-inline-block text-center ms-1 d-inline-flex flex-column justify-content-end">
                        <p class="fixyland-footer-logo"> Fixy Land </p>
                        <p> az takhasos ta kasb daramad </p>
                    </div>
                    <img class="d-inline-block ms-3" src="image/logo.png" alt="fixyland-logo" width="100" height="150">
                </div>

            </div>
        </div>


        <hr>


        <div class="container-fluid">
            <div class="row">

                <div class="col d-none d-md-block col-md-6 order-md-1 p-0">
                    <img class="ms-3 mb-2" src="image/etemad.png" alt="symbol" width="85" height="60">
                    <img class="ms-3 mb-2" src="image/etemad-reza.png" alt="symbol" width="85" height="60">
                    <img class="ms-3 mb-2" src="image/etemad.png" alt="symbol" width="85" height="60">
                </div>

                <div
                    class="col col-2 col-md-12 order-md-3 mt-md-5 d-none d-md-flex justify-content-center align-items-center">
                    <p class="copyright-footer"> copyRight:
                        <a class="text-decoration-none white-text fw-bold" href="https://lordofit.com/fa">lord of
                            it</a>
                    </p>
                </div>

                <div class="col col-12 col-md-6 order-md-1 text-center text-md-end social-media-footer">
                    <a href="{{$info->facebook_link}}"><i class="fa-brands fa-facebook-square  ms-2 me-2 white-text"></i></a>
                    <a href="{{$info->linkedin_link}}"><i class="fa-brands fa-linkedin  ms-2 me-2 white-text"></i></a>
                    <a href="{{$info->email_link}}"><i class="fa-solid fa-envelope  ms-2 me-2 white-text"></i></a>
                    <a href="{{$info->instagram_link}}"><i class="fa-brands fa-instagram  ms-2 me-2 white-text"></i></a>
                </div>
            </div>
        </div>

    </footer>
@endif
