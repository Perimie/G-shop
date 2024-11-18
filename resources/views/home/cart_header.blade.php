
<header class="header_section">
    <style>
        /* Default cart icon style */
        a {
            position: relative;
            text-decoration: none;
            color: black;
            display: inline-flex; /* Make it an inline-flex element for proper alignment */
            align-items: center; /* Vertically center the content */
            justify-content: center; /* Horizontally center the content */
            padding: 6px 15px; /* Add padding for a rectangular shape */
            border-radius: 10px; /* Rounded corners (border-radius for the rectangle) */
            transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Smooth transition for background */
        }

        /* Style for the active state */
        a.active {
            background-color: white; /* White background for active state */
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Optional shadow effect */
        }

        /* Style for the icon when active */
        a.active i {
            color: black; /* Change the icon color when active */
        }

        /* Optional: Hover effect for better interactivity */
        a:hover {
            background-color: #f0f0f0; /* Light gray background on hover */
        }
    </style>
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
          <li class="nav-item">
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
          <!-- Shopping bag-->
            <div>
              <a href="{{url('mycart')}}" class="{{ request()->is('mycart') ? 'active' : '' }}" data-toggle="tooltip" data-placement="top" title="Items in Cart">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <span class="cart-count" style="background-color: #ff0000; color: white; border-radius: 50%; padding: 5px 10px; font-size: 14px;">
                    {{ $count ?? 0 }}
                </span>
            </a>
            </div>
            
            <div class="dropdown">
      
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
