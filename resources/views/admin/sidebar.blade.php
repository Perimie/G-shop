<!-- Sidebar Navigation-->
<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('admincss/img/profile.png')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Admin</h1>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="active"><a href="{{route('homeDash')}}"> <i class="fa fa-home" aria-hidden="true"></i>Home </a></li>
            
            <li><a href="{{route('view_category')}}"> <i class="fa fa-bars" aria-hidden="true"></i></i>Category </a></li>

            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-chevron-circle-down" aria-hidden="true"></i>Products</a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li><a href="{{url('add_products')}}">Add Products</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
  </nav>
  <!-- Sidebar Navigation end-->