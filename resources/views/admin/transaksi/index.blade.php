@extends('admin.main')

@section('title', 'Riwayat Transaksi')

@section('data-table-css')
  @include('layouts_admin._dataTables_css')
@endsection

@section('breadcrumb')
  <ul>
    <li>Admin</li>
    <li>Riwayat Transaksi</li>
  </ul>
@endsection

@section('content')
  <div class="d-flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <div class="card has-table">
      <div class="card-content">
        <table id="myTable" class="display">
            <thead>
              <tr>
                <th style="text-align: left;">No</th>
                <th style="text-align: left;">Tanggal</th>
                <th style="text-align: left;">Pemilik</th>
                <th style="text-align: left;">Area</th>
                <th style="text-align: left;">Nomor Polisi</th>
                <th style="text-align: left;">Mulai</th>
                <th style="text-align: left;">Akhir</th>
                <th style="text-align: left;">Biaya</th>
                <th style="text-align: left;">Keterangan</th>
                <th style="text-align: left;">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($transaksis as $transaksi)
              <tr>
                <td style="text-align: left;">{{ $loop->iteration }}</td>
                <td style="text-align: left;">{{ $transaksi->tanggal }}</td>
                <td style="text-align: left;">{{ $transaksi->kendaraan->pemilik }}</td>
                <td>{{ $transaksi->area_parkir->nama }}</td>
                <td>{{ $transaksi->kendaraan->nopol }}</td>
                <td>{{ date('H:i', strtotime($transaksi->mulai)) }}</td>
                <td>{{ date('H:i', strtotime($transaksi->akhir)) == '00:00' ? date('H:i') : date('H:i', strtotime($transaksi->akhir))}}</td>
                <td style="text-align: left;">Rp.{{ $transaksi->biaya != '0' ? $transaksi->biaya : $transaksi->biaya_sementara }}</td>
                <td>
                  <span class="{{ $transaksi->keterangan == 'Terbayar' ? 'paid' : 'not-paid' }} ">{{ $transaksi->keterangan }}</span>
                </td>
                <td>
                  <div class="flex">
                    <div class="buttons">
                      <form action="{{ route('admin.transaksi.delete', $transaksi->id) }}" method="post">
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
