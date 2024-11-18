<!-- Sidebar Navigation-->
<nav id="sidebar">
  <ul class="list-unstyled">
      <!-- Home link with active check -->
      <li class="{{ Request::is('homeDash') || Route::is('homeDash') ? 'active' : '' }}">
          <a href="{{ route('homeDash') }}"> 
              <i class="fa fa-home" aria-hidden="true"></i> Home 
          </a>
      </li>

      <!-- Categories link with active check -->
      <li class="{{ Request::is('view_category') || Route::is('view_category') ? 'active' : '' }}">
          <a href="{{ route('view_category') }}"> 
              <i class="fa fa-tag" aria-hidden="true"></i> Categories 
          </a>
      </li>

      <!-- Products dropdown with active check for child routes -->
      <li class="{{ Request::is('add_products') || Request::is('view_product') ? 'active' : '' }}">
          <a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> 
              <i class="fa fa-chevron-circle-down" aria-hidden="true"></i> Products
          </a>
          <ul id="exampledropdownDropdown" class="collapse list-unstyled">
              <li><a href="{{ url('add_products') }}">Add Products</a></li>
              <li><a href="{{ url('view_product') }}">View Products</a></li>
          </ul>
      </li>

      <!-- Orders link with active check -->
      <li class="{{ Request::is('view_orders') || Route::is('view_orders') ? 'active' : '' }}">
          <a href="{{ route('view_orders') }}"> 
              <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Orders 
          </a>
      </li>
  </ul>
</nav>
<!-- Sidebar Navigation end-->
