@extends('admin.main')

@section('title', 'Kendaraan')

@section('data-table-css')
  @include('layouts_admin._dataTables_css')
@endsection

@section('breadcrumb')
  <ul>
    <li>Admin</li>
    <li>Kendaraan</li>
  </ul>
@endsection

@section('content')
  <div class="d-flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <div class="card has-table">
      <header class="card-header">
        <a href="{{ route('admin.kendaraan.add') }}" class="card-header-icon">
          <button class="button blue">+ Tambah</button>
        </a>
      </header>
      <div class="card-content">
        <table id="myTable" class="display">
          <thead>
            <tr>
              <th style="text-align: left;">No</th>
              <th style="text-align: left;">Pemilik</th>
              <th style="text-align: left;">Merk</th>
              <th style="text-align: left;">Nomor Polisi</th>
              <th style="text-align: left;">Tahun Beli</th>
              <th style="text-align: left;">Jenis</th>
              <th style="text-align: left;">Kapasitas</th>
              <th style="text-align: left;">Deskripsi</th>
              <th style="text-align: left;">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($kendaraans as $kendaraan)
              <tr>
                <td style="text-align: left;">{{ $loop->iteration }}</td>
                <td>{{ $kendaraan->pemilik }}</td>
                <td>{{ $kendaraan->merk }}</td>
                <td>{{ $kendaraan->nopol }}</td>
                <td style="text-align: left;">{{ $kendaraan->thn_beli }}</td>
                <td>{{ $kendaraan->jenis->nama }}</td>
                <td style="text-align: left;">{{ $kendaraan->kapasitas_kursi }}</td>
                <td style="text-align: left;">{{ $kendaraan->deskripsi }}</td>
                <td>
                  <div class="flex">
                    <div class="buttons">
                      <a href="{{ route('admin.kendaraan.edit', $kendaraan->id) }}" class="button small green --jb-modal"  data-target="sample-modal-2" type="button">
                        <span class="icon"><i class="mdi mdi-eye"></i></span>
                      </a>
                    </div>
                    <div class="buttons">
                      <form action="{{ route('admin.kendaraan.delete', $kendaraan->id) }}" method="post">
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