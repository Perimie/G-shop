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

            <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  
                </tbody>
              </table>

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
  </body>
</html>