
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
              <img
                src="img/avatar-1.jpg"
                alt="..."
                class="img-fluid rounded-circle"
              />
            </div>
            <div class="title">
              <h1 class="h4">{{Auth::user()->name}}</h1>
              <p>{{Auth::user()->mobile}}</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
          <ul class="list-unstyled">
            <li class="active">
              <a href="index.html"> <i class="icon-home"></i>Home </a>
            </li>
            <li>
              <a href="{{ route('truck_model.index')}}"> <i class="icon-grid"></i>Truck Model </a>
            </li>
            <li>
              <a href="{{ route('truck.index')}}"> <i class="icon-grid"></i>Truck </a>
            </li>
            <li>
              <a href="{{ route('driver.index')}}"> <i class="fa fa-bar-chart"></i>Driver </a>
            </li>
            <li>
              <a href="forms.html"> <i class="icon-padnote"></i>Forms </a>
            </li>
            <li>
              <a
                href="#exampledropdownDropdown"
                aria-expanded="false"
                data-toggle="collapse"
              >
                <i class="icon-interface-windows"></i>Example dropdown
              </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
                <li><a href="#">Page</a></li>
              </ul>
            </li>
            <li>
              <a href="login.html">
                <i class="icon-interface-windows"></i>Login page
              </a>
            </li>
          </ul>
          <span class="heading">Extras</span>
          <ul class="list-unstyled">
            <li>
              <a href="#"> <i class="icon-flask"></i>Demo </a>
            </li>
            <li>
              <a href="#"> <i class="icon-screen"></i>Demo </a>
            </li>
            <li>
              <a href="#"> <i class="icon-mail"></i>Demo </a>
            </li>
            <li>
              <a href="#"> <i class="icon-picture"></i>Demo </a>
            </li>
          </ul>
        </nav>
