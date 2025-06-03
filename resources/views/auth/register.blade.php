<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Register - e_commerce Website</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

 
</head>
<body>

  <div class="register-container">
    <h1 class="register-title">Create Your Account</h1>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul class="mb-0">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf

      <div class="mb-4">
        <label for="name" class="form-label">Full Name</label>
        <input
          type="text"
          class="form-control @error('name') is-invalid @enderror"
          id="name"
          name="name"
          value="{{ old('name') }}"
          required
          autofocus
        />
        @error('name')
          <div class="invalid-feedback text-white">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="mobile" class="form-label">Mobile Number</label>
        <input
          type="tel"
          class="form-control @error('mobile') is-invalid @enderror"
          id="mobile"
          name="mobile"
          value="{{ old('mobile') }}"
          required
        />
        @error('mobile')
          <div class="invalid-feedback text-white">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-4">
        <label for="email" class="form-label">Email Address</label>
        <input
          type="email"
          class="form-control @error('email') is-invalid @enderror"
          id="email"
          name="email"
          value="{{ old('email') }}"
          required
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


      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
