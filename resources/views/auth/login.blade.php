<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login - e_commerce Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
 
</head>
<body>

  <div class="login-container">
    <h1 class="login-title">Welcome to e_commerce Website</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf
      <div class="mb-4">
        <label for="email" class="form-label">Email address</label>
        <input
          type="email"
          class="form-control @error('email') is-invalid @enderror"
          id="email"
          name="email"
          value="{{ old('email') }}"
          required
          autofocus
        />
        @error('email')
          <div class="invalid-feedback text-white">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input
          type="password"
          class="form-control @error('password') is-invalid @enderror"
          id="password"
          name="password"
          required
        />
        @error('password')
          <div class="invalid-feedback text-white">{{ $message }}</div>
        @enderror
      </div>

      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="mt-3">
      <p class="text-center">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none text-dark custom-hover">Register here</a></p>
    </div>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
