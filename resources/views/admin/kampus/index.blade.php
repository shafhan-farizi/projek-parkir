@extends('admin.main')

@section('title', 'Kampus')

@section('breadcrumb')
  <ul>
    <li>Admin</li>
    <li>Gedung Kampus</li>
  </ul>
@endsection

@section('content')
  <div class="d-flex flex-col md:flex-row items-center justify-center space-y-6 md:space-y-0">
    <div class="card has-table">
      <header class="card-header">
        <a href="{{ route('admin.kampus.add') }}" class="card-header-icon">
          <button class="button blue">+ Tambah</button>
        </a>
      </header>
      <div class="card-content">
        <div class="d-flex align-items-center">
          <table id="myTable" class="display">
            <thead>
              <tr>
                <th style="text-align: left;">No</th>
                <th>Nama</th>
                <th style="text-align: left;">Latitude</th>
                <th style="text-align: left;">Longitude</th>
                <th>Alamat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($kampuses as $kampus)
            <tr>
              <td style="text-align: left;">{{ $loop->iteration }}</td>
              <td>{{ $kampus->nama }}</td>
              <td style="text-align: left;">{{ $kampus->latitude }}</td>
              <td style="text-align: left;">{{ $kampus->longitude }}</td>
              <td>{{ $kampus->alamat }}</td>
              <td>
                <div class="flex">
                  <div class="buttons">
                    <a href="{{ route('admin.kampus.edit', $kampus->id) }}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                      <span class="icon"><i class="mdi mdi-eye"></i></span>
                    </a>
                  </div>
                  <div class="buttons">
                    <form action="{{ route('admin.kampus.delete', $kampus->id) }}" method="post">
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
  </div>
@endsection