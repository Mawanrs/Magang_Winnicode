<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>WinniGP - Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/stylelogin.css" rel="stylesheet">
</head>
<body>
  <div class="card-dark">
    <div class="brand-title mb-2">WinniGP</div>
    <img src="/storage/banner-logo (1).png" class="logo-img mb-2" alt="Logo">
    <div class="welcome mb-3">Hi, Welcome! <span style="font-size:1.15em;">👋</span></div>
    <form>
      <div class="mb-3 text-start">
        <label for="loginEmail" class="form-label">Your email</label>
        <input type="email" class="form-control" id="loginEmail" placeholder="Your email" required>
      </div>
      <div class="mb-3 text-start">
        <label for="loginPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="loginPassword" placeholder="Password" required>
      </div>
      <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="form-check remember-check">
          <input type="checkbox" class="form-check-input" id="rememberMe">
          <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
        <a href="#" class="text-link text-white">Forgot password?</a>
      </div>
      <button type="submit" class="btn btn-green">Log in</button>
      <div class="text-center" style="margin-top:16px;">
        Don't have an account? <a href="/register" class="text-link text-white">Sign up</a>
      </div>
    </form>
  </div>
</body>
</html>
