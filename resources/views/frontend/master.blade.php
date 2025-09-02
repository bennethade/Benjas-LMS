<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Benjas Tech LMS</title>
      @include('frontend.section.link')
   </head>
   <body>
      <!-- start cssload-loader -->
      @include('frontend.section.preloader')
      
      @include('frontend.section.header')
      
         @yield('content')
         
      
      <!--======================================
         START COURSE AREA
         ======================================-->
      {{-- @include('frontend.section.course-area-first') --}}
      <!--======================================
         END COURSE AREA
         ======================================-->
      <!--======================================
         START COURSE AREA
         ======================================-->
      {{-- @include('frontend.section.course-area-second') --}}
      <!--======================================
         END COURSE AREA
         ======================================-->
      <!-- ================================
         START FUNFACT AREA
         ================================= -->
      {{-- @include('frontend.section.funfact') --}}
      <!-- ================================
         START FUNFACT AREA
         ================================= -->
      <!--======================================
         START CTA AREA
         ======================================-->
      {{-- @include('frontend.section.cta') --}}
      <!--======================================
         END CTA AREA
         ======================================-->
      <!--================================
         START TESTIMONIAL AREA
         =================================-->
      {{-- @include('frontend.section.testimonial') --}}
      <!--================================
         END TESTIMONIAL AREA
         =================================-->
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
         START CLIENT-LOGO AREA
         ================================= -->
      {{-- @include('frontend.section.client-logo') --}}
      <!-- ================================
         START CLIENT-LOGO AREA
         ================================= -->
      <!-- ================================
         START BLOG AREA
         ================================= -->
      {{-- @include('frontend.section.blog') --}}
      <!-- ================================
         START BLOG AREA
         ================================= -->
      <!--======================================
         START GET STARTED AREA
         ======================================-->
      {{-- @include('frontend.section.get-started') --}}
      <!-- ================================
         START GET STARTED AREA
         ================================= -->
      <!--======================================
         START SUBSCRIBER AREA
         ======================================-->
      {{-- @include('frontend.section.subscriber') --}}
      <!--======================================
         END SUBSCRIBER AREA
         ======================================-->
     



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