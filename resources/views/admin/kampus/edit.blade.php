@extends('admin.main')

@section('title', 'Kampus Edit')

@section('breadcrumb')
    <ul>
        <li>Admin</li>
        <li>Gedung Kampus</li>
        <li>Edit</li>
        <li>{{ $kampus->id }}</li>
    </ul>
@endsection

@section('content')
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">
                <span class="icon">
                    <i class="mdi mdi-ballot"></i>
                </span>
                Edit Gedung Kampus
            </p>
        </header>
        <div class="card-content">
            <form action="{{ route('admin.kampus.edit', $kampus->id) }}" method="post">
                @csrf
                @method('put')
                <div class="error-parent field spaced">
                    <label class="label">Nama</label>
                    <div class="control icons-left">
                        <input class="input auth" type="text" name="nama" placeholder="Nama" autocomplete="nama" value="{{ $kampus->nama }}">
                    </div>
                    @error('nama')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex" style="gap: 5px">
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Latitude</label>
                        <div class="control icons-left">
                            <input class="input auth" type="text" name="latitude" placeholder="Latitude" autocomplete="latitude" value="{{ $kampus->latitude }}">
                        </div>
                        @error('latitude')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="error-parent field spaced" style="width: 100%;">
                        <label class="label">Longitude</label>
                        <div class="control icons-left">
                            <input class="input auth" type="text" name="longitude" placeholder="Longitude" autocomplete="longitude" value="{{ $kampus->longitude }}">
                        </div>
                        @error('longitude')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="error-parent field spaced">
                    <label class="label">Alamat</label>
                    <div class="control icons-left">
                        <textarea class="textarea" name="alamat" placeholder="Alamat">{{ $kampus->alamat }}</textarea>
                    </div>
                    @error('alamat')
                        <span class="error textareaEr">{{ $message }}</span>
                    @enderror
                </div>
                <div class="field grouped">
                    <div class="control" style="margin-left: auto;">
                        <a href="{{ route('admin.kampus') }}" class="button red">
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
