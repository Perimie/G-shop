<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style>
      body {
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .page-content {
            height: 90vh; /* Set the page content to 90% of the viewport height */
            overflow-y: auto; /* Allow scrolling if content overflows */
            flex-grow: 1;
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

        /* Align Search Bar and Print Button */
        .search-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .search-container .form-inline {
            flex-grow: 1;
        }

        .print-btn {
            margin-left: 10px;
        }
    </style>
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
            
            <!-- Create a container for the search bar and print button -->
            <div class="search-container">
              <!-- Search Bar -->
              <form class="form-inline my-2 my-lg-0" action="{{url('order_search')}}" method="GET">
                @csrf
                <input name="search" class="form-control mr-sm-2 mb-5" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success mb-5" type="submit">Search</button>
              </form>

              <!-- Print Selected Invoices Button -->
              <button id="printSelected" class="btn btn-primary mb-5 print-btn">Print Selected Invoices</button>
            </div>

            <table class="table table-dark">
                <thead>
                  <tr>
                    <th ></th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Change Status</th>
                    <th scope="col">Invoice</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($orders->count() > 0)
                    @foreach ($orders as $orderss)
                    <tr>
                      <td><input type="checkbox" class="invoiceCheckbox" data-id="{{ $orderss->id }}" data-user-id="{{ $orderss->user_id }}"></td>
                      <th scope="row">{{$orderss->name}}</th>
                      <td>{{$orderss->rec_address}}</td>
                      <td>{{$orderss->phone}}</td>
                      <td>{{$orderss->product->productName}}</td>
                      <td><img style="height: 60px" src="/products/{{$orderss->product->image}}" alt="product image"></td>
                      <td>₱{{$orderss->total_price}}</td>
                      <td>{{$orderss->quantity}}</td>
                      <td>{{$orderss->status}}</td>
                      <td>
                        <button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal" data-id="{{ $orderss->id }}" data-name="{{ $orderss->status }}">Change Status</button>
                      </td>
                      <td>
                        <a class="btn btn-secondary" href="{{url('print_invoice',$orderss->id)}}">Print</a>
                      </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <div class="pagination justify-content-center">
                {{ $orders->links() }}
              @else
                  <tr>
                      <td colspan="4">No items found in the table.</td>
                  </tr>
              @endif
          </div>
      </div>
    </div>

    <!-- Modal Structure -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Status</h4>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="editCategoryName">Change Status :</label>
                          <select class="form-control" id="editStatus" name="status" required>
                            <option value="In Progress">in Progress</option>
                            <option value="On the Way">on the Way</option>
                            <option value="Delivered">delivered</option>
                          </select>
                      </div>                       
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            // Select All Checkboxes functionality
            $('#selectAll').on('click', function(){
                $('.invoiceCheckbox').prop('checked', this.checked);
            });

            // Print selected invoices
            $('#printSelected').on('click', function(){
                let selectedIds = [];
                let selectedUserId = null;
                let isValid = true;

                $('.invoiceCheckbox:checked').each(function(){
                    selectedIds.push($(this).data('id'));
                    
                    // Check if all selected invoices belong to the same user
                    if (selectedUserId === null) {
                        selectedUserId = $(this).data('user-id');
                    } else if ($(this).data('user-id') !== selectedUserId) {
                        isValid = false; // Set to false if any invoice has a different user_id
                    }
                });

                if (!isValid) {
                    alert("You cannot print invoices that do not belong to the same user.");
                    return;
                }

                if (selectedIds.length > 0) {
                    let printUrl = '/print_multiple_invoices/' + selectedIds.join(',');
                    window.location.href = printUrl; // Redirect to the print URL
                } else {
                    alert("Please select at least one invoice.");
                }
            });
        });
    </script>
  </body>
</html>
