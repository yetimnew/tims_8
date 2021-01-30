@include('master.head')

@include('master.topnav')
<!-- Side Navbar -->
@include('master.sidenav')

                @yield('content')

    @include('master.footer')
    @section('javascript')

    @endsection
