<div class="wrapper ">
  <div class="sidebar" data-color="azure" data-background-color="white" data-image="{{asset('img/sidebar-1.jpg')}}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"
      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
      <a href="#" class="simple-text logo-normal">
          Logo
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <!-- if user is logged in -->
        @if (Auth::check())

        <!-- if user has 'administrator' or 'guest' role assigned to them. -->
        @if (Auth::user()->hasRole("Head of Department") || Auth::user()->hasRole("Finance Officer") || Auth::user()->hasRole("HR Officer") || Auth::user()->hasRole("Transport Officer"))
        <li class="nav-item">
          <a class="nav-link" href="{{route('home')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        @if (Auth::user()->hasRole('Head of Department') || Auth::user()->hasRole('Transport Officer'))
        <li class="nav-item ">
          <a class="nav-link" href="{{route('requisitions.inbox')}}">
            <i class="material-icons">inbox</i>
            <p>Transport Inbox</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('requisitions.outbox')}}">
            <i class="material-icons">playlist_add_check</i>
            <p>Transport Outbox</p>
          </a>
        </li>
        @endif
        @endif
      <!-- if user has 'administrator' role assigned to them. -->
        @if (Auth::user()->hasRole("System Administrator") || Auth::user()->hasRole("Member"))
        <li class="nav-item">
          <a class="nav-link" href="{{route('home')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('requisitions')}}">
            <i class="material-icons">inbox</i>
            <p>Transport Requisitions</p>
          </a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="{{route('subsistencerequisitions')}}">
            <i class="material-icons">inbox</i>
            <p>Subsistence Requisitions</p>
          </a>
        </li>
        @endif
        @if (Auth::user()->hasRole("System Administrator"))
        <li class="nav-item ">
          <a class="nav-link" href="{{route('users')}}">
            <i class="material-icons">people</i>
            <p>User Management</p>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">
            <i class="material-icons">settings</i>
            <p>Settings</p>
          </a>
        </li>
        @endif <!-- End Is Admin Check -->

        @endif <!-- End Auth Check -->
      </ul>
    </div>
  </div>
  <div class="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <a class="navbar-brand" href="#pablo">Transport and Subsistence System</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="sr-only">Toggle navigation</span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
          <span class="navbar-toggler-icon icon-bar"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#pablo">
                <i class="material-icons">dashboard</i>
                <p class="d-lg-none d-md-block">
                  Stats
                </p>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">notifications</i>
                <span class="notification">5</span>
                <p class="d-lg-none d-md-block">
                  Some Actions
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Mike John responded to your email</a>
                <a class="dropdown-item" href="#">You have 5 new tasks</a>
                <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                <a class="dropdown-item" href="#">Another Notification</a>
                <a class="dropdown-item" href="#">Another One</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="material-icons">person</i>
                <p class="d-lg-none d-md-block">
                  Account
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <a class="dropdown-item" href="#">{{Auth::user()->name}}</a>
                <a class="dropdown-item" href="#">Account</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
