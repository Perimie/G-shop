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

            <h2 style="color:aliceblue">Add Category</h2>
            <div class="div_category">
                <!--Addin category-->
                <form action="{{url('add_category')}}" method="POST">
                    @csrf
                    <div>
                        <input class="category_input" type="text" name="category">
    
                        <input class="btn btn-secondary" type="submit" value="Add Categoty">
                    </div>
                </form>
            </div>


            <!--Display Table-->
            <div class="mx-3">
                <table class="table table-pin-rows ">
                  <thead>
                    <tr>
                      <th>Category</th>
                      <th>Edit</th>
                      <th>Delete</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $data)
                    <tr>
                        <td>{{$data->category_name}}</td>

                        <td>
                            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" data-id="{{ $data->id }}" data-name="{{ $data->category_name }}">Edit</button>
                        </td>

                        <td>
                            <a class="btn btn-danger" onclick="confirm(event)" href="{{url('delete_category',$data->id)}}">Delete</a>
                        </td>
                    
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            

      </div>

                <!-- Modal Structure -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Category</h4>
                        </div>
                        <div class="modal-body">
                            <form id="editForm" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="editCategoryName">Category Name:</label>
                                    <input type="text" class="form-control" id="editCategoryName" name="category_name" required>
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


<script>
    $(document).ready(function(){
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var id = button.data('id'); // Extract info from data-* attributes
            var name = button.data('name');
            
            var modal = $(this);
            modal.find('.modal-body #editCategoryName').val(name);
            modal.find('#editForm').attr('action', '/edit_category/' + id);
        });
    });
    </script>
    
        

        
    
  </body>
</html>