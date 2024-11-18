<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .div_center{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
    }
    .detail-box
    {
        padding: 15px;
    }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
    
  </div>

    {{-- Product Details --}}
    
    <section class="shop_section layout_padding">
        <div class="container">
          <div class="heading_container heading_center">
            <h2>
              Product Details
            </h2>
          </div>
          <div class="row">
    
                
            <div class="col-md-12">
              <div class="box">
                  {{-- Image --}}
                  <div class="div_center" >
                    <img width="400" height="80%" src="/products/{{$product->image}}" alt="">
                  </div>
                    <div class="detail-box">
                        {{-- Product Name --}}
                        <h6>
                            Product Name: 
                            <span>
                                {{$product->productName}}
                            </span>
                            </h6>
                        {{-- Price --}}
                        <h6>
                        Price: 
                        <span>
                          ₱ {{$product->price}}
                        </span>
                        </h6>
                        
                    </div>

                    <div class="detail-box">
                        {{-- Product Category --}}
                        <h6>
                            Category: 
                            <span>
                                {{$product->category}}
                            </span>
                            </h6>
                        {{-- Quantity --}}
                        <h6>
                            Quantity: 
                            <span>
                                {{$product->quantity}}
                            </span>
                        </h6>
                    </div>

                    <div class="detail-box">
                        <h6>
                            Product Description: 
                            <p>
                                {{$product->description}}
                               </p>
                        </h6>
                       
                    </div>
                    
                    <div style="padding: 15px">
                      <a class="btn btn-success" href="{{url('add_cart',$product->id)}}">Add to Cart</a>
                    </div>
                    
                    
              </div>
            </div>
    
  
          </div>
        </div>
      </section>

  @include('home.info')
  <!-- end info section -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>