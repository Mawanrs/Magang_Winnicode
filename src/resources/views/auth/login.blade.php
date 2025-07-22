<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WinniGP - Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('css/stylelogin.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
  <section class="card-dark">
    <div class="brand-title mb-2">WinniGP</div>
    <img src="/storage/banner-logo (1).png" class="logo-img mb-2" alt="Logo">
    <div class="welcome mb-3">Hi, Welcome! <span style="font-size:1.15em;">👋</span></div>
    
    <form method="POST" action="{{ route('login.submit') }}">
      @csrf
      <div class="mb-3 text-start">
        <label for="loginEmail" class="form-label">Your email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="loginEmail" name="email" placeholder="Your email" value="{{ old('email') }}" required>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="mb-3 text-start position-relative">
        <label for="loginPassword" class="form-label">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="loginPassword" name="password" placeholder="Password" required>
        <i id="togglePassword" class="fas fa-eye-slash position-absolute" style="top: 38px; right: 15px; cursor: pointer;"></i> <!-- Eye icon -->
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check remember-check">
          <input type="checkbox" class="form-check-input" id="rememberMe" name="remember">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
      </div>
      
      <button type="submit" class="btn btn-green">Log in</button>
      
      <div class="text-center" style="margin-top:16px;">
        Don't have an account? <a href="/register" class="text-link text-white">Sign up</a>
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
  </section>

  <script>
    // Toggle password visibility
    const togglePassword = document.getElementById("togglePassword");
    const passwordField = document.getElementById("loginPassword");

    togglePassword.addEventListener("click", function () {
      // Toggle the type attribute of the password field
      const type = passwordField.type === "password" ? "text" : "password";
      passwordField.type = type;

      // Toggle the eye icon between open and closed
      this.classList.toggle("fa-eye-slash");
      this.classList.toggle("fa-eye");
    });
  </script>
</body>
</html>