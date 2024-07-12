@extends('admin.main')

@section('title', 'Area Parkir')

@section('data-table-css')
  @include('layouts_admin._dataTables_css')
@endsection

@section('breadcrumb')
  <ul>
    <li>Admin</li>
    <li>Area Parkir</li>
  </ul>
@endsection

@section('content')
  <div class="d-flex flex-col md:flex-row items-center justify-center space-y-6 md:space-y-0">
    <div class="card has-table">
      <header class="card-header">
        <a href="{{ route('admin.area-parkir.add') }}" class="card-header-icon">
          <button class="button blue">+ Tambah</button>
        </a>
      </header>
      <div class="card-content">
        <div class="d-flex align-items-center">
          <table id="myTable" class="display">
            <thead>
              <tr>
                <th style="text-align: left;">No</th>
                <th style="text-align: left;">Nama</th>
                <th style="text-align: left;">Kapasitas</th>
                <th style="text-align: left;">Keterangan</th>
                <th style="text-align: left;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($area_parkir as $ap)
              <tr>
                <td style="text-align: left;">{{ $loop->iteration }}</td>
                <td>{{ ucfirst($ap->kampus->nama) }} // {{ $ap->nama }}</td>
                <td style="text-align: left;">{{ $ap->kapasitas }}</td>
                <td>{{ $ap->keterangan }}</td>
                <td>
                  <div class="flex">
                    <div class="buttons">
                      <a href="{{ route('admin.area-parkir.edit', $ap->id) }}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                      </a>
                    </div>
                    <div class="buttons">
                      <form action="{{ route('admin.area-parkir.delete', $ap->id) }}" method="post">
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

@section('data-table-js')
  @include('layouts_admin._dataTables_js')
@endsection