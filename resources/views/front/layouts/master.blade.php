<!doctype html>
@if (app()->getLocale() == 'fa')
    <html lang="fa" dir="rtl">
@elseif(app()->getLocale() == 'ar')
    <html lang="ar" dir="rtl">
@else
    <html lang="en" dir="ltr">
@endif

<head>
    <meta charset="utf-8">
    <title>@yield("title")</title>
    @include('front.layouts.head')
    @yield("head")
</head>



<body class="body">

    <!--start header-->
    @include('front.layouts.header')
    <!--end header-->




    <!--start main-->
    <main class="container-fluid p-0">

        @yield('content')


    </main>




    @include('front.layouts.footer')




    @include('front.layouts.scripts')
    @yield('script')



</body>



</html>
