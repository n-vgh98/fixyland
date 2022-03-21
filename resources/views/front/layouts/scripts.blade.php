   <!-- bootstrap script -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
   </script>

   <!--	swiper js cdn-->
   <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

   @if (app()->getLocale() == 'fa' || app()->getLocale() == 'ar')
       <!--scripts from script folder	-->
       <script src="{{ asset('frontend/fixy-land-fa-main/script/main.js') }}" type="text/javascript"></script>
   @else
       <script src="{{ asset('frontend/fixy-land-en-main/script/main.js') }}" type="text/javascript"></script>
   @endif
