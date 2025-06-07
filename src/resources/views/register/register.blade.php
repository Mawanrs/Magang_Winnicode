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
    <form>
      <div class="mb-3 text-start">
        <label for="registerUsername" class="form-label">Username</label>
        <input type="text" class="form-control" id="registerUsername" placeholder="Username" required>
      </div>
      <div class="mb-3 text-start">
        <label for="registerPassword" class="form-label">Password</label>
        <input type="password" class="form-control" id="registerPassword" placeholder="Password" required>
      </div>
      <div class="mb-3 text-start">
        <label for="registerConfirmPassword" class="form-label">Confirm password</label>
        <input type="password" class="form-control" id="registerConfirmPassword" placeholder="Confirm password" required>
      </div>
      <button type="submit" class="btn btn-green">Create account</button>
      <div class="terms">By creating an account or signing you agree to our <a href="#" class="text-link">Terms and Conditions</a></div>
      <div class="text-center" style="font-size:1em;">
        Already have an account? <a href="/login" class="text-link">Sign In</a>
      </div>
    </form>
  </div>
</body>
</html>
