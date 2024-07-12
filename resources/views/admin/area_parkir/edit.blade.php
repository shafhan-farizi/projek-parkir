@extends('admin.main')

@section('title', 'Area Parkir Edit')

@section('breadcrumb')
    <ul>
      <li>Admin</li>
      <li>Area Parkir</li>
      <li>Edit</li>
      <li>{{ $area_parkir->id }}</li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon">
                    <i class="mdi mdi-ballot"></i>
                </span>
                Edit Area Parkir
            </p>
        </header>
        <div class="card-content">
            <form action="{{ route('admin.area-parkir.edit', $area_parkir->id) }}" method="post">
                @csrf
                @method('put')
                <div class="flex" style="gap: 5px">
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Nama Area</label>
                        <div class="control icons-left">
                            <input class="input auth" type="text" name="nama" placeholder="Nama Area Parkir" autocomplete="area_parkir" value="{{ $area_parkir->nama }}">
                        </div>
                        @error('nama')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Kampus</label>
                        <div class="control icons-left">
                            <div class="select">
                                <select name="kampus_id">
                                    <option selected disabled>-- Pilih Kampus --</option>
                                    @foreach ($kampuses as $kampus)
                                    <option value="{{ $kampus->id }}" @if($area_parkir->kampus_id == $kampus->id) selected @endif>{{ ucwords($kampus->nama) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('kampus_id')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Kapasitas</label>
                        <div class="control icons-left">
                            <input class="input auth" type="number" name="kapasitas" placeholder="Kapasitas" autocomplete="kapasitas" value="{{ $area_parkir->kapasitas }}">
                        </div>
                        @error('kapasitas')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="error-parent field spaced">
                    <label class="label">Keterangan</label>
                    <div class="control icons-left">
                        <textarea class="textarea" name="keterangan" placeholder="Keterangan">{{ $area_parkir->keterangan }}</textarea>
                    </div>
                    @error('keterangan')
                        <span class="error textareaEr">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field grouped">
                    <div class="control" style="margin-left: auto;">
                        <a href="{{ route('admin.area-parkir') }}" class="button red">
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