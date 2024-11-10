<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSA Drone Surveillance Project</title>
  <link rel="stylesheet" href="{{ asset('vendor/dashboard/nav.css') }}">
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      color: #333;
      background-image: url({{ asset('vendor/img/10-scaled.jpg') }});
      background-size: cover;
    }

    nav {
      /* background-color: #1a1a1a; */
      background-image: url({{ asset('vendor/img/dsa.png') }});
      background-size: contain;
      /* color: whitesmoke !important; */
    }

    .navbar-header a {
      display: flex;
      align-items: center;
    }

    .navbar-header a img {
      margin-right: 0.5rem; /* Space between image and h4 */
    }


    .navbar-header a img {
      height: 50px;
      margin-right: 20px;
    }

    header h1 {
      margin: 0;
      font-size: 28px;
      font-weight: normal;
    }

    .content {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 20px;
    }

    .video-container {
      margin: 15px;
      text-align: center;
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      overflow: hidden;
      flex-basis: 100%;
      max-width: 45%;
    }

    .video-container h2 {
      background-color: #1a1a1a;
      color: #fff;
      padding: 10px;
      margin: 0;
      font-size: 22px;
    }

    video {
      width: 100%;
      height: auto;
      max-height: 500px;
      background-color: #000;
    }

    @media (max-width: 768px) {
      .video-container {
        max-width: 100%;
        margin: 10px 0;
      }

      header h1 {
        font-size: 22px;
      }
    }

    .logo {
      display: flex;
      flex-direction: row;
      align-items: center;
    }

    .btn {
      background-color: #ec3838;
      color: #fff;
      text-decoration: none;
      padding: 10px 15px;
      border-radius: 20px;
      border: 4px solid white;
      font-weight: bold;
    }

    .btn:hover {
      background-color: white;
      color: #ec3838;
      border: 4px solid #ec3838;

    }

    .log-name {
      display: flex;
      gap: 1rem;
    }
  </style>
  @stack('css')
</head>

<body>
  <nav class="navbar">
    <div class="container">

      <div class="navbar-header">
        <button class="navbar-toggler" data-toggle="open-navbar1">
          <span></span>
          <span></span>
          <span></span>
        </button>
        <a href="{{ route('user.dashboard') }}">
          <img src="{{ asset('vendor/img/logo.png') }}" alt="Project Logo">
      <h4>DSA Drone Surveillance Project</h4>
        </a>
      </div>

      <div class="navbar-menu" id="open-navbar1">
        <ul class="navbar-nav">
          <li class="active"><a href="{{ route('user.dashboard') }}">Home</a></li>
          <li class="navbar-dropdown">
            <a href="#" class="dropdown-toggler" data-dropdown="my-dropdown-id">
              Drones <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown" id="my-dropdown-id">
              @foreach($drones as $dronen)
                <li><a href="{{ route('drone.view', $dronen->id) }}">{{ $dronen->name }}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="#">{{$user->name}}</a></li>
          <li><form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
            <a href="{{ url('/logout') }}"  class="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
            </a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content">
    @yield('user.content')
  </div>



  <script>
    let dropdowns = document.querySelectorAll('.navbar .dropdown-toggler')
    let dropdownIsOpen = false

    // Handle dropdown menues
    if (dropdowns.length) {
      // Usually I don't recommend doing this (adding many event listeners to elements have the same handler)
      // Instead use event delegation: https://javascript.info/event-delegation
      // Why: https://gomakethings.com/why-event-delegation-is-a-better-way-to-listen-for-events-in-vanilla-js
      // But since we only have two dropdowns, no problem with that.
      dropdowns.forEach((dropdown) => {
        dropdown.addEventListener('click', (event) => {
          let target = document.querySelector(`#${event.target.dataset.dropdown}`)

          if (target) {
            if (target.classList.contains('show')) {
              target.classList.remove('show')
              dropdownIsOpen = false
            } else {
              target.classList.add('show')
              dropdownIsOpen = true
            }
          }
        })
      })
    }

    // Handle closing dropdowns if a user clicked the body
    window.addEventListener('mouseup', (event) => {
      if (dropdownIsOpen) {
        dropdowns.forEach((dropdownButton) => {
          let dropdown = document.querySelector(`#${dropdownButton.dataset.dropdown}`)
          let targetIsDropdown = dropdown == event.target

          if (dropdownButton == event.target) {
            return
          }

          if ((!targetIsDropdown) && (!dropdown.contains(event.target))) {
            dropdown.classList.remove('show')
          }
        })
      }
    })

    // Open links in mobiles
    function handleSmallScreens() {
      document.querySelector('.navbar-toggler')
        .addEventListener('click', () => {
          let navbarMenu = document.querySelector('.navbar-menu')

          if (!navbarMenu.classList.contains('active')) {
            navbarMenu.classList.add('active')
          } else {
            navbarMenu.classList.remove('active')
          }
        })
    }

    handleSmallScreens()
  </script>
</body>

</html>
