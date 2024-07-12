@extends('admin.main')

@section('title', 'User')

@section('data-table-css')
  @include('layouts_admin._dataTables_css')
@endsection

@section('breadcrumb')
  <ul>
    <li>Admin</li>
    <li>User</li>
  </ul>
@endsection

@section('content')
  <div class="d-flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <div class="card has-table">
      <header class="card-header">
        <a href="{{ route('admin.user.add') }}" class="card-header-icon">
          <button class="button blue">+ Tambah</button>
        </a>
      </header>
      <div class="card-content">
        <table id="myTable" class="display">
          <thead>
            <tr>
              <th style="text-align: left;">No</th>
              <th>Username</th>
              <th>Role</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td style="text-align: left;">{{ $loop->iteration }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->role }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <div class="flex">
                  <div class="buttons">
                    <a href="{{ route('admin.user.edit', $user->id) }}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </a>
                  </div>
                  <div class="buttons">
                    <form action="{{ route('admin.user.delete', $user->id) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="button small red --jb-modal" data-target="sample-modal" type="button">
                        <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                      </button>
                    </form>
                  </div>
                </div>
              </td>
            </tr> 
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@section('data-table-js')
  @include('layouts_admin._dataTables_js')
@endsection