@extends('main')

@section('title', 'Profile')

@section('style')
  <style>
    header {
      background-color: rgba(0, 0, 0, 0.8);
    }
    .error {
      top: 90px;
    }
  </style>
@endsection

@section('content')
  <div class="site-section bg-light" id="contact-section">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">
        <h3 style="font-weight: bold;">User Profile</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
              <h4 style="margin: 0;" class="ml-2">Edit Profile</h4>
            </div>
          </div>
          <form action="{{ route('profile.edit', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card-content p-3">
              <div class="form-group row">
                <div class="error-parent col">
                  <label>Username</label>
                  <input type="text" name="username" class="form-control" value="{{ $user->username }}">
                  @error('username')
                    <span class="error">{{ $message }}</span>
                  @enderror
                </div>
              </div>
              <div class="form-group row">
                <div class="error-parent col">
                  <label>Email</label>
                  <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                  @error('email')
                    <span class="error">{{ $message }}</span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="form-group row">
                <div class="col-md-6 ml-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Edit">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-6">
        <div class="card">
          <div class="card-header">
            <div class="d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-file-earmark-lock2-fill" viewBox="0 0 16 16">
                <path d="M7 7a1 1 0 0 1 2 0v1H7z"/>
                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M10 7v1.076c.54.166 1 .597 1 1.224v2.4c0 .816-.781 1.3-1.5 1.3h-3c-.719 0-1.5-.484-1.5-1.3V9.3c0-.627.46-1.058 1-1.224V7a2 2 0 1 1 4 0"/>
              </svg>
              <h4 style="margin: 0;" class="ml-2">Change Password</h4>
            </div>
          </div>
          <form action="{{ route('profile.change-password', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="card-content p-3">
                <div class="form-group row">
                  <div class="error-parent col">
                    <label>Current Password</label>
                    <input type="password" name="current_password" class="form-control">
                    @error('current_password')
                      <span class="error">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="error-parent col">
                    <label>New Password</label>
                    <input type="password" name="new_password" class="form-control">
                    @error('new_password')
                      <span class="error">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="form-group row">
                  <div class="error-parent col">
                    <label>Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control">
                    @error('new_password_confirmation')
                      <span class="error">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
            </div>
            <div class="card-footer">
              <div class="form-group row">
                <div class="col-md-6 ml-auto">
                  <input type="submit" class="btn btn-block btn-primary text-white py-3 px-5" value="Edit">
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection