@php
  $routeUrl = request()->route()->uri;
  $urlCut = explode('/', $routeUrl);
@endphp
<aside class="aside is-placed-left is-expanded">
  <div class="aside-tools">
    <div>
      Parking <b class="font-black">Campus</b>
    </div>
  </div>
  <div class="menu is-menu-main">
    <p class="menu-label">Home</p>
    <ul class="menu-list">
      <li class="@if(empty($urlCut[1]) && $urlCut[0] == 'admin') active @endif">
        <a href="{{ route('admin.dashboard') }}">
          <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
          <span class="menu-item-label">Dashboard</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">User Management</p>
    <ul class="menu-list">
      <li class="@if(!empty($urlCut[1]) && $urlCut[1] == 'user') active @endif">
        <a href="{{ route('admin.user') }}">
          <span class="icon"><i class="mdi mdi-account"></i></span>
          <span class="menu-item-label">User</span>
        </a>
      </li>
    </ul>
    <p class="menu-label">Parking Management</p>
    <ul class="menu-list">
      <li class="@if(!empty($urlCut[1]) && $urlCut[1] == 'kendaraan') active @endif">
        <a href="{{ route('admin.kendaraan') }}">
          <span class="icon"><i class="mdi mdi-motorbike"></i></span>
          <span class="menu-item-label">Kendaraan</span>
        </a>
      </li>
      <li class="@if(!empty($urlCut[1]) && $urlCut[1] == 'area-parkir') active @endif">
        <a href="{{ route('admin.area-parkir') }}">
          <span class="icon"><i class="mdi mdi-vlc"></i></span>
          <span class="menu-item-label">Area Parkir</span>
        </a>
      </li>
      <li class="@if(!empty($urlCut[1]) && $urlCut[1] == 'kampus') active @endif">
        <a href="{{ route('admin.kampus') }}">
          <span class="icon"><i class="mdi mdi-city"></i></span>
          <span class="menu-item-label">Gedung Kampus</span>
        </a>
      </li>
      <li class="@if(!empty($urlCut[1]) && empty($urlCut[2]) && $urlCut[1] == 'transaksi') active @endif">
        <a href="{{ route('admin.transaksi') }}">
          <span class="icon"><i class="mdi mdi-square-inc-cash"></i></span>
          <span class="menu-item-label">Riwayat Transaksi</span>
        </a>
      </li>
    </ul>
    <ul class="menu-list">
      <li class="@if(!empty($urlCut[2]) && ($urlCut[2] == 'check-in' || $urlCut[2] == 'check-out')) active @endif">
        <a class="dropdown">
            <span class="icon"><i class="mdi mdi-clipboard-check"></i></span>
            <span class="menu-item-label">Check In/Out</span>
            <span class="icon"><i class="mdi mdi-plus"></i></span>
        </a>
        <ul>
          <li class="@if(!empty($urlCut[2]) && $urlCut[2] == 'check-in') active @endif">
            <a href="{{ route('admin.check-in') }}">
              <span class="icon"><i class="mdi mdi-login-variant"></i></span>
              <span class="menu-item-label">Check In</span>
            </a>
          </li>
          <li class="@if(!empty($urlCut[2]) && $urlCut[2] == 'check-out') active @endif">
            <a href="{{ route('admin.check-out') }}">
              <span class="icon"><i class="mdi mdi-logout-variant"></i></span>
              <span class="menu-item-label">Check Out</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</aside>