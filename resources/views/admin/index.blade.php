<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSA Drone Surveillance Project | Admin</title>
  <link rel="stylesheet" href="{{ asset('vendor/stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/dashboard/index.css') }}">
  @stack('css')
</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="custom-menu">
        <button type="button" id="sidebarCollapse" class="btn btn-secondary">
          <img src="{{asset('vendor/img/menu.png')}}">
          <span class="sr-only">Toggle Menu</span>
        </button>
      </div>
      <div class="p-4">

        <div class="h1">
          <a href="index-2.html" class="logo">
            <img class="logo-img" src="{{ asset('vendor/img/logo.png') }}" alt="Project Logo">
            <h1>Drone Surveillance Project</h1>
          </a>
          <div class="welcome">
            Hello, {{ $user->name }}
          </div>
        </div>

        <ul class="list-unstyled components mb-5">
          <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{ url('/admin/dashboard') }}"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li class="{{ Request::is('admin/drones') ? 'active' : '' }}">
            <a href="{{ url('/admin/drones') }}"><span class="fa fa-user mr-3"></span> Drones</a>
          </li>
          <li class="{{ Request::is('admin/users') ? 'active' : '' }}">
            <a href="{{ url('/admin/users') }}"><span class="fa fa-briefcase mr-3"></span> Users</a>
          </li>
          <li class="{{ Request::is('admin/locations') ? 'active' : '' }}">
            <a href="{{ url('/admin/locations') }}"><span class="fa fa-sticky-note mr-3"></span> Locations</a>
          </li>
          <li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <span class="fa fa-sticky-note mr-3 logout"></span> Logout
            </a>
          </li>
        </ul>


        <div class="footer">
          <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;
            <script>
              document.write(new Date().getFullYear());
            </script>
            All rights reserved
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </p>
        </div>

      </div>
    </nav>

    <div id="content" class="p-4 p-md-5 pt-5">
      @yield('content')
    </div>
  </div>
  </div>

  <script src="{{ asset('vendor/dashboard/js/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/dashboard/js/popper.js') }}"></script>
  <script src="{{ asset('vendor/dashboard/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('vendor/dashboard/js/main.js') }}"></script>
  <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015"
    integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ=="
    data-cf-beacon='{"rayId":"8d68df834da5d5a3","version":"2024.10.1","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"cd0b4b3a733644fc843ef0b185f98241","b":1}'
    crossorigin="anonymous"></script>
  @stack('js')
  </body>

</html>
