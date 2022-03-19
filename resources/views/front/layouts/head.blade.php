 <!-- bootstrap styles -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

 <!-- font awesome cdn -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />

 <!-- jquery cdn -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
  integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>


 <!--swiper css cdn-->
 <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />


 @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
     <!-- styles -->
     <link href="{{ asset('frontend/fixy-land-fa-main/style/css1.css') }}" rel="stylesheet" type="text/css">
 @else
     <link href="{{ asset('frontend/fixy-land-en-main/style/css1.css') }}" rel="stylesheet" type="text/css">
 @endif
