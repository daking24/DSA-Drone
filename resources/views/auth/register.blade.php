<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>

  <link rel="stylesheet" href="{{ asset('vendor/auth/index.css') }}">
</head>

<body class="content">
  <div class="login-wrap">
    <h2>Register</h2>

    <form class="form" method="POST" action="{{ route('register') }}">
        @csrf
      <input type="text" placeholder="Name" name="name" />
      <input type="email" placeholder="Email" name="email" />
      <input type="password" placeholder="Password" name="password" />
      <input type="password" placeholder="Confirm Password" name="password_confirmation" />
      <button type="submit"> Sign Up </button>

        <span> Already have an account?<a href="{{ route('view.login') }}"> Login </a> | <a href="{{ route('home') }}">Home</a></span>

    </form>
  </div>
</body>

</html>
