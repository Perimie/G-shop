<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

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

            <form class="form-inline my-2 my-lg-0" action="{{url('order_search')}}" method="GET">
              @csrf
              <input name="search" class="form-control mr-sm-2 mb-5"  type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success mb-5 " type="submit">Search</button>
            </form>
            <table class="table table-dark">
                <thead>
                  <tr>
                    <th  scope="col">Customer Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Image</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Status</th>
                    <th scope="col">Change Status</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($order->count() > 0)
                    @foreach ($order as $orders)
                    <tr>
                      <th scope="row">{{$orders->name}}</th>
                      <td>{{$orders->rec_address}}</td>
                      <td>{{$orders->phone}}</td>
                      <td>{{$orders->product->productName}}</td>
                      <td><img style="height: 60px" src="/products/{{$orders->product->image}}" alt="product image"></td>
                      <td>₱{{$orders->total_price}}</td>
                      <td>{{$orders->quantity}}</td>
                      <td>{{$orders->status}}</td>
                      <td>
                        <button type="button" class="btn btn-info btn-md mb-2" data-toggle="modal" data-target="#myModal" data-id="{{ $orders->id }}" data-name="{{ $orders->status }}">Change Status</button>
                      </td>
                      
                      
                    </tr>
                    @endforeach
                  
                </tbody>
              </table>
              <div class="pagination justify-content-center">{{ $order->onEachSide(1)->links()}}</div>
              @else
                  <tr>
                      <td colspan="4">No items found in the table.</td>
                  </tr>
              @endif

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
    </div>
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
        $(document).ready(function(){
      $('#myModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var id = button.data('id'); // Extract info from data-* attributes
          var status = button.data('name'); // Current status
          
          var modal = $(this);
          modal.find('#editStatus').val(status); // Set the dropdown to the current status
          modal.find('#editForm').attr('action', '/on_my_way/' + id); // Set form action
      });
  });

      </script>
  </body>
</html>