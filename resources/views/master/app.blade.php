@include('master.head')

@include('master.topnav')
<!-- Side Navbar -->
@include('master.sidenav')
<div class="content-inner">

                @yield('content')

    @include('master.footer')
    @yield('javascript')
