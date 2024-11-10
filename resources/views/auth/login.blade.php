<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <link rel="stylesheet" href="{{ asset('vendor/auth/index.css') }}">
</head>

<body class="content">
  <div class="login-wrap">
    <h2>Login</h2>

    <form action="{{ route('login') }}" method="POST" class="form">
        @csrf
      <input type="email" placeholder="Email" name="email"/>
      @error('email')
            <span>{{ $message }}</span>
        @enderror
      <input type="password" placeholder="Password" name="password"/>
      @error('password')
            <span>{{ $message }}</span>
        @enderror
      <button type="submit"> Sign in </button>

        <span> Don't have an account? Contact the Administrators | <a href="{{ route('home') }}">Home</a></span>

    </form>
  </div>
</body>

</html>
