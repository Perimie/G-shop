<!DOCTYPE html>
<html>

<head>
  @include('why_us.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('why_us.headershop')
    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <!-- why section -->
  @include('why_us.why')
  <!-- why shop section -->
  <!-- info section -->
  @include('why_us.info')
  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>