<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WinniGP - Create Account</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/styleregister.css" rel="stylesheet">
</head>
<body>
  <div class="card-dark">
    <div class="brand-title mb-2">WinniGP</div>
    <img src="/storage/banner-logo (1).png" class="logo-img mb-2" alt="Logo">
    <div class="mb-3" style="font-size:1.1em;font-weight:600;">Create account</div>
    <form method="POST" action="{{ route('register.submit') }}">
      @csrf
      <div class="mb-3 text-start">
        <label for="registerUsername" class="form-label">Username</label>
        <input type="text" class="form-control @error('username') is-invalid @enderror" id="registerUsername" name="username" value="{{ old('username') }}" placeholder="Username" required>
        @error('username')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3 text-start">
        <label for="registerEmail" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="registerEmail" name="email" value="{{ old('email') }}" placeholder="Email" required>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3 text-start">
        <label for="registerPassword" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="registerPassword" name="password" placeholder="Password" required>
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="mb-3 text-start">
        <label for="registerConfirmPassword" class="form-label">Confirm password</label>
        <input type="password" class="form-control" id="registerConfirmPassword" name="password_confirmation" placeholder="Confirm password" required>
      </div>

      <button type="submit" class="btn btn-green">Create account</button>
      <div class="terms">By creating an account or signing you agree to our <a href="#" class="text-link">Terms and Conditions</a></div>
      <div class="text-center" style="font-size:1em;">
        Already have an account? <a href="/login" class="text-link">Sign In</a>
      </div>
    </form>

    {{-- Error handling global --}}
    @if($errors->any())
      <div class="alert alert-danger mt-3">
        <ul class="mb-0">
          @foreach($errors->all() as $err)
            <li>{{ $err }}</li>
          @endforeach
        </ul>
      </div>
    @endif

  </div>
</body>
</html>
