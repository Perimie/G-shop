<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Products
      </h2>
    </div>

    <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
      <form id="product-search-form" method="GET" action="{{ url('shop') }}">
        <div class="input-group mb-4" ">
          <input 
            type="text" 
            class="form-control" 
            name="search" 
            id="search-input" 
            placeholder="Search for products..."
            value="{{ request('search') }}">
          <div class="input-group-append">
            <button class="btn btn-outline-success mb-5" type="submit">Search</button>
          </div>
        </div>
      </form>
    </div>
    
    <div class="row">
      @if ($product->count() > 0)
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
    @else
                <tr>
                    <td colspan="6">Not Found in the Products</td>
                </tr>
                @endif
    <div class="d-flex justify-content-center mt-4">
      {{ $product->links() }}
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('product-search-form');
      const input = document.getElementById('search-input');
      const productContainer = document.getElementById('product-container');
  
      // Handle form submission
      form.addEventListener('submit', function(e) {
        e.preventDefault();
  
        const query = input.value;
        const url = `${form.action}?search=${encodeURIComponent(query)}`;
  
        fetch(url, {
          headers: {
            'X-Requested-With': 'XMLHttpRequest'
          }
        })
        .then(response => response.text())
        .then(html => {
          // Replace the product container with the new HTML
          productContainer.innerHTML = html;
        })
        .catch(error => console.error('Error loading search results:', error));
      });
  
      // Handle pagination clicks
      document.addEventListener('click', function(e) {
        if (e.target.tagName === 'A' && e.target.closest('.pagination')) {
          e.preventDefault();
  
          const url = e.target.href;
  
          fetch(url, {
            headers: {
              'X-Requested-With': 'XMLHttpRequest'
            }
          })
          .then(response => response.text())
          .then(html => {
            productContainer.innerHTML = html;
          })
          .catch(error => console.error('Error loading pagination:', error));
        }
      });
    });
  </script>
  
  
</section>