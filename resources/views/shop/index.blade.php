<!DOCTYPE html>
<html>

<head>
  @include('shop.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('shop.headershop')
    <!-- end header section -->
  </div>
  <!-- end hero area -->

  <div id="product-container">
    @include('shop.shop')
  </div>
  <!-- info section -->
  @include('shop.info')
  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>