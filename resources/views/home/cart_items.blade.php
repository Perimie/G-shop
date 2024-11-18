<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .modal-dialog {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh; /* Full screen height to center vertically */
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
            <h1>Your Cart</h1>
            <form class="form-inline my-2 my-lg-0" action="{{url('cart_search')}}" method="GET">
                @csrf
                <input name="search" class="form-control mr-sm-2 mb-5" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success mb-5" type="submit">Search</button>
            </form>

            <?php
                $value = 0; // Initialize total
                foreach ($show as $shows) {
                    $value += $shows->product->price; // Add each product's price to the total
                }
            ?>

            <!-- Display total at the top of the table -->
            <div>
                <h3>Total: ₱ {{$value}}</h3>
            </div>

            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Check Out</h4>
                        </div>
                        <div class="modal-body">
                            <form id="checkOut"  method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="editCategoryName">Receiver Name:</label>
                                    <input type="text" class="form-control" id="receiverName" name="name" value="{{Auth::user()->name}}" required>

                                    <label for="editCategoryName">Receiver Address:</label>
                                    <textarea type="text" class="form-control" id="receiverAddress" name="rec_address"  required></textarea>
                                    
                                    <label for="editCategoryName">Receiver Phone number:</label>
                                    <input type="text" class="form-control" id="receiverNumber" name="phone" value="{{Auth::user()->phone}}" required>
                                </div>
                                <button type="submit" class="btn btn-success">Place Order</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>


            <table class="table table-dark">
                <thead>
                    <tr>
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
                            <button type="button" 
                                class="btn btn-info btn-md" 
                                data-toggle="modal" 
                                data-target="#myModal" 
                                data-id="{{ $shows->id }}" 
                                data-name="{{ $shows->product->productName }}">
                                Buy Now
                            </button>

                            <a class="btn btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="4">No items found in the cart.</td>
                    </tr>
                    @endif
                </tbody>
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


  <script>
        $(document).ready(function () {
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract the cart item ID from data-id

            var modal = $(this);
            // Update the form action dynamically
            modal.find('#checkOut').attr('action', '/confirm_order/' + id);
        });
    });

    </script>

</body>

</html>