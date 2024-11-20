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
        <h1>Your Cart</h1>
        <form class="form-inline my-2 my-lg-0" action="{{url('cart_search')}}" method="GET">
            @csrf
            <input name="search" class="form-control mr-sm-2 mb-5" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success mb-5" type="submit">Search</button>
        </form>


        <!-- Display total at the top of the table -->
        <div>
            <h3>Total value on your Cart: ₱ {{$totalPrice}}</h3>
        </div>

        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Check Out</h4>
                    </div>
                    <div class="modal-body">
                        <form id="checkOut" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="receiverName">Receiver Name:</label>
                                <input type="text" class="form-control" id="receiverName" name="name" value="{{ Auth::user()->name }}" required>
                        
                                <label for="receiverAddress">Receiver Address:</label>
                                <textarea type="text" class="form-control" id="receiverAddress" name="rec_address" required></textarea>
                        
                                <label for="receiverNumber">Receiver Phone number:</label>
                                <input type="text" class="form-control" id="receiverNumber" name="phone" value="{{ Auth::user()->phone }}" required>
                        
                                
                                <label for="receiverQuantity">Quantity:</label>
                                <input type="number" class="form-control" id="receiverQuantity" name="quantity" required min="1" value="1">
                        
                                <!-- Display the total price here -->
                                <div>
                                    <h3>Total Price: ₱ <span id="totalPrice">0</span></h3>
                                </div>
                        
                                <!-- Hidden input field to store the total price -->
                                <input type="hidden" id="calculatedPrice" name="total_price">
                        
                            </div>
                            <button type="submit" class="btn btn-primary">Place Order</button>
                            
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
                    <th style="background-color: #e4ca3a; color: black" scope="col">Available Quantity</th>
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
                        <td>{{$shows->product->quantity}}</td>
                        <td>
                            <button type="button" 
                                    class="btn btn-info btn-md" 
                                    data-toggle="modal" 
                                    data-target="#myModal" 
                                    data-id="{{ $shows->id }}" 
                                    data-name="{{ $shows->product->productName }}"
                                    data-price="{{ $shows->product->price }}">
                                Buy Now
                            </button>

                            <a class="btn btn-danger" onclick="confirm(event)" href="{{url('remove_tocart',$shows->id)}}">Remove</a>
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

       
        <div class="pagination justify-content-center">
            {{ $show->links() }} 
        </div>
     
    </div>

    <!-- info section -->
    @include('home.info')
    <!-- end info section -->

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
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

    <script>
                $(document).ready(function () {
            $('#myModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var id = button.data('id'); // Extract the cart item ID from data-id
                var price = button.data('price'); // Extract the product price from data-price

                var modal = $(this);
                modal.find('#checkOut').attr('action', '/confirm_order/' + id);

                // Set initial price display
                $('#totalPrice').text(price); // Set initial total price (just the unit price)

                // Update total price based on quantity change
                $('#receiverQuantity').on('input', function () {
                    var quantity = $(this).val();
                    var total = quantity * price;
                    $('#totalPrice').text(total.toFixed(2)); // Update the total price dynamically

                    // Update the hidden field with the calculated total price
                    $('#calculatedPrice').val(total.toFixed(2));
                });

                // Ensure the hidden input field is populated correctly on form submit
                $('#checkOut').on('submit', function() {
                    var quantity = $('#receiverQuantity').val();
                    var total = quantity * price;

                    // Ensure the hidden input value is updated before submission
                    $('#calculatedPrice').val(total.toFixed(2));
                });
            });
        });


    </script>

</body>

</html>
