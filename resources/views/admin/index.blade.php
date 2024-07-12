@extends('admin.main')

@section('title', 'Dashboard')

@section('style')
  <style>
    .card-box {
      display: flex;
      gap: 15px;
    }
    .card-admin {
      width: 250px;
      height: 150px;
    }
    .card-content-admin {
      color: white;
      justify-content: space-between;
      font-size: 1.2rem;
      font-weight: bold;
      height: 100%;
      align-items: center;
    }
    .h3-admin {
      font-size: 2rem;
      margin-bottom: 15px;
    }
    .p-admin {
      font-size: 1rem;
      font-weight: normal;
    }
    .mdi-admin {
      font-size: 4.5rem;
    }
  </style>
@endsection

@section('breadcrumb')
  <ul>
    <li>Dashboard</li>
  </ul>
@endsection

@section('content')
<div class="flex" style="gap: 10px;flex-wrap:wrap;">
  <div class="card-box">
    <div class="card card-admin" style="background: #3b82f6;">
      <div class="card-content card-content-admin flex">
        <div>
          <h3 class="h3-admin">{{ $user }}</h3>
          <p class="p-admin">Total User</p>
        </div>
        <div>
          <i class="mdi mdi-admin mdi-account"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="card-box">
    <div class="card card-admin" style="background: #10B981;">
      <div class="card-content card-content-admin flex">
        <div>
          <h3 class="h3-admin">{{ $kendaraan }}</h3>
          <p class="p-admin">Total Kendaraan</p>
        </div>
        <div>
          <i class="mdi mdi-admin mdi-car"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="card-box">
    <div class="card card-admin" style="background: #EF4444;">
      <div class="card-content card-content-admin flex">
        <div>
          <h3 class="h3-admin">{{ $area_parkir }}</h3>
          <p class="p-admin">Total Area Parkir</p>
        </div>
        <div>
          <i class="mdi mdi-admin mdi-vlc"></i>
        </div>
      </div>
    </div>
  </div>
  <div class="card-box">
    <div class="card card-admin" style="background: #f6a43b;">
      <div class="card-content card-content-admin flex">
        <div>
          <h3 class="h3-admin">{{ $transaksi }}</h3>
          <p class="p-admin">Total Transaksi</p>
        </div>
        <div>
          <i class="mdi mdi-admin mdi-clipboard-text"></i>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection