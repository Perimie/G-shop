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

            <div class=" pl-5 justify-content-center align-items-center">
                <form  action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3 "style="width: 50%">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Product Name</span>
                        </div>
                        <input name="productName" type="text" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" required >
                    </div>
                    

                    <div class="mb-3" style="width: 50%">
                        <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
                    </div>

                    <div class="input-group mb-3 "style="width: 50%;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Price (₱)</span>
                        </div>
                        <input name="price" type="number" step="0.01" min="0"  class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" required >
                    </div>

                    <div class="input-group mb-3 "style="width: 50%;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Product Quantity</span>
                        </div>
                        <input name="quantity" type="number" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" required >
                    </div>

                    <div class="input-group mb-3 "style="width: 50%;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Product Categories</span>
                        </div>
                        <select required name="category" class="form-select" aria-label="Default select example">
                            <option selected>Categories</option>
                            @foreach ($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                            @endforeach

                            </select>
                    </div>
                    

                    <div class="input-group mb-3 "style="width: 50%;">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">Product Image</span>
                        </div>
                        <input name="image" type="file" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" required >
                    </div>


                    <div class="input-group mt-3"style="width: 50%;">
                        
                        <input class="btn btn-success" value="Add Product" type="submit" class="form-control"  aria-label="Default" aria-describedby="inputGroup-sizing-default" required >
                    </div>

                </form>
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
  </body>
</html>