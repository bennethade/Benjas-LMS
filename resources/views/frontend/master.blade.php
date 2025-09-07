<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Benjas Tech LMS</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      @include('frontend.section.link')

   </head>


   <body>
      <!-- start cssload-loader -->
      {{-- @include('frontend.section.preloader') --}}
      
      @include('frontend.section.header')
      
         @yield('content')
         
      
     
      <div class="section-block"></div>
      <!--======================================
         START ABOUT AREA
         ======================================-->
      {{-- @include('frontend.section.about') --}}
      <!--======================================
         END ABOUT AREA
         ======================================-->
      <div class="section-block"></div>
      <!--======================================
         START REGISTER AREA
         ======================================-->
      {{-- @include('frontend.section.register') --}}
      <!--======================================
         END REGISTER AREA
         ======================================-->
      <div class="section-block"></div>
      <!-- ================================
         START CLIENT-LOGO AREA-->
        

      @include('frontend.section.footer')
      


      <!-- start scroll top -->
      <div id="scroll-top">
         <i class="la la-arrow-up" title="Go top"></i>
      </div>
      <!-- end scroll top -->
      @include('frontend.section.tooltip')
      <!-- template js files -->
      @include('frontend.section.script')
   </body>
</html>