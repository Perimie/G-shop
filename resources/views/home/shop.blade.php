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
      <div class="d-flex justify-content-center mt-4">
        {{ $product->links() }}
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Listen for clicks on pagination links
        document.addEventListener('click', function(e) {
          if (e.target.tagName === 'A' && e.target.closest('.pagination')) {
            e.preventDefault();
    
            // Fetch the URL from the clicked link
            const url = e.target.href;
    
            // Use AJAX to load the new page
            fetch(url, {
              headers: {
                'X-Requested-With': 'XMLHttpRequest'
              }
            })
            .then(response => response.text())
            .then(html => {
              // Replace the product container with the new HTML
              document.getElementById('product-container').innerHTML = html;
            })
            .catch(error => console.error('Error loading pagination:', error));
          }
        });
      });
    </script>
    
  </section>