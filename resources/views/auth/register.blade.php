<!DOCTYPE html>
<html lang="en" class="form-screen">
<head>
  @include('layouts._header')
  @include('layouts_admin._header')
  <title>Parking Campus - Register</title>
  <style>
    .error {
      position: absolute;
      left: 0;
      top: 93px;
      color: white;
      background: red;
    }
  </style>
</head>
<body id="auth">
@include('layouts._navbar')
<div id="app">

  <section class="section main-section">
    <div class="card auth">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-plus"></i></span>
          Register
        </p>
      </header>
      <div class="card-content">
        <form action="{{ route('register') }}" method="post">
          @csrf
          <div class="error-parent field spaced">
            <label class="label">Username</label>
            <div class="control icons-left">
              <input class="input auth" type="text" name="username" placeholder="username" autocomplete="username">
              <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
            </div>
            <p class="help auth">
              Please enter your username
            </p>
            @error('username')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>
          <div class="error-parent field spaced">
            <label class="label">Email</label>
            <div class="control icons-left">
              <input class="input auth" type="email" name="email" placeholder="user@example.com" autocomplete="email">
              <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
            </div>
            <p class="help auth">
              Please enter your email
            </p>
            @error('email')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>

          <div class="error-parent field spaced">
            <label class="label">Password</label>
            <p class="control icons-left">
              <input class="input auth" type="password" name="password" placeholder="Password">
              <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
            </p>
            <p class="help auth">
              Please enter your password
            </p>
            @error('password')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>

          <div class="error-parent field spaced">
            <label class="label">Confirm Password</label>
            <p class="control icons-left">
              <input class="input auth" type="password" name="password_confirmation" placeholder="Confirm Your Password">
              <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
            </p>
            <p class="help auth">
              Please enter your confirmation password
            </p>
            @error('password_confirmation')
              <span class="error">{{ $message }}</span>
            @enderror
          </div>

          <hr>

          <div class="field grouped float-right">
            <div class="control">
              <a href="{{ route('login') }}" class="button" style="text-decoration: underline;">
                Sudah Punya Akun?
              </a>
            </div>
            <div class="control">
              <button type="submit" class="button blue">
                Sign Up
              </button>
            </div>
          </div>

        </form>
      </div>
    </div>

  </section>

@include('layouts._footer')
</div>
</body>
</html>
