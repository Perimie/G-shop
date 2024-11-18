<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.cart_header')
    <!-- end header section -->
  </div>
  <!-- end hero area -->

        <div style="padding:80px; ">
            <h1>Your Cart</h1>
            <form class="form-inline my-2 my-lg-0" action="{{url('cart_search')}}" method="GET">
                @csrf
                <input name="search" class="form-control mr-sm-2 mb-5"  type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success mb-5 " type="submit">Search</button>
              </form>
            <table class="table table-dark">
                <thead>
                <tr >
                    <th style="background-color: #e4ca3a; color: black" scope="col">Product Name</th>
                    <th style="background-color: #e4ca3a; color: black" scope="col">Image</th>
                    <th style="background-color: #e4ca3a; color: black" scope="col">Unit Price</th> 
                    <th style="background-color: #e4ca3a; color: black" scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @if ($show->count() > 0)
                    @foreach ($show as $shows)
                <tr>
                    <th scope="row">{{$shows->product->productName}}</th>
                    <td><img style="height: 60px" src="products/{{$shows->product->image}}" alt="product image"></td>
                    <td>₱ {{$shows->product->price}}</td>
                    <td>
                        <a class="btn btn-info" href="">Buy Now</a>
                        
                        <a class="btn btn-danger" href="">Delete</a>
                    </td>
                    
                   
                    
                </tr>
                @endforeach
                
                
                </tbody>
            @else
            <tr>
                <td colspan="4">No items found in the cart.</td>
            </tr>
        @endif
            
        </table>
        @if (isset($show->links))
        <div class="pagination justify-content-center">
            {{ $show->links() }} <!-- Pagination links if paginated results exist -->
        </div>
        @endif       
        
           
        </div>


  <!-- info section -->
  @include('home.info')
  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>