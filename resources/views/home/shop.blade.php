<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Products
        </h2>
      </div>
      <div class="row">

        @foreach ($product as $products)
            
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
              {{-- Image --}}
              <div class="img-box">
                <img src="products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                {{-- Product Name --}}
                <h6>
                  {{$products->productName}}
                </h6>
                {{-- Price --}}
                <h6>
                  Price
                  <span>
                    ₱ {{$products->price}}
                  </span>
                </h6>
              </div>
              <div style="padding: 15px">
                <a class="btn btn-info" href="{{url('products_details',$products->id)}}">Details</a>

                <a class="btn btn-success" href="{{url('add_cart',$products->id)}}">Add to Cart</a>
              </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </section>