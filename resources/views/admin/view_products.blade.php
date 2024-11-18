<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    
  </head>
  <body>
    <!--Header-->
    @include('admin.header')
    <!--End Header-->
    
    <div class="d-flex align-items-stretch">
      <!--Side Bar-->
      @include('admin.sidebar')
      <!--End Side bar-->
      <div class="page-content">
        <div class="page-header">
          
          <div class="container-fluid">

            <form class="form-inline my-2 my-lg-0" action="{{url('products_search')}}" method="GET">
              @csrf
              <input name="search" class="form-control mr-sm-2 mb-5"  type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success mb-5 " type="submit">Search</button>
            </form>

            <div>
                <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      @if ($product->count() > 0)
                        @foreach ($product as $products)
                        <tr>
                            <td>{{$products->productName}}</td>
                            <td>{!!Str::limit($products->description, 20)!!}</td>
                            <td>{{$products->category}}</td>
                            <td>₱ {{$products->price}}</td>
                            <td>{{$products->quantity}}</td>
                            <td><img style="height: 60px" src="products/{{$products->image}}" alt="product image"></td>
                            <td>
                                <a class="btn btn-danger" onclick="confirm(event)" href="{{url('delete_products', $products->id)}}">Delete</a>
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{url('edit_products',$products->id)}}">Edit</a>
                            </td>
                          </tr>

            
                        @endforeach
                     
                    </tbody>
                  </table>
                
                  <div class="pagination justify-content-center">{{ $product->onEachSide(1)->links()}}</div>
                  @else
                  <tr>
                      <td colspan="4">No items found in the table.</td>
                  </tr>
              @endif
                  
            </div>


      </div>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>

    <script>
        function confirm(event) {
            event.preventDefault();

            var hrefAtt = event.currentTarget.getAttribute('href');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = hrefAtt;
                }
            });
        }
        </script>

    
  </body>
</html>