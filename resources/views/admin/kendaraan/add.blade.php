@extends('admin.main')

@section('title', 'Kendaraan Add')

@section('breadcrumb')
    <ul>
        <li>Admin</li>
        <li>Kendaraan</li>
        <li>Tambah</li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon">
                    <i class="mdi mdi-ballot"></i>
                </span>
                Tambah Kendaraan
            </p>
        </header>
        <div class="card-content">
            <form action="{{ route('admin.kendaraan.add') }}" method="post">
                @csrf
                <div class="error-parent field spaced">
                    <label class="label">Nama Pemilik</label>
                    <div class="control icons-left">
                        <input class="input auth" type="text" name="pemilik" placeholder="Nama Pemilik" autocomplete="nama_pemilik">
                    </div>
                    @error('pemilik')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex" style="gap: 5px">
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Merk Kendaraan</label>
                        <div class="control icons-left">
                            <input class="input auth" type="text" name="merk" placeholder="Merk Kendaraan" autocomplete="merk_kendaraan">
                        </div>
                        @error('merk')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Nomor Polisi</label>
                        <div class="control icons-left">
                            <input class="input auth" type="text" name="nopol" placeholder="Nomor Polisi" autocomplete="nomor_polisi">
                        </div>
                        @error('nopol')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Jenis Kendaraan</label>
                        <div class="control icons-left">
                            <div class="select">
                                <select name="jenis_kendaraan_id">
                                    <option selected disabled>-- Pilih Jenis Kendaraan --</option>
                                    @foreach ($jenis_kendaraan as $jk)
                                        <option value="{{ $jk->id }}">{{ $jk->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('jenis_kendaraan_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex" style="gap: 5px">
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Tahun Beli</label>
                        <div class="control icons-left">
                            <input type="number" name="thn_beli" min="1885" max="2024" class="input auth" placeholder="Tahun Beli (1885 - 2024)">
                        </div>
                        @error('thn_beli')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Kapasitas Kendaraan</label>
                        <div class="control icons-left">
                            <input type="number" name="kapasitas_kursi" min="0" class="input auth" placeholder="Kapasitas Kursi">
                        </div>
                        @error('kapasitas_kursi')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="error-parent field spaced">
                    <label class="label">Deskripsi</label>
                    <div class="control icons-left">
                        <textarea class="textarea" name="deskripsi" placeholder="Deskripsi"></textarea>
                    </div>
                    @error('deskripsi')
                        <span class="error textareaEr">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field grouped">
                    <div class="control" style="margin-left: auto;">
                        <a href="{{ route('admin.kendaraan') }}" class="button red">
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
