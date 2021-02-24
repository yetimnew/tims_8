
      <div class="page-content d-flex align-items-stretch">
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar">
              <img
                src="{{ asset ('img/avatar-1.jpg')}}"
                alt="..."
                class="img-fluid rounded-circle"
              />
            </div>
            <div class="title">
              <h1 class="h4">{{Auth::user()->name}}</h1>
              <p>{{Auth::user()->mobile}}</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->
          <span class="heading">Operation</span>
          <ul class="list-unstyled">
            <li  class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
              <a href="{{ route('dashboard')}}"> <i class="icon-home"></i>Home </a>
            </li>
            <li  class="{{ request()->routeIs('truck_model.*') ? 'active' : '' }}">
              <a href="{{ route('truck_model.index')}}"> <i class="icon-grid"></i>Truck Model </a>
            </li>
            <li  class="{{ request()->routeIs('truck.*') ? 'active' : '' }}">
              <a href="{{ route('truck.index')}}"> <i class="icon-grid"></i>Truck </a>
            </li>
            <li  class="{{ request()->routeIs('driver.*') ? 'active' : '' }}">
              <a href="{{ route('driver.index')}}"> <i class="fa fa-bar-chart"></i>Driver </a>
            </li>
            <li  class="{{ request()->routeIs('driver_truck.*') ? 'active' : '' }}">
                <a href="{{ route('driver_truck.index')}}"> <i class="icon-padnote"></i>Driver Truck </a>
              </li>
              <li  class="{{ request()->routeIs('customer.*') ? 'active' : '' }}">
              <a href="{{ route('customer.index')}}"> <i class="icon-padnote"></i>Customer </a>
            </li>
              <li  class="{{ request()->routeIs('performance.*') ? 'active' : '' }}">
              <a href="{{ route('performance.index')}}"> <i class="icon-padnote"></i>Performance </a>
            </li>
            <li>

            </li>
            <li  class="{{ request()->routeIs(['operation.*','region.*','zone.*','woreda.*','place.*','distance.*']) ? 'active' : '' }}">
              <a
                href="#exampledropdownDropdown"
                aria-expanded="false"
                data-toggle="collapse"
              >
                <i class="icon-interface-windows"></i>Operations
              </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled">
                <li  class="{{ request()->routeIs('operation.*') ? 'active' : '' }}">
                      <a href="{{ route('operation.index')}}"> <i class="icon-padnote"></i>Operation </a>
                    </li>
                <li  class="{{ request()->routeIs('region.*') ? 'active' : '' }}">
                    <a href="{{ route('region.index')}}"> <i class="icon-padnote"></i>Region </a>
                </li>
                <li  class="{{ request()->routeIs('zone.*') ? 'active' : '' }}">
                    <a href="{{ route('zone.index')}}"> <i class="icon-padnote"></i>Zone </a>
                  </li>
                  <li  class="{{ request()->routeIs('woreda.*') ? 'active' : '' }}">
                    <a href="{{ route('woreda.index')}}"> <i class="icon-padnote"></i>Woreda </a>
                  </li>
                  <li  class="{{ request()->routeIs('place.*') ? 'active' : '' }}">
                    <a href="{{ route('place.index')}}"> <i class="icon-padnote"></i>Place </a>
                  </li>
                  <li  class="{{ request()->routeIs('distance.*') ? 'active' : '' }}">
                    <a href="{{ route('distance.index')}}" > <i class="icon-padnote"></i>Distance </a>
                  </li>
              </ul>
            </li>
          </ul>
          <span class="heading">Maintenance</span>
          <ul class="list-unstyled">
            <li  class="{{ request()->routeIs('downtime.*') ? 'active' : '' }}">
                <a href="{{ route('downtime.index')}}"> <i class="icon-grid"></i>Downtimes </a>
              </li>
            <li  class="{{ request()->routeIs('job_card_type.*') ? 'active' : '' }}">
                <a href="{{ route('job_card_type.index')}}"> <i class="icon-grid"></i>Job Card Type </a>
              </li>
            <li  class="{{ request()->routeIs('job_system.*') ? 'active' : '' }}">
                <a href="{{ route('job_system.index')}}"> <i class="icon-grid"></i>Job System</a>
              </li>

            <li  class="{{ request()->routeIs('job_type.*') ? 'active' : '' }}">
                <a href="{{ route('job_type.index')}}"> <i class="icon-grid"></i>Job Type</a>
              </li>
            <li  class="{{ request()->routeIs('job_ident.*') ? 'active' : '' }}">
                <a href="{{ route('job_ident.index')}}"> <i class="icon-screen"></i>Job ident</a>
              </li>
            <li  class="{{ request()->routeIs('workshop.*') ? 'active' : '' }}">
                <a href="{{ route('workshop.index')}}"> <i class="icon-mail"></i>Workshop</a>
              </li>
            <li  class="{{ request()->routeIs('open_job_card.*') ? 'active' : '' }}">
                <a href="{{ route('open_job_card.index')}}"> <i class="icon-picture"></i>Open Job Card</a>
              </li>
          </ul>
        </nav>
