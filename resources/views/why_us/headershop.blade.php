
<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container ">


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  ">
        <li class="nav-item">
          <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('shop')}}">
            Shop
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('why')}}">
            Why Us
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('testimonials')}}">
            Testimonial
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('contactUs')}}">Contact Us</a>
        </li>
      </ul>
      <div class="user_option">

        @if (Route::has('login'))

          @auth
        <!-- order bag-->
        <div>
          <a href="{{url('my_orders')}}" class="{{ request()->is('my_orders') ? 'active' : '' }}" data-toggle="tooltip" data-placement="top" title="My Ordes">
            My Orders
            <span class="cart-count" style="background-color: #ff0000; color: white; border-radius: 50%; padding: 5px 10px; font-size: 10px;">
                {{ $orders ?? 0 }}
            </span>
        </a>
        
        </div>
      <!-- Shopping bag-->
        <div>
          <a href="{{url('mycart')}}" class="{{ request()->is('mycart') ? 'active' : '' }}" data-toggle="tooltip" data-placement="top" title="Items in Cart">
            <i class="fa fa-cart-plus" aria-hidden="true"></i>
            <span class="cart-count" style="background-color: #ff0000; color: white; border-radius: 50%; padding: 5px 10px; font-size: 10px;">
                {{ $count ?? 0 }}
            </span>
        </a>
        
        </div>
          
          <div class="dropdown">
            <!-- Trigger: User's Username with Avatar -->
            <a 
                class="btn btn-accent dropdown-toggle" 
                role="button" 
                id="dropdownMenuLink" 
                data-toggle="dropdown" 
                aria-haspopup="true" 
                aria-expanded="false">
                
                <!-- Username -->
                <span>{{ explode('@', Auth::user()->email)[0] }}</span>
            </a>
        
            <!-- Dropdown Menu -->
            <div class="dropdown-menu dropdown-menu-right shadow-lg" aria-labelledby="dropdownMenuLink">
                <!-- Edit Profile Option -->
                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                    <i class="fas fa-user-edit text-primary mr-2"></i> Edit Profile
                </a>
                <div class="dropdown-divider"></div>
                <!-- Logout Option -->
                <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                    @csrf
                    <button type="submit" class="dropdown-item text-danger">
                        <i class="fas fa-sign-out-alt text-danger mr-2"></i> Logout
                    </button>
                </form>
            </div>
        </div>
        
      @else
        <a href="{{url('/login')}}">
          <i class="fa fa-user" aria-hidden="true"></i>
          <span>
            Login
          </span>
        </a>

        <a href="{{url('/register')}}">
          <i class="fa fa-vcard" aria-hidden="true"></i>
          <span>
            Register
          </span>
        </a>
        @endauth

        @endif
    </div>
  </nav>
</header>
