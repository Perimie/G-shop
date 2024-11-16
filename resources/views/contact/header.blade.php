<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container ">
    

    <div class="collapse navbar-collapse innerpage_navbar" id="navbarSupportedContent">
      <ul class="navbar-nav  ">
        <li class="nav-item ">
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
        <li class="nav-item active">
          <a class="nav-link" href="{{route('contactUs')}}">Contact Us</a>
        </li>
      </ul>
      <div class="user_option">
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
        <a href="">
          <i class="fa fa-shopping-bag" aria-hidden="true"></i>
        </a>
        <form class="form-inline ">
          <button class="btn nav_search-btn" type="submit">
            <i class="fa fa-search" aria-hidden="true"></i>
          </button>
        </form>
      </div>
    </div>
  </nav>
</header>