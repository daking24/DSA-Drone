<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DSA Drone Surveillance Project</title>
  <style>
    body {
      margin: 0;
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      color: #333;
      background-image: url({{ asset('vendor/img/10-scaled.jpg') }});
      background-size: cover;
    }

    header {
      background-color: #1a1a1a;
      background-image: url({{ asset('vendor/img/dsa.png') }});
      background-size: contain;
      color: #fff;
      padding: 20px;
      text-align: center;
      display: flex;
      align-items: center;
      justify-content: space-between;
    }

    header img {
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
</head>

<body>
  <header>
    <div class="logo">
      <img src="{{ asset('vendor/img/logo.png') }}" alt="Project Logo">
      <h1>DSA Drone Surveillance Project</h1>
    </div>
    <div class="log-name">
      <div class="name">
        <p>Welcome {{ $user->name }}</p>
      </div>
      <div>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button class="btn" type="submit">Logout</button>
        </form>
      </div>
    </div>
  </header>

  <div class="content">
    <div class="video-container">
      <h2>Drone 1</h2>
      <video controls autoplay muted>
        <source src="http://your-windows-ip:8080/drone1/live/stream.m3u8" type="application/x-mpegURL">
        Your browser does not support the video tag.
      </video>
    </div>
    <div class="video-container">
      <h2>Drone 2</h2>
      <video controls autoplay muted>
        <source src="http://your-windows-ip:8080/drone2/live/stream.m3u8" type="application/x-mpegURL">
        Your browser does not support the video tag.
      </video>
    </div>
    <div class="video-container">
      <h2>Drone 3</h2>
      <video controls autoplay muted>
        <source src="http://your-windows-ip:8080/drone3/live/stream.m3u8" type="application/x-mpegURL">
        Your browser does not support the video tag.
      </video>
    </div>
    <!-- Add more video containers for additional drones as needed -->
  </div>
</body>

</html>
