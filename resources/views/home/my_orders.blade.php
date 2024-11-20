<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style>
    .table-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Center text and content inside table cells */
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        /* Ensure images are centered inside the cells */
        .table td img {
            display: block;
            margin: 0 auto;
        }
  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.cart_header')
    <!-- end header section -->

  </div>
  <!-- end hero area -->

  <div style="padding:80px;">
    <h1>Your Orders</h1>
    <form class="form-inline my-2 my-lg-0" action="{{url('orders_search')}}" method="GET">
        @csrf
        <input name="search" class="form-control mr-sm-2 mb-5" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success mb-5" type="submit">Search</button>
    </form>

    <div>
        <h3>Total value of your Orders: ₱ {{$totalPrice}}</h3>
    </div>


    <table class="table table-dark">
        <thead>
            <tr>
                <th style="background-color: #e4ca3a; color: black" scope="col">Product Name</th>
                <th style="background-color: #e4ca3a; color: black" scope="col">Image</th>
                <th style="background-color: #e4ca3a; color: black" scope="col">Total Price</th>
                <th style="background-color: #e4ca3a; color: black" scope="col">Total Quantity</th>
                <th style="background-color: #e4ca3a; color: black" scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @if ($show->count() > 0)
                @foreach ($show as $shows)
                <tr>
                    <th scope="row">{{$shows->product->productName}}</th>
                    <td><img style="height: 60px" src="products/{{$shows->product->image}}" alt="product image"></td>
                    <td>₱ {{$shows->total_price}}</td>
                    <td>{{$shows->quantity}}</td>
                    <td>{{$shows->status}}</td>
                    
                </tr>
                @endforeach
            @else
            <tr>
                <td colspan="4">No items found in the Orders.</td>
            </tr>
            @endif
        </tbody>
    </table>

   
    <div class="pagination justify-content-center">
        {{ $show->links() }} 
    </div>

</div>

  @include('home.info')
  <!-- end info section -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

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