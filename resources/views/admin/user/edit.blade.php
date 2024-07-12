@extends('admin.main')

@section('title', 'User Edit')

@section('breadcrumb')
    <ul>
      <li>Admin</li>
      <li>User</li>
      <li>Edit</li>
      <li>{{ $user->id }}</li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon">
                    <i class="mdi mdi-ballot"></i>
                </span>
                Edit User
            </p>
        </header>
        <div class="card-content">
            <form action="{{ route('admin.user.edit', $user->id) }}" method="post">
                @csrf
                @method('put')
                <div class="error-parent field spaced">
                    <label class="label">Username</label>
                    <div class="control icons-left">
                        <input class="input auth" type="text" name="username" placeholder="Your Username" autocomplete="username" value="{{ $user->username }}">
                    </div>
                    @error('username')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="error-parent field spaced" style="width: 100%;">
                    <label class="label">Role</label>
                    <div class="control icons-left">
                        <div class="select">
                            <select name="role">
                                <option selected disabled>-- Pilih Role --</option>
                                <option value="admin" @if($user->role == 'admin') selected @endif>Admin</option>
                                <option value="pemilik_kendaraan" @if($user->role == 'pemilik_kendaraan') selected @endif>Pemilik Kendaraan</option>
                            </select>
                        </div>
                    </div>
                    @error('role')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="error-parent field spaced" style="width: 100%;">
                    <label class="label">Email</label>
                    <div class="control icons-left">
                        <input class="input auth" type="email" name="email" placeholder="Email" autocomplete="email" value="{{ $user->email }}">
                    </div>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="error-parent field spaced" style="width: 100%;">
                    <label class="label">Password</label>
                    <div class="control icons-left">
                        <input class="input auth" type="password" name="password" placeholder="Password">
                    </div>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="error-parent field spaced" style="width: 100%;">
                    <label class="label">Confirm Password</label>
                    <div class="control icons-left">
                        <input class="input auth" type="password" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    @error('password_confirmation')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field grouped">
                    <div class="control" style="margin-left: auto;">
                        <a href="{{ route('admin.user') }}" class="button red">
                            Cancel
                        </a>
                    </div>
                    <div class="control">
                        <button type="submit" class="button blue">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection