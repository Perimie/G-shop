<header class="header">   
    <nav class="navbar navbar-expand-lg">
      <div class="container-fluid d-flex align-items-center justify-content-between">
        <div class="navbar-header">
          <!-- Navbar Header--><a href="{{route('homeDash')}}" class="navbar-brand">
            <div class="brand-text brand-big visible text-uppercase"><strong class="text-primary">G-</strong><strong>Shop Admin</strong></div>
            <div class="brand-text brand-sm"><strong class="text-primary">G</strong><strong>S</strong></div></a>
          <!-- Sidebar Toggle Btn-->
          <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
        </div>
          <!-- Log out               -->
          <div class="list-inline-item logout">                   
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <input id= "logout1"type="submit" value="Logout">
          </form>
        </div>
      </div>
    </nav>
  </header>